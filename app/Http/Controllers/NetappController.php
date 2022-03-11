<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\ApiEndpoint\ApiEndpointManager;
use App\BusinessLogicLayer\ApiPaymentPlan\ApiPaymentPlanManager;
use App\BusinessLogicLayer\Document\DocumentManager;
use App\BusinessLogicLayer\Image\ImageManager;
use App\BusinessLogicLayer\Netapp\NetappManager;
use App\Http\Requests\NetappRequest;
use App\Models\ApiEndpoint;
use App\Models\ApiPaymentPlan;
use App\Models\Category;
use App\Models\Netapp;
use App\Models\NetappType;
use Illuminate\Http\Request;

class NetappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $netappManager;
    protected $documentManager;
    protected $imageManager;
    protected $apiPaymentPlanManager;
    public function __construct(
        NetappManager $netappManager,
        DocumentManager $documentManager,
        ImageManager $imageManager,
        ApiPaymentPlanManager  $apiPaymentPlanManager,
        ApiEndpointManager $apiEndpointManager
    ) {
        $this->documentManager = $documentManager;
        $this->netappManager = $netappManager;
        $this->imageManager = $imageManager;
        $this->apiPaymentPlanManager = $apiPaymentPlanManager;
        $this->apiEndpointManager = $apiEndpointManager;
    }

    public function index()
    {
        $categories = Category::all();
        $types = NetappType::all();
        return view('netapp-create', compact('categories', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NetappRequest $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request)
    {
        try {

            $file = upload($request->file, 'assets/netapp/' . $request->get('url'));
            return response()->json(['file_name' => $file]);
        } catch (\Exception $e) {
            return response()->json(array('error' => $e->getMessage()));
        }
    }
    public function store(NetappRequest $request)
    {
        $documentRequest = [];
        \DB::beginTransaction();
        try {
            $netapp = $this->netappManager->create($request->all());
            if ($request['deployment']['licensefile'] !== null) {
                array_push($documentRequest, [
                    'url' => $request['tutorial']['pdf'],
                    'documentable_type' => 'App\Models\Netapp',
                    'documentable_id' => $netapp->id,
                    'type' => 'license_file'
                ]);
            }
            array_push($documentRequest, [
                'url' => $request['tutorial']['pdf'],
                'documentable_type' => 'App\Models\Netapp',
                'documentable_id' => $netapp->id,
                'type' => 'tutorial_docs'
            ],);
            $document = $this->documentManager->create($documentRequest);
            $image = $this->imageManager->create([
                'url' => $request['service']['logo'],
                'imageable_type' => 'App\Models\Netapp',
                'imageable_id' => $netapp->id,
                'type' => 'logo'
            ]);
            if ($request->get('paymentplan') == "paymentplan") {
                foreach ($request->get('payAsGo') as $plan) {
                    $apiEndpointManager = $this->apiEndpointManager->create($plan['api_url'], $netapp->id);
                    $this->apiPaymentPlanManager->create($plan['prices'], $apiEndpointManager->id);
                }
            }
            \DB::commit();
            return response()->json(array('data' => $netapp, 'document' => $document, 'image' => $image));
        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(array('error' => $e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Netapp  $netapp
     * @return \Illuminate\Http\Response
     */
    public function show(Netapp $netapp, $id)
    {
        $netapp = Netapp::where('id', $id)->with(['apiEndpoints.paymentplan', 'category', 'logo', 'pdf', 'user'])->active()->get()->toArray();
        if (!$netapp) {
            return abort(404);
        }
        $netapp = $netapp[0];
        return view('netapp-single', compact('netapp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Netapp  $netapp
     * @return \Illuminate\Http\Response
     */
    public function edit($netapp)
    {
        $netappType = NetappType::all();
        $categories = Category::all();
        $netapp = Netapp::where(['id' => $netapp, 'user_id' => auth()->user()->id])->with(['logo', 'license', 'pdf', 'apiEndpoints.paymentplan',])->get()->toArray();
        if (!$netapp) {
            return abort(404);
        }
        return view('edit-dashboard-temp', compact('netapp', 'netappType', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Netapp  $netapp
     * @return \Illuminate\Http\Response
     */
    public function update(NetappRequest $request, $id)
    {
        if ($request->user_id !== auth()->user()->id) {
            return response()->json(array('msg' => "UnAuthorized", 'error' => '402'));
        }
        \DB::beginTransaction();
        try {
            $netapp = $this->netappManager->update($request->all(), $id);
            if ($request["service"]["logoId"] == null) {
                $image = $this->imageManager->create([
                    'url' => $request['service']['logo'],
                    'imageable_type' => 'App\Models\Netapp',
                    'imageable_id' => $netapp->id,
                    'type' => 'logo'
                ]);
            } else {
                $image = $this->imageManager->update([
                    'url' => $request['service']['logo'],
                    'imageable_type' => 'App\Models\Netapp',
                    'imageable_id' => $netapp->id,
                    'type' => 'logo'
                ], $request["service"]["logoId"]);
            }
            if ($request->get('paymentplan') == "paymentplan") {
                ApiEndpoint::where('netapp_id', $netapp->id)->delete();
                ApiPaymentPlan::whereIn('api_endpoint_id', $request->endpointIds)->delete();
                foreach ($request->get('payAsGo') as $plan) {
                    $apiEndpointManager = $this->apiEndpointManager->create($plan['api_url'], $netapp->id);
                    $this->apiPaymentPlanManager->create($plan['prices'], $apiEndpointManager->id);
                }
            }
            \DB::commit();
            return response()->json(array('data' => $netapp));
        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(array('error' => $e->getMessage()));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Netapp  $netapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Netapp $netapp)
    {
        //
    }
}

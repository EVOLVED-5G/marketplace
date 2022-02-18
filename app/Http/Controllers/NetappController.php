<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\ApiEndpoint\ApiEndpointManager;
use App\BusinessLogicLayer\ApiPaymentPlan\ApiPaymentPlanManager;
use App\BusinessLogicLayer\Document\DocumentManager;
use App\BusinessLogicLayer\Image\ImageManager;
use App\BusinessLogicLayer\Netapp\NetappManager;
use App\Http\Requests\NetappRequest;
use App\Models\Netapp;
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
        //
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

        \DB::beginTransaction();
        try {
            $netapp = $this->netappManager->create($request->all());
            $document = $this->documentManager->create([
                'url' => $request['tutorial']['pdf'],
                'documentable_type' => 'App\Models\Netapp',
                'documentable_id' => $netapp->id,
                'type' => 'tutorial_docs'
            ]);
            $image = $this->imageManager->create([
                'url' => $request['service']['logo'],
                'imageable_type' => 'App\Models\Netapp',
                'imageable_id' => $netapp->id,
                'type' => 'logo'
            ]);
            if ($request->get('payasgo') == true) {
                foreach ($request->get('payAsGo') as $plan) {
                    $apiEndpointManager = $this->apiEndpointManager->create($plan['api_url']);
                    $this->apiPaymentPlanManager->create($plan['prices'], $apiEndpointManager->id);
                    $netapp->apiEndpoints()->attach($apiEndpointManager);
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
    public function show(Netapp $netapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Netapp  $netapp
     * @return \Illuminate\Http\Response
     */
    public function edit(Netapp $netapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Netapp  $netapp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Netapp $netapp)
    {
        //
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

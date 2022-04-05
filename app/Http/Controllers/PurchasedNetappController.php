<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\PurchasedNetapp\PurchasedNetappManager;
use App\Models\PurchasedNetapp;
use App\Models\User;
use App\Repository\PurchasedNetappRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PurchasedNetappController extends Controller
{
    protected $purchasedNetapp;
    protected $purchasedNetappRepository;

    public function __construct(
        PurchasedNetappManager $purchasedNetapp,
        PurchasedNetappRepository $purchasedNetappRepository
    ) {
        $this->purchasedNetapp = $purchasedNetapp;
        $this->purchasedNetappRepository = $purchasedNetappRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PurchasedNetapp|User
     */
    public function purchase(Request $request)
    {
        return $this->purchasedNetapp->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showRevenue($id)
    {
        $purchasedNetapps = PurchasedNetapp::where('netapp_id', $id)->where('user_id', '!=', auth()->user()->id);
        if (!$purchasedNetapps) {
            return abort(404);
        }
        $purchasedNetapps = $purchasedNetapps->get();
        $totalPurchase = $purchasedNetapps->count();
        return view('revenue-page', compact('purchasedNetapps', 'totalPurchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $hash
     * @return Application|Factory|View|Response
     */
    public function myPurchasedNetapp(string $hash) {
        $myPurchasedNetapp = $this->purchasedNetappRepository->where(['hash' => $hash], array('*'), ['netapp']);
        if (!$myPurchasedNetapp) {
            return abort(404);
        }
        return view('purchased-netapp', compact('myPurchasedNetapp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

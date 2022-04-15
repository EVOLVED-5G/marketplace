<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\PurchasedNetapp\PurchasedNetAppManager;
use App\Models\PurchasedNetApp;
use App\Models\User;
use App\Repository\PurchasedNetAppRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PurchasedNetAppController extends Controller
{
    protected $purchasedNetAppManager;
    protected $purchasedNetAppRepository;

    public function __construct(
        PurchasedNetAppManager    $purchasedNetAppManager,
        PurchasedNetAppRepository $purchasedNetAppRepository
    ) {
        $this->purchasedNetAppManager = $purchasedNetAppManager;
        $this->purchasedNetAppRepository = $purchasedNetAppRepository;
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
     * @return PurchasedNetApp|User
     */
    public function purchase(Request $request)
    {
        return $this->purchasedNetAppManager->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function showRevenue($id)
    {
        $purchasedNetApps = PurchasedNetApp::where('netapp_id', $id)->where('user_id', '!=', auth()->id())->get();
        return view('revenue-page', compact('purchasedNetApps'));
    }

    /**
     * Show a view with all purchased Netapps.
     *
     * @return Application|Factory|View
     */
    public function myPurchasedNetApps() {
        $purchasedNetApps = $this->purchasedNetAppManager->getPurchasedNetAppsForUser(auth()->id());
        return view('purchased-netapps', compact('purchasedNetApps'));
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

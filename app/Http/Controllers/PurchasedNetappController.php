<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\PurchasedNetapp\PurchasedNetappManager;
use App\Models\PurchasedNetapp;
use Illuminate\Http\Request;

class PurchasedNetappController extends Controller
{
    protected $purchasedNetapp;
    public function __construct(
        PurchasedNetappManager $purchasedNetapp
    ) {
        $this->purchasedNetapp = $purchasedNetapp;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request)
    {
        return $this->purchasedNetapp->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myPurchasedNetapp($id)
    {
        $myPurchasedNetapp = PurchasedNetapp::where('id', $id)->first();
        if (!$myPurchasedNetapp) {
            return abort(404);
        }
        return view('purchased-netapp', compact('myPurchasedNetapp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

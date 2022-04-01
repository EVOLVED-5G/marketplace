<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\SaveNetapp\SaveNetappManager;
use App\Models\SavedNetapp;
use Illuminate\Http\Request;

class SaveNetappController extends Controller
{
    protected $saveNetappManager;
    public function __construct(
        SaveNetappManager $saveNetappManager
    ) {
        $this->saveNetappManager = $saveNetappManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saved_netapps = SavedNetapp::where('user_id', auth()->user()->id)->get();
        return view('saved-netapp', compact('saved_netapps'));
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
    public function store(Request $request)
    {
        return $this->saveNetappManager->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy(Request $request)
    {
        return $this->saveNetappManager->delete($request->id);
    }
}

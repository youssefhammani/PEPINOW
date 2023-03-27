<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreplantsRequest;
use App\Http\Requests\UpdateplantsRequest;
use App\Models\plants;

class PlantsController extends Controller
{
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
     * @param  \App\Http\Requests\StoreplantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreplantsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function show(plants $plants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function edit(plants $plants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateplantsRequest  $request
     * @param  \App\Models\plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateplantsRequest $request, plants $plants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function destroy(plants $plants)
    {
        //
    }
}

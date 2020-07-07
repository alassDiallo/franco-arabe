<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flashy;
use App\Models\Mois;
class ControllerMois extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Mois::create([
            'nomMois'=>'Octobre'
        ]);
        Mois::create([
            'nomMois'=>'Novembre'
        ]);
        Mois::create([
            'nomMois'=>'Decembre'
        ]);
        Mois::create([
            'nomMois'=>'Janvier'
        ]);
        Mois::create([
            'nomMois'=>'Fevrier'
        ]);
        Mois::create([
            'nomMois'=>'Mars'
        ]);
        Mois::create([
            'nomMois'=>'Avril'
        ]);
        Mois::create([
            'nomMois'=>'Mai'
        ]);
        Mois::create([
            'nomMois'=>'Juin'
        ]);
        Mois::create([
            'nomMois'=>'Juillet'
        ]);

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
        //
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
    public function destroy($id)
    {
        //
    }
}

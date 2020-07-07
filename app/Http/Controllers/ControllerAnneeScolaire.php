<?php

namespace App\Http\Controllers;

use App\Models\anneeScolaire;
use Illuminate\Http\Request;
use Flashy;

class ControllerAnneeScolaire extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anneeScolaires.ajouterAnneeScolaire');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anneeScolaires.ajouterAnneeScolaire');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'anneeDebut'=>'required|integer|min:'.date('Y').'|unique:annee_scolaires',
            'anneeFin'=>'required|integer|min:'.($request->anneeDebut+1).'|max:'.($request->anneeDebut+1).'|unique:annee_scolaires',
        ]);
        anneeScolaire::create([
            'anneeDebut'=>$request->anneeDebut,
            'anneeFin'=>$request->anneeFin
        ]);
        flash('annee Scolaire ajouté avec succé');
        Flashy::success('annee Scolaire ajouté avec succé');
        return redirect()->route('anneeScolaire.index');

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

    }
}

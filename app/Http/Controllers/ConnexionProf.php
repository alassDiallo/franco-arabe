<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use App\Models\Classe;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionProf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Professeur::where('nomUtilisateur',Auth::user()->nomUtilisateur)->first();
        return view('profs.accueil',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afficherMesClasse(){
        if(request()->prof)
        $user = Professeur::where('nomUtilisateur',request()->prof)->firstOrFail();
        //dd($user);
        return view('profs.listeDeMesClasse',compact('user'));
    }

    public function create()
    {

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

    public function afficherClasse(){
        $user = Professeur::where('nomUtilisateur',Auth::user()->nomUtilisateur)->first();
        if(request()->classe){
            $classe = Classe::where('nomClasse',request()->classe)->firstOrFail();
            return view('profs.detailClasse',compact('classe','user'));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {

        return view('profs.detailClasse',compact('classe'));
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

    public function profil(){

        $prof = Professeur::where('nomUtilisateur',Auth::user()->nomUtilisateur)->first();
        return view('layout.profil',compact('prof'));
    }

    public function modifierProfil(Request $request){
        $this->validate($request,[
        'profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        /*$input['profil'] = time().'.'.$request->profil->extension();
        $user = Auth::user();
        $user->photo = $request->profil->move(public_path('/img/'), $input['profil']);
        $user->save();

        $prof = Professeur::where('nomUtilisateur',Auth::user()->nomUtilisateur)->first();
            return view('layout.profil',compact('prof'));*/
        if($file = $request->file('profil')){
            $ImageUpload = Image::make($file);
            $originalPath = public_path('/img/');
            $ImageUpload->save($originalPath.time().$file->getClientOriginalName());

            //$profil = $request->file('profil');
            //$filename = time() . ' . ' . $profil->getClientOriginalExtension();
            //Image::make($profil)->resize(300,300)->encode()->save( public_path('/img/'.$filename));
            $user = Auth::user();
            $user->photo = time().$file->getClientOriginalName();
            $user->save();
            $prof = Professeur::where('nomUtilisateur',Auth::user()->nomUtilisateur)->first();
            return view('layout.profil',compact('prof'));
        }

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

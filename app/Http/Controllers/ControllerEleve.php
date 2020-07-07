<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestEnregistrerEleve;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Inscription;
use App\Models\Tuteur;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\ControllerTuteur;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\anneeScolaire;
use App\Models\Classe_eleve;
use Flashy;
use MercurySeries\Flashy\FlashyNotifier;
//use Intervention\Image;
use Image;
use Illuminate\Validation\Rule;
use MercurySeries\Flashy\Flashy as FlashyFlashy;

class ControllerEleve extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function __construc(){
        $this->middleware('auth');
    }*/
    public function index()
    {

         if (request()->classe) {

            $eleves = Eleve::with('classes')->whereHas('classes', function ($query) {
                $query->where(['nomClasse'=>request()->classe,'anneeScolaire'=>annee()]);
            })->orderBy('nom')->paginate(10);
        } else {
            $eleves = Eleve::with('classes')->orderBy('nom')->paginate(10);
        }
        Flashy::success('Page de liste des éléves');
        return view('utilisateur.listeEleve', compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classe = Classe::all();
        return view('utilisateur.enregistrerEleve', compact('classe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classe = Classe::where('nomClasse', $request->classe)->first();
        if(!$classe)
        {
            session()->flash('message',"veuillez choisir la classe");
            return redirect()->route('eleve.create');
        }
        $annee = date('d-m-Y', strtotime(date('Y-m-d') . "-5 years"));
        if($request->telephone != null || $request->telephone != ""){
            $this->validate($request,[
                'telephone'=>'digits:9|starts_with:77,78,76,70,33,30|unique:eleves'
            ]);
        }
        $this->validate($request, [
            'nom' => 'required|min:2|string ',
            'prenom' => 'required|string|min:2',
            'adresse' => 'required|string |min:3',
            'photo'=>'required',
            'dateDeNaissance' => 'required|date|before_or_equal:'.$annee,
            'lieudenaissance' => 'required|alpha|string|min: 3',
            'sexe' => 'required',
            'sommeVerse' => 'required|integer|min:1|max:'.$classe->montantInscription,
            'classe' => 'required',
            //'telephoneTuteur'=>'required | digits:9',
        ]);
        $file;
        $nomUtilisateur= nomUser();
        if($request->file('photo')){
            $file = $request->file('photo');
            $ImageUpload = Image::make($file);
            $originalPath = public_path('/img/eleves/');
            $ImageUpload->save($originalPath.time().$file->getClientOriginalName());
        }
        if ($request->numeroTuteur)
        {
            if ($tit=Tuteur::where('telephoneTuteur', $request->numeroTuteur)->OrWhere('nomUtilisateur',$request->numeroTuteur)->first()) {
                //$tit = Tuteur::where('telephoneTuteur', $request->numeroTuteur)->OrWhere('nomUtilisateur',$request->numeroTuteur)->firstOrFail();
                //$nomUtilisateur= nomUser();
                $data = ['nomUtilisateur'=>$nomUtilisateur,
                'profil'=>'eleve',
                'password'=>'12345678'];
                (new RegisterController())->create($data);
                Eleve::create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'adresse' => $request->adresse,
                    'telephone' => $request->telephone,
                    'dateDeNaissance' => $request->dateDeNaissance,
                    'lieuDeNaissance' => $request->lieudenaissance,
                    'nomUtilisateur' => $nomUtilisateur,
                    'tuteur_id' => $tit->id,
                    'sexe' => $request->sexe,
                    'photo'=>time().$file->getClientOriginalName(),
                ])->classes()->attach(
                    $classe->id,
                    [
                        'anneeScolaire'=>anneeScolaire(),
                        'montant' => $request->sommeVerse,
                        'reliquat' => ($classe->montantInscription - $request->sommeVerse),
                        'statu' => 1
                    ]
                );
            } else {
                flash("le numero du tuteur " . $request->numeroTuteur . "ne corresponds a aucun tuteur", "danger");
                Flashy::error("le numero du tuteur " . $request->numeroTuteur . "ne corresponds a aucun tuteur");
                return redirect()->route('eleve.create');
            }
        } else {
            (new ControllerTuteur())->store($request);
            $tit = Tuteur::where('telephoneTuteur',$request->telephoneTuteur)->first();
            //$nomUtilisateur= nomUser();
                $data = ['nomUtilisateur'=>$nomUtilisateur,
                'profil'=>'eleve',
                'password'=>'12345678'];
                (new RegisterController())->create($data);
            $el = Eleve::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'dateDeNaissance' => $request->dateDeNaissance,
                'lieuDeNaissance' => $request->lieudenaissance,
                'nomUtilisateur' => $nomUtilisateur,
                'tuteur_id' => $tit->id,
                'sexe' => $request->sexe,
                'photo'=>time().$file->getClientOriginalName(),
            ])->classes()->attach(
                $classe->id,
                [
                    'anneeScolaire'=>anneeScolaire(),
                    'montant' => $request->sommeVerse,
                    'reliquat' => ($classe->montantInscription - $request->sommeVerse),
                    'statu' => 1
                ]
            );
        }
        flash("Eleve  créer avec succé");
        Flashy::success('Eleve créer avec succé');
        return redirect()->route('carte.show',['carte'=>$nomUtilisateur]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Eleve $eleve)
    {
        //$eleve = Eleve::with('classes')->with('tuteur')->with('matieres')->where('id', $eleve)->firstOrFail();
        Flashy::success('information de l\'éléve');
        return view('utilisateur.afficherEleve')->with('eleve', $eleve);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Eleve $eleve)
    {
        //$classe = Classe::all();
        //$eleve = Eleve::with('classes')->Where('id', $eleve)->firstOrFail();
        return view('utilisateur.modifierEleve', compact('eleve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Eleve $eleve)
    {
        $annee = date('d-m-Y', strtotime(date('Y-m-d') . "-5 years"));
        if($request->telephone != null || $request->telephone != ""){
            $this->validate($request,[
                'telephone'=>[
                    'digits:9',
                    'starts_with:77,78,76,70,33,30',
                    Rule::unique('eleves')->ignore($eleve),
                    ],
            ]);
        }
        $this->validate($request, [
            'nom' => 'required|min:2|string ',
            'prenom' => 'required|string|min:2',
            'adresse' => 'required|string |min:3',
            'dateDeNaissance' => 'required|date|before_or_equal:'.$annee,
            'lieudenaissance' => 'required|alpha|string|min: 3',
        ]);
        Eleve::where('nomUtilisateur',$eleve->nomUtilisateur)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'dateDeNaissance' => $request->dateDeNaissance,
            'lieuDeNaissance' => $request->lieudenaissance,
        ]);
        flash('modifiaction effectuer avec succé pour l\'eleve numero '.$eleve->nomUtilisateur);
        Flashy::success('modifiaction effectuer avec succé pour l\'eleve numero '.$eleve->nomUtilisateur);
        return redirect()->route('eleve.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($eleve)
    {
        Eleve::where('id', $eleve)->delete();
        flash("Eleve  supprimer avec succé", "danger");
        return redirect()->route('eleve.index');
    }
}

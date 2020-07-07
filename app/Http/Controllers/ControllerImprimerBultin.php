<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use PDF;
use App\Models\Eleve;
use Spipu\Html2Pdf\Html2Pdf;
use Flashy;

class ControllerImprimerBultin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$eleve = Eleve::where('nomUtilisateur',request()->bultin)->with('matieres')->with('classes')->first();

        /*$somC=0;
        $som=0;
        $eleve = Eleve::where('nomUtilisateur',request()->eleve)->with('matieres')->with('classes')->first();
        foreach ($eleve->classes()->where('anneeScolaire',annee())->get() as $classes){
            $somC = $classes->matieres()->where('classe_id',$classes->id)->sum('coefficient');
        }
        foreach( $eleve->matieres()->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->get() as $matiere){
        $som += $matiere->classes()->where('matiere_id',$matiere->id)->first()->pivot->coefficient * $matiere->pivot->note;
        //$somC = $matiere->classes()->where('matiere_id',$matiere->id)->get()->sum('coefficient');
        }
        $somCa=0;
        $soma=0;
        $m=$somC*$eleve->matieres()->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->count();
        foreach ($eleve->classes()->where('anneeScolaire',annee())->get() as $classes){
            $somCa = $classes->matiere_arabes()->where('classe_id',$classes->id)->sum('coefficient');
        }
        foreach( $eleve->matiere_arabes()->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->get() as $matiere){
        $soma += $matiere->classes()->where('matiere_arabe_id',$matiere->id)->first()->pivot->coefficient * $matiere->pivot->note;
        //$somC = $matiere->classes()->where('matiere_id',$matiere->id)->get()->sum('coefficient');
        }

*/
        $eleve = Eleve::where('nomUtilisateur',request()->eleve)->with('matieres')->with('classes')->first();
        //$m=$eleve->classes()->where('anneeScolaire',annee())->count() ;
        $som=0;
        $noteMax=10;
        //$eleve = Eleve::where('nomUtilisateur',$id)->with('matieres')->with('classes')->first();
        $somC = $eleve->classes()->where('anneeScolaire',annee())->first()->matieres()->whereNull('nomArabe')->sum('coefficient');
        $m=$eleve->classes()->where('anneeScolaire',annee())->first()->matieres()->whereNull('nomArabe')->count()*$noteMax;
        //$somC = $classes->matieres()->where('classe_id',$classes->id)->sum('coefficient');

        foreach( $eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->get() as $matiere){
        $som += $matiere->classes()->where('matiere_id',$matiere->id)->first()->pivot->coefficient * $matiere->pivot->note;
        }

        $somCa=$eleve->classes()->where('anneeScolaire',annee())->first()->matieres()->whereNotNull('nomArabe')->sum('coefficient');
        $ma = $eleve->classes()->where('anneeScolaire',annee())->first()->matieres()->whereNotNull('nomArabe')->count()*$noteMax;
        $soma=0;
        /*foreach ($eleve->classes()->where('anneeScolaire',annee())->get() as $classes){
            $somCa = $classes->matiere_arabes()->where('classe_id',$classes->id)->sum('coefficient');
        }*/
        foreach( $eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->get() as $matiere){
        $soma += $matiere->classes()->where('matiere_id',$matiere->id)->first()->pivot->coefficient * $matiere->pivot->note;
        //$somC = $matiere->classes()->where('matiere_id',$matiere->id)->get()->sum('coefficient');
        }

        $classe = Classe::where('nomClasse',request()->classe)->first();

       /* $view = view('bultins.imprimer',compact('eleve','som','soma','m','ma','classe'));
        try{
                $pdf = new HTML2PDF('P','A4','fr');
                $pdf->pdf->setDisplayMode('fullpage');
                $pdf->writeHTML($view);
                $pdf->output('bultin.pdf');
        }
        catch(HTML2PDF_exception $e){
                dd($e);

        }*/
        $moy=round(($eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->first()->moyenne??0),2);
        $moyA=round(($eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->first()->moyenneArabe??0),2);
            //return $view;
        $pdf = PDF::loadView('bultins.imprimer',compact('eleve','som','soma','m','ma','classe','moy','moyA'));
        return $pdf->download('bultin-'.$eleve->nomUtilisateur.'-'.$eleve->prenom.'-'.$eleve->nom.annee().'-'.request()->semestre);
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

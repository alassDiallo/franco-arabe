<div class="row">
            <div class="form-group col-lg-6">
                <label for="classe">Classe*</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select class="form-control custom-select @error('classe') is-invalid @enderror" id="classe" name="classe" onchange="montant();">
                    <option value="">--selectionner--</option>
                    @foreach($classe as $classe)
                <option {{ old('classe')==$classe->nomClasse? "selected":"" }}> {{ $classe->nomClasse   }}</option>
                    @endforeach
                </select>
            </div>
            @if(session()->has('message'))
    <span class="helper helper-danger ml-2">
            {{ session()->get('message') }}
         </span>
         @endif
            @error('classe')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
        </div>
        <div class="form-group col-lg-6">
            <label for="anneeScolaire">Annee Scolaire*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <input type="text" name="anneeScolaire" value="{{ anneeScolaire() }}" class="form-control" disabled/>
        </div>
        </div>
        </div>
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="nom">nom *</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="nom" maxlength="20" placeholder="entrer le le nom de l'éléve" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" />
</div>
@error('nom')
        <span class="helper" role="alert">
           {{ $message }}
        </span>
 @enderror

</div>

    <div class="form-group col-lg-6">
        <label for="nom">prenom *</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
        <input type="text" name="prenom" placeholder="entrer le prenom de l'éléve" maxlength="50" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" />
    </div>
    @error('prenom')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
    </div>
<div class="row">
    <div class="form-group col-lg-6">
        <label for="nom">date de naissance *</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
        <input type="date" name="dateDeNaissance" placeholder="" class="form-control @error('dateDeNaissance') is-invalid @enderror" value="{{ old('dateDeNaissance') }}" />
    </div>
    @error('dateDeNaissance')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
    <div class="form-group col-lg-6">
        <label for="nom">lieu de naissance *</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" maxlength="20" name="lieudenaissance" placeholder="entrer le lieu de naissance de l'éléve" class="form-control @error('lieudenaissance') is-invalid @enderror" value="{{ old('lieudenaissance') }}" />
</div>
@error('lieudenaissance')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
</div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        <label for="adresse">Adresse*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" maxlength="30" name="adresse" placeholder="entrer l'adresse de l'éléve" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}" />
    </div>
    @error('adresse')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
<div class="form-group col-lg-6">
    <label for="profil">Sexe*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select class="form-control @error('sexe') is-invalid @enderror custom-select" name="sexe" value="{{ old('sexe') }}">
        <option value="">--selectionner--</option>
        <option  {{ old('sexe')=="garçon"?"selected":"" }}>garçon</option>
        <option {{ old('sexe')=="fille"?"selected":"" }}>fille</option>
    </select>
</div>
@error('sexe')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
</div>
</div>

<div class="row">
<div class="form-group col-lg-6">
        <label for="telephone">telephone*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" name="telephone" maxlength="9" placeholder="entrer le le numero de téléphone de l'éléve" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" />
    </div>
    @error('telephone')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
    </div>
<div class="form-group col-lg-6">
    <label for="nom">Somme versée*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="sommeVerse" maxlength="6"id="sommeVerse" placeholder="Entere la somme verser a l'inscription" class="form-control @error('sommeVerse') is-invalid @enderror" value="{{ old('sommeVerse') }}" />
</div>
<span id="mon">
</span>
@error('sommeVerse')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</div>
<div class="form-group col-lg-6">
    <label for="nom">photo*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="file" name="photo"  class="file-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" />
</div>
@error('photo')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</div>
<div class="col-lg-12">
   <p> Choisir le tuteur</p>
    <select onchange="Monchoix();" id="choix" class="form-control custom-select">
        <option value="">--selectionner</option>
        <option value="ancien">ancien parent</option>
        <option value="nouveau">nouveau parent</option>
    </select>
</div>
</div>
    <p class="col-lg-12" id="demo"></p>
<input type="submit"  name="valider" value="{{ $validation }}" role="button" class="btn btn-primary form-control"/>
</div>
</form>
</div>

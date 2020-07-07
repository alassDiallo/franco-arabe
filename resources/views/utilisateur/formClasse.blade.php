<div class="form-group">
    <label for="nom">Nom classe</label>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
<input type="text" name="nomClasse" placeholder="entrer le nom de la class" class="form-control @error('nomClasse') is-invalid @enderror mt-2" value="{{ old('nomClasse') }}" />
</div>
</div>
@if(session()->has('message'))
<span class="helper helper-danger">{{ session()->get('message') }}</span>
@endif
@error('nomClasse')
<span class="helper helper-danger">{{ $message }}</span>
@enderror

<div class="form-group">
    <label for="montantInscription">Montant Inscription</label>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
<input type="text" name="montantInscription" placeholder="entrer le montant de l'inscription de la class" class="form-control @error('montantInscription') is-invalid @enderror" value="{{ old('montantInscription') }}" />
</div>
</div>
@error('montantInscription')
<span class="helper helper-danger">{{ $message }}</span>
@enderror

<div class="form-group">
    <label for="mensualite">Mensualité</label>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
<input type="text" name="mensualite" placeholder="entrer la mensualite de la class" class="form-control @error('mensualite') is-invalid @enderror" value="{{ old('mensualite') }}" />
</div>
</div>
@error('mensualite')
<span class="helper helper-danger">{{ $message }}</span>
@enderror

<input type="submit"  name="valider" value="Enregistrer la classe" role="button" class="btn btn-primary form-control"/>
</form>

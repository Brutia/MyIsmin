@extends('common.layout') 


@section('content')

<header class="post-header">
	<h1 class="page-header">Première et deuxième année</h1>
</header>

<div class="row">
	<div class="col-sm-6">
		<p class="text-justify">Informatique</p>
		{{--<img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail" src="img/info.jpg" />--}}
	</div>
	<div class="col-sm-6">
		<p class="text-justify">Microélectronique</p>
		<img style="width: 335px, height: 335px" class="img-circle img-thumbnail" src="img/microelec.jpg" />
	</div>
	<div class="col-sm-6">
		<p class="text-justify">Sciences</p>
		<img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail"
			src="img/sciences.jpg" />
	</div>
	<div class="col-sm-6">
		<p class="text-justify">Management</p>
		<img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail"
			src="img/management.jpg" />
	</div>
</div>

<header class="post-header">
	<h1 class="page-header">Troisième année</h1>
</header>

<h3 class="post-title">Majeures possibles</h3>

<div class="row">
	<div class="col-sm-4">
		<p class="text-justify">Informatique</p>
		<br /> <img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail"
			src="img/majeure_info.jpg" />
	</div>
	<div class="col-sm-4">
		<p class="text-justify">Systèmes embarqués</p>
		<br /> <img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail"
			src="img/systeme_emba.png" />
	</div>
	<div class="col-sm-4">
		<p class="text-justify">Conception microélectronique</p>
		<img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail"
			src="img/concept_microelec.jpg" />
	</div>
</div>

<h3 class="post-title">Enjeux technologiques</h3>
<div class="row">
	<div class="col-sm-6">
		<p class="text-justify">
			Technologies de l'informatique <br /> Supply Chain
		</p>
		<img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail"
			src="img/supply_chain.jpg" />
	</div>
	<div class="col-sm-6">
		<p class="text-justify">Mobilité & Sécurité</p>
		<br /> <img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail"
			src="img/mobi_secu.jpg" />
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<p class="text-justify">Electronique & Energie</p>
		<img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail"
			src="img/energie.jpg" />
	</div>
	<div class="col-sm-6">
		<p class="text-justify">Bioélectronique</p>
		<img style="width: 335px, height: 335px"
			class="img-circle img-thumbnail" src="img/bio.jpg" />
	</div>
</div>


@endsection

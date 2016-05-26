@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form role="form" class="col-md-9 go-right" method="post"
			action={{URL::to('/admin/asso/'.$asso->id) }} >
				<input type="hidden" name="_method" value="PUT">
				{!! csrf_field() !!}
				
				<div class="form-group">
					<label for="header">Nom {{$type}}</label>
					<input name="header" class="form-control" value="{{$asso->name}}">
				
				</div>
	
				<div class="form-group">
	
					<label for="lieu">Article</label> <select class="form-control"
						id="lieu" name="lieu">
						@foreach($articles as $article)
							<option value={{$article->id}} @if($article_s == $article->id) selected @endif > {{$article->name}}</option>
						@endforeach
					</select>
				</div>
	
				<div class="form-group">
					<button type="submit" class="btn btn-default">Enregistrer</button>
				</div>
	
			</form>
		</div>
	</div>
</div>


@endsection
<script type="text/javascript"
	src="{{URL::asset('assets/js/jquery.js')}}"></script>
<link rel="stylesheet" type="text/css"
	href="{{URL::asset('assets/css/jquery-ui.css')}}">
<script type="text/javascript"
	src="{{URL::asset('assets/js/moment-with-locales.js')}}"></script>
<script type="text/javascript"
	src="{{URL::asset('assets/js/collapse.js')}}"></script>
<script type="text/javascript"
	src="{{URL::asset('assets/js/transition.js')}}"></script>
<script type="text/javascript"
	src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript"
	src="{{URL::asset('assets/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery-ui.min.js')}}"></script>



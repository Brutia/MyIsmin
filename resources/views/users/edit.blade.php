@extends('layouts.app') 


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form role="form" class="col-md-12 go-right" method="post" action="{{URL::to('/admin/user/'.$user->id)}}" >
				<input type="hidden" name="_method" value="PUT">
				{!! csrf_field() !!}
				<h2>Editer l'utilisateur : {{$user->username}}</h2>
				<label>Role(s)</label></br>
				<select id="selectpicker" name="role[]" multiple>
					@foreach($roles as $role)
				  		<option value="{{$role->id}}" 
				  			@if(in_array($role->name, $user_roles) )
				  				selected 
				  			@endif 
				  			>
				  			{{$role->name}}
				  		</option>
				  	@endforeach
				</select>
				
				<div class="col-sm-offset-2 col-sm-10">
      				<button type="submit" class="btn btn-primary">Enregistrer</button>
    			</div>
				
			</form>
		</div>
	</div>
</div>


@endsection
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/jquery-ui.css')}}" >
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap-select.min.css')}}" >
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#selectpicker').selectpicker();
	});
</script>


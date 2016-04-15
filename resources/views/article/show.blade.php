@extends('common.layout')


@section('content')

@if( Auth::user())	
	<button type="button" class="btn btn-default btn-lg">
  		<a class="glyphicon glyphicon-pencil" aria-hidden="true" href={{URL::to('/article/'.$content_header.'/edit')}}></a>
	</button>
@endif

<p class="text-justify">
	{{$content}}
</p>

@endsection
@extends('common.layout')


@section('content')

@if( Auth::user())	
	
	<a class="btn btn-default " aria-hidden="true" href={{URL::to('/article/'.$article_name.'/edit')}}>
	<div class="glyphicon glyphicon-pencil">
<!-- 		<button type="button" class=""></button> -->
	</div></a>
@endif

<p class="text-justify">
	{!!$content!!}
</p>

@endsection
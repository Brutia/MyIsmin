@extends('common.layout', ['banner'=>$banner, 'assos'=>$assos])


@section('content')


<p class="text-justify">
	{{$content}}
</p>

@endsection
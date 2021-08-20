@extends('layouts.master')

@section('meta')
	<title>{{setting('site.title')}} | {{$page->title}}</title>
	<meta name="description" content="{{$page->meta_description}}">
	<meta name="keywords" content="{{$page->meta_keywords}}">
@stop

@section('page-content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 style="text-align: center;">
					{{$page->title}}
				</h2>
			</div>
			<div class="col-12">
				<img src="{{Voyager::image($page->image)}}" style="width:100%;" alt="{{$page->title}}">				
			</div>
			<hr>
			<div class="col-12">
				@php
					echo $page->body;
				@endphp
			</div>
		</div>
	</div>
@stop
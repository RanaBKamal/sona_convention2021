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
			<div class="col-12" style="margin-top:30px;">
				@if($about_us_members->isNotEmpty())
					<div class="row">
						@foreach($about_us_members as $speaker)
	                        <div class="col-md-3">
	                            <div class="speaker-new">

	                                <figure>
	                                    <img alt="{{$speaker->name}}" class="img-responsive center-block" src="{{Voyager::image($speaker->image)}}">
	                                </figure>

	                                <h4>{{$speaker->name}}</h4>

	                                <p>{{$speaker->conference_designation}}</p>
	                                <h4>{{$speaker->title}}</h4>
		                             <ul class="social-block">
	                                    <li><a href=""><i class="ion-email"></i></a>{{$speaker->email}}</li>
	                                </ul>
	                                <ul class="social-block">
	                                    <li><a href=""><i class="ion-ios-telephone"></i></a>{{$speaker->phone}}</li>
	                                </ul>
	                            </div><!-- /.speaker -->
	                        </div><!-- /.col-md-4 -->
	                    @endforeach
					</div>
				@endif
					
			</div>
		</div>
	</div>
@stop
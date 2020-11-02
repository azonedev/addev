@extends('frontend.home-master')
@section('title','adDev by azOneDev')

@section('main')
    
		<div class="container">
			<div class="p-2"></div>
			<h3 class="sub-title">All Categories</h3>
			<div class="p-2"></div>
			<div class="row">
				@foreach ($all_category as $item)
                    <div class="col-md-3 col-sm-4 text-center p-2">
                        <img src='{{asset("$item->cat_image")}}' width="60%" alt="">
                        <div class="p-2"></div>
                        <a href="{{url('/category')}}/{{$item->cat_name}}"><h4 class="primary">{{$item->cat_name}}</h4></a>
                    </div>
                @endforeach
			</div>
		</div>
		<!-- / category -->
@endsection
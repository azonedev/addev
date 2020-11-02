@extends('frontend.home-master')

@section('title','adDev tag-result')
    
@section('main')
    <!-- main [result] -->


<div class="container p-2">
	<h4 class="sub-title">Category posts from: <small class="primary">{{$name}}</small></h4>
</div>

<div class="container result">
	<div class="p-2"></div>
	<div class="row">
		@foreach ($categoryData as $item)
            <div class="col-md-6 p-2">
                <div class="shadow-box border-y p-2">
                    <div class="row">
                        <div class="col-5">
                            <img class="box-img" src='{{asset("$item->image")}}' width="95%" alt="">
                        </div>
                        <div class="col-7">
                            <a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}">
                                <h4>{{$item->ad_title}}</h4>
                            </a>
                            <h6>Price : <span>{{$item->price}} $</span></h6>
                            
                            <small class="secondary-btn">{{$item->category}}</small>

                            <p></p>
                            <p><i class="fa fa-clock-o"></i> {{$item->ad_start}}</p>
                            @if ($item->status=="paid")
                                
                            <span class="pro"><i class="fa fa-certificate"></i> Premium</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>    
        @endforeach
		
	</div>
	<div class="p-2"></div>

</div>


<!-- /main -->
@endsection
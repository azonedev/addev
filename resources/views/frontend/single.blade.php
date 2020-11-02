@extends('frontend.home-master')
@section('title','adDev')
@section('main')
    		<!-- single -->
    @foreach ($ad as $item)
        
		<div class="container">
			<div class="p-4"></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="owl-carousel owl-theme">
                         
                        <img src='{{asset("$item->image")}}'  width="100%" alt="">
                        @if ($item->image_gallery !=NULL)
                            @php
								 $images = (json_decode($item->image_gallery, true));
								//  dd($image_counts);
                            @endphp
							{{-- @foreach ($image_counts as $value) --}}
							
                                @php
                                    $image_count = count($images);
                                @endphp
                                @for ($i = 0; $i < $image_count; $i++)
                                    <img src='{{asset("$images[$i]")}}'  width="100%" alt="">
                                @endfor
                            {{-- @endforeach --}}
                        @endif
					</div>
					<div class="p-2"></div>
				</div>
				<div class="col-md-6 col-sm-6">
					<h3>{{$item->ad_title}}</h3>
                    <h4>Price : <span class="primary">{{$item->price}}</span> $</h4>
                    <small style="color:red">{{$item->price_negotiable}} - {{$item->no_price}}</small>
					<p><i class="fa fa-map-marker primary"></i> {{$item->location}}</p>
					<p><i class="fa fa-clock-o"></i> {{$item->created_date}} </p>
                    <div class="p-2"></div>
                    
                    @if (Session('user_id')!=NULL)
                        <h4 class="primary">Contact Info :</h4>
                        <p>{{$item->contact}}</p>
                        <h4 class="primary">Address:</h4>
                        <p>{{$item->address}} | {{$item->location}}</p>
                    @else
                        <h4>Do you want to contact?
                            <br>
                            Please <a href="{{url('/login')}}/{{$item->id}}">login</a> first !
                        </h4>
                    @endif
                    
					<p>Tags : 
                        @php
						   $tags = $item->tags;
						@endphp
					    @php

					    $tagarr = explode(',',$tags);
					    $count   = count($tagarr);
										
					    @endphp

					    @for ($i = 0; $i < $count; $i++)
						    <a class="tag" href="{{url('/product')}}/{{$tagarr[$i]}}">{{$tagarr[$i]}}</a>
					    @endfor

					</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="p-3"></div>
			<h5 class="sub-title">Details :</h5>
			<hr>
			<div>
				{!!$item->product_details!!}
			</div>
		</div>
        <!-- /single -->
    @endforeach
    
@endsection

@section('extra-js')
    	<!-- owl slider -->
	<script src="{{asset('assets/owlcarousel/owl.carousel.min.js')}}"></script>

	<!-- main js -->

	<!-- only singlepage extra js -->

	<script type="text/javascript">
		$(document).ready(function(){
		  $('.owl-carousel').owlCarousel({
				// rtl:true,
			    loop:true,
			    margin:0,
			    // center:true,
			    autoplay:true,
			    autoplayTimeout:2000,
			    autoplayHoverPause:true,
			    // nav:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:1
			        },
			        768:{
			        	items:1
			        },
			        800:{
			        	items:1
			        },
			        1000:{
			            items:1
			        }
			    }
			});

		});
	</script>
@endsection
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
                        
                    @else
                        {{-- <h4>Do you want to contact?
                            <br>
                            Please <a href="{{url('/login')}}/{{$item->id}}">login</a> first !
						</h4> --}}
						
						<!-- Button trigger modal -->
						<h4>Do you want to contact? 
							<br>
							Please 
							<button type="button" class="btn primary-btn" data-toggle="modal" data-target="#exampleModal">
								login
							</button>
							first !
						</h4> 	
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Login here</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
									    <form action="{{url('/login/match')}}" method="post">

											<small style="color:red;text-align: center;">
												@if(Session::has('msg'))
													{{Session('msg')}}
												@endif
											</small>

											@csrf
											<h2 class="text-center">Log in</h2>       
											<div class="form-group">
												<input name="email" type="email" class="form-control" placeholder="Email" required="required">
											</div>
											<div class="form-group">
												<input name="password" type="password" class="form-control" placeholder="Password" required="required">
											</div>
											<input name="redirect_url" value="{{$re_url=$item->id}}" type="text" hidden>
											<div class="form-group">
												<button type="submit" class="btn contact-btn btn-block">Log in</button>
											</div>

											<div class="clearfix">
												<!-- <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
												<a href="#" class="float-right">Forgot Password?</a> -->
											</div>        
										</form>
										<p class="text-center"><a href="{{url('/register')}}">Create an Account</a></p>
							</div>
							
							</div>
						</div>
						</div>
                    @endif
                    <h4 class="primary">Address:</h4>
                    <p><i class="fa fa-map-marker primary"></i> {{$item->address}} | {{$item->location}}</p>
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
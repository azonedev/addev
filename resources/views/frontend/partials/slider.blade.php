<!-- slider & feature -->
		<div class="fluid light-bg feature">
			<div class="p-4"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-5 slider-category">
							<!-- <p><i class="fa fa-microchip"></i><a href="#">  Electronics</a></p>
							<p><i class="fa fa-car"></i><a href="#">Car & Vehicles</a></p>
							<p><i class="fa fa-home"></i><a href="#">House & Property</a></p>
							<p><i class="fa fa-car"></i><a href="#">Fashon & Design</a></p>
							<p><i class="fa fa-home"></i><a href="#">Old ware house</a></p> -->
							<h3>Categories</h3>
							<ul>
								@foreach ($top_cat as $item)
									<li>
										<i class="{{$item->cat_icon}}"></i>
										<a href="{{url('category')}}/{{$item->cat_name}}">{{$item->cat_name}}</a>
									</li>
								@endforeach
								
								<hr>
								<li>
									
									<a href="{{url('/all-category')}}">More</a>
								</li>
							</ul>
					</div>
					<div class="col-md-9 col-sm-7 p-2 slider">
						<div class="row">
							<div class="pl-2">
								<h4 class="sub-title">Feature Product</h4>
							</div>

							<!-- section one -->
							<div class="col-12">
								<div class="row owl-carousel owl-theme">
									@foreach ($paid as $item)
										<div class="col-md-4">
										<div class="white-bg rel bg-pro owl-bg" style="background-image: url('{{asset("$item->image")}}');">
												<div class="abs-full"></div>
												<div class="abs">
													<small class="secondary-btn">{{$item->category}}</small>
													<div class="p-2"></div>
													<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}
"><h4>{{$item->ad_title}}</h4></a>
													<h5>{{$item->price}} $</h5>
												</div>
										</div>
										<div class="p-2"></div>
									</div>
									@endforeach
								</div>
							</div>
							<!-- / section one -->
							<div class="p-3"></div>
							<!-- second section -->
							<div class="col-12">
								<div class="row">
									@foreach ($latest_3 as $item)
										<div class="col-md-4">
											<div class="white-bg rel rel-hover">
												<a href="#">
													<img class="br-10 shadow-box" src='{{asset("$item->image")}}' width="100%" alt="">
													<div class="abs">
														<small class="secondary-btn">{{$item->category}}</small>
													</div>
													<div class="abs abs-hover">
														<div class="abs-hover-text">
															<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}"><p>
																{{$item->ad_title}}
															</p></a>
															<span>{{$item->price}} $</span>
														</div>
													</div>
												</a>
											</div>
											<div class="p-2"></div>

										</div>
									@endforeach
								</div>
							</div>
							<!-- / second section -->
						</div>
					</div>
				</div>
			<div class="p-4"></div>
			</div>
		</div>
		<!-- / slider & feature -->
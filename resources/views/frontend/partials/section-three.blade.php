<div class="p-2"></div>

<div class="fluid light-bg">
			<div class="p-3"></div>
			<div class="container">
				<h3 class="title">{{$cat_3}}
					<div class="bb-70"></div>
				</h3>
				<div class="p-3"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							@foreach ($section_3_1 as $item)
								<div class="col-md-3 col-sm-6">
									<div class="white-bg rel">
										<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}">
											<img class="br-10 shadow-box" src='{{asset("$item->image")}}' width="100%" alt="">
										</a>
										<div class="abs">
											<small class="secondary-btn">{{$item->category}}</small>
										</div>
									</div>

									<div class="p-2"></div>
									<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}"><h4>{{$item->ad_title}}</h4></a>
									<div class="p-1"></div>
									<h5>{{$item->price}} $</h5>
									<div class="p-2"></div>	
								</div>
							@endforeach
							
						</div>
					</div>
				</div>
				<div class="row">
					@foreach ($section_3_2 as $item)
						
					<div class="col-md-6">
						<div class="row">
							<div class="col-6">
								<div class="white-bg rel">
									<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}">
											<img class="br-10 shadow-box" src='{{asset("$item->image")}}' width="100%" alt="">
										</a>
									<div class="abs">
										<small class="primary-btn">{{$item->category}}</small>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="p-2"></div>
								<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}"><h4>{{$item->ad_title}}</h4></a>
								<div class="p-1"></div>
								<h5>{{$item->price}} $</h5>	
								<p><i class="fa fa-map-marker"></i>{{$item->location}} </p>
								<p><i class="fa fa-clock-o"></i>{{$item->ad_start}} </p>
							</div>
						</div>
					</div>
					@endforeach

				</div>

				</div>
			<div class="p-3"></div>
		</div>
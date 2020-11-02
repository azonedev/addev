<div class="fluid white-bg">
			<div class="p-3"></div>

			<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-6">
					<h3 class="title">{{$cat_2}}
					<div class="bb-70"></div>
				</h3>
				<div class="p-3"></div>
				<div class="row">
					@foreach ($section_2 as $item)
						<div class="col-md-4 col-sm-6">
						<div class="white-bg rel bg-pro" style="background-image: url('{{asset("$item->image")}}');">
								<div class="abs-full"></div>
								<div class="abs">
									<small class="primary-btn">{{$item->category}}</small>
									<div class="p-2"></div>
									<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}
"><h4>{{$item->ad_title}}</h4></a>
									<h5>{{$item->price}} $</h5>
								</div>
						</div>
						<div class="p-3"></div>
					</div>
					@endforeach
				</div>
				</div>
				<div class="col-md-3 col-sm-6">
						<h4 class="sub-title">Recent Post</h4>
						<div class="p-2"></div>
						<div class="p-2"></div>
						@foreach ($latest_7 as $item)
							
							<div class="row">
								<div class="col-6">
									<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}"><img src='{{asset("$item->image")}}'width="100%" alt=""></a>
								</div>
								<div class="col-6">
									

									<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}"><span>{{$item->ad_title}}</span></a>
									<br>

									<span class="primary">Price:{{$item->price}} $</span>
								</div>
								<div class="p-2"></div>
							</div>
						@endforeach
						<div class="p-2"></div>
					</div>
				</div>
			</div>
		</div>
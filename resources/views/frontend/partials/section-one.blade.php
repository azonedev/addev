<div class="p-2"></div>
		<div class="fluid light-bg house-r">
			<div class="p-3"></div>
			<div class="container">
				<h3 class="title">{{$cat_1}}
					<div class="bb-70"></div>
				</h3>
				<div class="p-3"></div>
				<div class="row">
					@foreach ($section_1 as $item)
						
					<div class="col-md-3 col-sm-6">
						<div class="white-bg rel">
							<a href="#">
								<img class="br-10 shadow-box" src='{{asset("$item->image")}}' width="100%" alt="">
								<div class="abs">
									<small class="primary-btn">{{$item->category}}</small>
								</div>
							</a>
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
			<div class="p-3"></div>
		</div>
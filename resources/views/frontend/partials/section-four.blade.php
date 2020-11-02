		<div class="p-3"></div>
<div class="fluid white-bg">
			<!-- <div class="p-3"></div> -->
			<div class="container">
				<h3 class="title">
					{{$cat_4}}
					<div class="bb-70"></div>
				</h3>
				<div class="p-3"></div>
				<div class="row">
					@foreach ($section_4 as $item)
						<div class="col-md-3 col-sm-6">
						<div class="white-bg rel bg-pro" style="background-image:  url('{{asset("$item->image")}}');">
								<div class="abs-full"></div>
								<div class="abs">
									<small class="primary-btn">{{$item->category}}
</small>
									<div class="p-2"></div>
									<a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}"><h4>{{$item->ad_title}}</h4></a>
									<h5>{{$item->price}} $</h5>
								</div>
						</div>
						<div class="p-2"></div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="p-3"></div>
		</div>
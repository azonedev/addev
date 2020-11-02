<footer>
	@foreach ($settingData as $item)
		@php
			$footer_details = $item->footer_details;
			$location_link = $item->location_link;
			$location = $item->location;
			$phone = $item->phone;
			$email = $item->email;
			$facebook_link = $item->facebook_link;
			$youtube_link = $item->youtube_link;
			$twitter_link = $item->twitter_link;
			$facebook_link = $item->facebook_link;
			$copyright = $item->copyright;
		@endphp
	@endforeach
			<div class="fluid">
				<div class="middle">
					<div class="container">
						<div class="p-4"></div>
						<div class="row p-1">
							<div class="col-md-4 col-sm-6">
								<h3>Contact Us <hr width="20%"> </h3>
								@if (!empty($footer_details))
									<div class="p-2"></div>
									<h4>{{$footer_details}}</h4> 
									<div class="p-2"></div>
								@endif
								<i class="fa fa-home"></i><a href="{{$location_link}}" class="a-white" data-lity> {{$location}}</a>
								<br>
								<i class="fa fa-phone"></i><a href="tel:{{$phone}}" class="a-white"> {{$phone}}</a>
								<br>
								<i class="fa fa-envelope"></i><a href="mailto:{{$email}}" class="a-white"> {{$email}}</a>
								<br>
								
								<div class="p-2"></div>
								
							</div>		
							<div class="col-md-4 col-sm-6">
								<h3>Quick Link </h3>
								<div class="p-2"></div>
								<a href="{{url('/contact-us')}}" target="_blank" class="a-white">
									<p>Contact Us </p>
								</a>
								<a href="{{url('/about-us')}}" target="_blank" class="a-white">
									<p>About Us</p>
								</a>
								<a href="{{url('/terms')}}" target="_blank" class="a-white">
									<p>Terms and Conditions</p>
								</a>
								<a href="{{url('/login')}}" target="_blank" class="a-white">
									<span>Login</span>
								</a>
								<span> / </span>
								<a href="{{url('/register')}}" target="_blank" class="a-white">
									<span>Register</span>
								</a>
							</div>	

							<div class="col-md-4 col-sm-6">
								<h3>Social Link</h3>
								<div class="p-2"></div>
											<a href="{{$facebook_link}}" target="_blank">
												<div class="footer-top-icons">
													<i class="fa fa-facebook"></i>
													<small>Facebook</small>
												</div>
											</a>
											<div class="p-2"></div>
											<a href="{{$twitter_link}}" target="_blank">
												<div class="footer-top-icons">
													<i class="fa fa-twitter"></i>
													<small>Twitter</small>
												</div>
											</a>
										<div class="p-2"></div>
											<a href="{{$youtube_link}}" target="_blank">
												<div class="footer-top-icons">
													<i class="fa fa-youtube-play"></i>
													<small>Youtube</small>
												</div>
											</a>
								<div class="p-2"></div>
							</div>			
						</div>
						<div class="p-4"></div>

					</div>
				</div>
			</div>
			<div class="fluid">
				<div class="bottom">
					<div class="container">
						<div class="row p-3">
							<div class="col-md-6 col-sm-6">
								<div class="footer-bottom float-left"><a href="#" style="color:var(--white)">{{$copyright}}</a> &copy; @php
									echo date("Y");
								@endphp </div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="footer-bottom float-right">Technical Help &copy; <a href="#" target="_blank" style="color:var(--white)"> Mamurjor</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
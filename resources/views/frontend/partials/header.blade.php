<header>
	@foreach ($settingData as $item)
		@php
			$logo = $item->logo;
			$facebook_link = $item->facebook_link;
		@endphp
	@endforeach
		@if (Session::has('msg'))
				<div class="alert alert-info alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session('msg')}}
                </div>
		@endif
			<div>
				<menu>
					<div class="fluid">
						<div class="container">
						<div class="main-menu">
						<nav style="color:var(--color-two) !important;" class="navbar navbar-expand-lg  navbar-light menu-gap">
							<a class="navbar-brand" href="{{url('/')}}"><img src='{{asset("$logo")}}' class="float-left" style="max-width: 125px;"></a>
						  

						  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						    
						  </div>
						 <a href="{{url('user/ad-post')}}"><button class="ad-btn">POST AN AD</button></a>
						</nav>
					</div>
					</div>
				</menu>
				<menu>
					<div class="fluid menu-bg">
						<div class="container">
						<div class="main-menu">
						<nav style="color:var(--color-two) !important;" class="navbar navbar-expand-lg  navbar-light ">
							
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						    <ul class="navbar-nav mr-auto">
						      <li class="nav-item active">
						        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="{{url('/about-us')}}">About Us</a>
						      </li>
						      <li class="nav-item">
						   
						        <a class="nav-link" href="{{url('/all-ads')}}">Listing</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="{{url('/contact-us')}}">Contact Us</a>
						      </li>
						      
						    </ul>
						    <ul class="navbar-nav ">
						    	@if (Session::has('user_id'))
									<li class="nav-item">
										<a class="nav-link" href="{{url('/user/account')}}"><i class="fa fa-user"></i> My Account</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
									</li>
								@else
									<li class="nav-item">
										<a class="nav-link" href="{{url('/login')}}"><i class="fa fa-lock"></i> Login</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{url('/register')}}"><i class="fa fa-user"></i> Register</a>
									</li>
								@endif
						    	<!-- <li class="nav-item join-us">
						           <a class="nav-link" href="#"> Join Us <i class="fa fa-facebook"></i></a>
						        </li> -->
						    	<li class="nav-item join-us">
						           <a href="{{$facebook_link}} " target="_blank"><img src="{{asset('assets/img/fbicon.png')}}" alt=""></a>
						        </li>

						    </ul>
						  </div>
						 
						</nav>
					</div>
					</div>
				</div>
					</div>
				</menu>
				<div class="container">
					<div class="search">
						<form action="{{url('/search/result')}}" method="GET">
							@csrf
							<div class="row">
								<div class="col-md-3 col-sm-3 location-s input-s">
									
						 			<input name="location" type="text" placeholder=" Location" class="form-control">
								</div>
								<div class="col-md-3 col-sm-3 category-s input-s">
									<select name="category" class="form-control" id="">
									  	<option value="0" selected>Choose</option>
									  	@foreach ($category as $item)
											  <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
										  @endforeach
									  	<option value="others">others</option>


									 </select>
								</div>
								<div class="col-md-3 col-sm-3 keyword-s input-s">
									<input name="keyword" type="text" placeholder="Keyword" class="form-control">
								</div>
								<div class="col-md-3 col-sm-3 search-s input-s">
						   			<input type="submit" class="form-control" value="Search">
						   				
								</div>
							</div>
							<div class="p-2"> </div>
						</form>	
					</div>
				</div>
				<hr style="margin: 0px;">
			</div>
		</header>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>adDev by azOneDev</title>
	<link rel="icon" href="{{asset('assets/img/')}}" type="image/png" sizes="16x16">

	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">

	<!-- custom internal css to get value of variables if need-->
	<style>
		:root{
			--light-green:#0C9977;
			--white:#FFFFFF;
			--light-yellow:#FCAF01;
			--black:#303030;
			--light:#F3F5F4;
			--box-shadow: 0px 2px 3px 0px rgba(202, 202, 202, 0.75);
		}
	</style>
	<!-- Custom stlylesheet -->
	<link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="login-form">

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
	        <input name="redirect_url" value="{{$re_url}}" type="text" hidden>
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

</body>
</html>
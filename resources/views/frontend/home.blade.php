@extends('frontend.home-master')

@section('title','adDev by azOneDev')

@section('main')
	@section('slider')
	@include('frontend.partials.slider')  
	@endsection

	@section('ad-one')
	@include('frontend.partials.ad-one')  
	@endsection

	@section('section-one')
	@include('frontend.partials.section-one')  
	@endsection

	@section('section-two')
	@include('frontend.partials.section-two')  
	@endsection


	@section('section-three')
	@include('frontend.partials.section-three')  
	@endsection

	@section('section-four')
	@include('frontend.partials.section-four')  
	@endsection

	@section('section-five')
	@include('frontend.partials.section-five')  
	@endsection

	@section('section-six')
	@include('frontend.partials.section-six')  
	@endsection
@endsection
























@section('extra-js')

    <!-- lity [only home page]-->
	<script src="{{asset('assets/js/lity.min.js')}}"></script>

	<!-- owl slider -->
    <script src="{{asset('assets/owlcarousel/owl.carousel.min.js')}}"></script>
    
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
			    nav:false,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:1
			        },
			        768:{
			        	items:2
			        },
			        800:{
			        	items:2
			        },
			        1000:{
			            items:3
			        }
			    }
			});

		});
	</script>

@endsection
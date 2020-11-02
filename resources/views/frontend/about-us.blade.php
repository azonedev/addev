@extends('frontend.home-master')

@section('title','adDev by azOneDev')
    
@section('main')
<!-- about-us -->
	@foreach ($aboutData as $item)
        <main id="contact-us">
			<div class="fluid">
				<div class="container">
					<div class="p-4"></div>
					<h1>About Us
					<div style="margin: 0 auto;" class="bb-70"></div>
					</h1>
					<div class="p-4"></div>
					<!-- about us -->

					<div class="row">
						<div class="col-md-6 p-3">
							<p class="text-cont">
                                {!!$item->details!!}
                            </p>
							<div class="p-3">

                            </div>
						</div>
						<div class="col-md-6">
							<img src='{{asset("$item->image")}}' width="100%" alt="">
						</div>
					</div>
					<!-- /dept -->
				</div>
			</div>
		</main>
    @endforeach
<!-- / about-us -->
@endsection
@extends('frontend.home-master')

@section('title','adDev by azOneDev')

@section('main')

<!-- terms -->
    @foreach ($termsData as $item)
        <main id="terms">
			<div class="fluid">
				<div class="container">
					<div class="p-2"></div>
					<h1>Our Terms and Conditions
					<div style="margin: 0 auto;" class="bb-70"></div>
					</h1>
					<div class="p-2"></div>
					 
					{{-- <p>Last updated [ 29-09-2020 ]</p> --}}

					<div class="terms-cont">
										
						<h3>AGREEMENT TO TERMS :	</h3>
						<div class="p-2"></div>
                        {!!$item->details!!}
					</div>
				</div>
			</div>
		</main>
    @endforeach
<!-- / terms -->
@endsection
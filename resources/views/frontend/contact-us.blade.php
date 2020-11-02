@extends('frontend.home-master')

@section('title','adDev')
    
@section('main')
    <div class="p-2"></div>
    	<!-- contact-us -->
		<main id="contact-us">
			<div class="fluid">
				<div class="container">
					<h1>Contact Us
					<div style="margin: 0 auto;" class="bb-70"></div>
					</h1>
					<div class="p-3"></div>
                    <form action="{{url('/contact-us/store')}}" method="POST" class="text-center">
                        @csrf
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input name="name" type="text" class="form-control" placeholder="Name">
									</div>
									<div class="form-group">
										<input name="email" type="text" class="form-control" placeholder="Email">
									</div>
									<div class="form-group">
										<input name="phone" type="text" class="form-control" placeholder="Phone">
									</div>
									<div class="form-group">
										<input name="subject" type="text" class="form-control" placeholder="Subject">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea name="message" name="" id="message" cols="30" rows="8" class="form-control" placeholder="Message"></textarea>
									</div>
									<div class="form-group">
										<div class="float-right">
											<input type="submit" class="btn contact-btn btn-md" value="Send Message">
										</div>
									</div>
								</div>
								<div class="p-3"></div>
								
							</div>
						</div>
						
					</div>
				</form>
				</div>
			</div>
		</main>
		<!-- / contact-us -->
@endsection
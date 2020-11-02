<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	@foreach ($settingData as $item)
		
	<link rel="icon" href='{{asset("$item->favicon")}}' type="image/png" sizes="16x16">
	@endforeach
	
	@yield('header-extra-link')
	@yield('meta')

	@include('frontend.partials.header-links')
</head>
<body>
		
		@include('frontend.partials.header')

		@yield('main')

		@yield('slider')

		@yield('ad-one')
		
		@yield('section-one')
		 
		@yield('ad-two')

		@yield('section-two')

		<div class="p-3"></div>
		
		@yield('ad-three')

		@yield('section-three')

		@yield('section-four')
		
		@yield('ad-four')

		@yield('section-five')

		@yield('section-six')

		@yield('ad-five')

		<div class="p-2"></div>

		@include('frontend.partials.footer')

		
		@include('frontend.partials.js-link')
		@yield('extra-js')
</body>
</html>
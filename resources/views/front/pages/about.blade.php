@extends('layouts.front')
@section('content')



<header data-aos="{{ App::getLocale() == 'en'?'zoom-out-right':'zoom-out-left' }}" class="w-100 about-header">
</header>

<!-- Start Info -->
<div data-aos="{{ App::getLocale() == 'en'?'zoom-out-right':'zoom-out-left' }}" class="container-fluid">
	<div class="row">
		<div class="col-12 ">
			<div class="container m-auto py-4 info">
				<p>
					{!! App::getLocale() == 'en'?$about->intro:$about->intro_ar !!}
				</p>
			</div>
		</div>
		<div class="col-md-4 arow-info col-sm-4">
			<div data-aos="{{ App::getLocale() == 'en'?'zoom-out-right':'zoom-out-left' }}">
				@if(App::getLocale() == 'en')
					<img loading="lazy"src="{{ asset('assets-front/imgs/Our-Industries/1.png') }}" alt="" style="width:120px;">
				@else
					<img loading="lazy"src="{{ asset('assets-front/imgs/Our-Industries/1-ar.png') }}" alt="" style="width:120px;">
				@endif
			</div>
		</div>

		<div class="col-md-8 col-sm-8 arow-info" style="background-color: #845930;">
			<div data-aos="{{ App::getLocale() == 'en'?'zoom-out-right':'zoom-out-left' }}" class="">
				<p class="text-white textArrow-info">
					{!! App::getLocale() == 'en'?$about->description:$about->description_ar !!}
				</p>
			</div>
		</div>

	</div>
</div>
<!-- End Info -->


<!-- Start Our values -->
<div data-aos="{{ App::getLocale() == 'en'?'zoom-out-right':'zoom-out-left' }}" class="container-fluid" id="our-values">
	<div class="container-fluid our-values-title">
		<h2 class="font-weight-bold text-uppercase">{{ App::getLocale() == 'en'?'OUR VALUES':'قيمنا' }}</h2>
	</div>
	<div class="row">
		@foreach ($our_values as $value)
			<div data-aos="{{ App::getLocale() == 'en'?'zoom-out-right':'zoom-out-left' }}" class="col-lg-4 col-md-6 col-sm-12 p-md-5 p-1">
				<div class="card text-center">
					<div class="card-img-top">
						<img loading="lazy"class="img-fluid" src="{{ $value->img('img') }}" alt="Card image cap">
					</div>
					<div class="card-body">
						<h5 class="card-title text-uppercase">{{ App::getLocale() == 'en'?$value->title:$value->title_ar }}</h5>
						<p class="card-text">{{ App::getLocale() == 'en'?$value->description:$value->description_ar }}</p>
					</div>
				</div>
			</div>
		@endforeach

	</div>
</div>
<!-- End Our values -->



 <!-- Start Board Members -->
 <div data-aos="{{ App::getLocale() == 'en'?'zoom-out-right':'zoom-out-left' }}" class="container-fluid pt-5 pb-5" id="board_members">
	<div class="row pl-lg-5 pr-lg-5">
		<div data-aos="zoom-in-right" class="col-md-6" style="line-height: normal;">
			<span class="text-uppercase news-title">{{ App::getLocale() == 'en'?'OUR':'أعضاء' }}</span>
			<h2 class="text-uppercase  title-section">
				{{ App::getLocale() == 'en'?'Management':'مجلس الإدارة والتنفيذيين' }}
			</h2>
		</div>

		<div class="col-12">
			<hr class="border">
			<div class="row">

				@foreach ($our_management as $value)
					<div class="col-lg-4 col-md-6 pt-2" id="board_members_card">
						<div class="card">
							<div class="card-img-top position-relative">
								<div class="overlay"></div>
								<img loading="lazy"class="w-100" src="{{ $value->img('img') }}" alt="Card image cap">
							</div>
							<div data-aos="{{ App::getLocale() == 'en'?'zoom-out-right':'zoom-out-left' }}" class="card-body">
								<h5 class="card-title text-uppercase">{{ App::getLocale() == 'en'?$value->name:$value->name_ar }}</h5>
								<p class="card-text">{{ App::getLocale() == 'en'?$value->description:$value->description_ar }}</p>
							</div>
						</div>
					</div>
				@endforeach

				
			</div>

		</div>
	</div>

</div>
<!-- End Board Members -->


@endsection
@extends('layouts.front')
@section('content')

<div class="container-fluid pb-5" id="career-opportunity">
    <div class="container-fluid pl-lg-3 pr-lg-3 content">
        <!-- POST Details -->
        <div class="post container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class="font-weight-light text-uppercase">{{\Carbon::parse($article->created_at)->locale(App::getLocale()??'en')->isoFormat('dddd DD MMMM YYYY')}}</span>
                    <h2 class="text-uppercase w-lg-75 pl-0 pt-2">{!! App::getLocale() =='en'?$article->title:$article->title_ar !!}</h2>
                    <img class="img-fluid pb-4" src="{{$article->img('main_image',null,'main')}}" alt="Card image cap">
                </div>
            </div>
            <p class="card-text">
                {!! App::getLocale() =='en'?$article->description:$article->description_ar !!}
            </p>
        </div>
        <!-- End POST Details -->
     
        <a href="{{ route('news.all') }}" class="container-fluid pt-5 back-to nav-link">
            <img width="30px" src="{{ asset('assets-front/imgs/news-details/left-arrow.png') }}" loading="lazy" alt="">
            <span>{{ App::getLocale() =='en'?'BACK TO NEWS':'العودة للأخبار' }}</span>
        </a>
      
    </div>
</div>


@endsection
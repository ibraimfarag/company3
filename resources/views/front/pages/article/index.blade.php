@extends('layouts.front')
@section('content')
@php
    function explode_word_count($text , $from,$to=null){
        $textSplited = explode(' ',$text);
        $to = $to!=null?$to:count($textSplited);
        
        $x=1;
        $words=[];
        foreach ($textSplited as $word) {
            if ($from <= $x) {
                if($to >= $x){
                    array_push($words,$word);
                }else {
                    break;
                }
            }
            $x++;
        }
        $result = implode(' ',$words);
        return $result;
    }
@endphp


<header data-aos="zoom-out-right" class="w-100 news-page-header">
</header>

<!-- Start news-page -->

<div class="container-fluid pt-5 pb-5" id="news-page">
    <div class="container-fluid pl-lg-3 pr-lg-3 content">
        <div data-aos="zoom-in-right" class="col-md-6" style="line-height: normal;">
            <span class="text-uppercase {{ App::getLocale() =='en'?'text-left':'text-right d-block' }} news-title">{{ App::getLocale() =='en'?'NEWS':'الأخبار' }}</span>
            <h2 class="text-uppercase {{ App::getLocale() =='en'?'text-left':'text-right' }} font-weight-normal title-section">
                {{ App::getLocale() =='en'?'& UPDATES':'والمستجدات' }}
            </h2>
        </div>
        @foreach($articles as $article)
            <!-- POST 1 -->
            <div class="post container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <img class="img-fluid pb-4" src="{{$article->img('main_image',null,'main')}}" alt="Card image cap">
                    </div>
                </div>
                <span class="font-weight-light text-uppercase">{{\Carbon::parse($article->created_at)->locale(App::getLocale()??'en')->isoFormat('dddd DD MMMM YYYY')}}</span>
                <h2 class="text-uppercase w-lg-75 pl-0 {{ App::getLocale() =='en'?'text-left':'text-right' }} pt-2">{!! App::getLocale() =='en'?$article->title:$article->title_ar !!}</h2>
                <hr>
                <p class="card-text">
                    {!! App::getLocale() =='en'?explode_word_count($article->description,0,60):explode_word_count($article->description_ar,0,60) !!}...
                    <a class="read_more" href="{{ route('article.show',$article) }}">{{  App::getLocale() =='en'?'Read more':'إقرأ المزيد' }}</a>
                </p>
            </div>
            <!-- End POST 1 -->
        @endforeach
        <!-- POST 2 -->
        <!-- هنا صورتين .. ده معناه ان البوست الواحد ممكن يرفع اكتر من صوره فممكن نعملها اسليدر -->
        <!-- <div class="post container-fluid">
            <div class="row">
                <div class="col-6">
                    <img class="img-fluid pb-4" src="imgs/news-page/news-2.png" alt="Card image cap">
                </div>
                <div class="col-6">
                    <img class="img-fluid pb-4" src="imgs/news-page/news-2.png" alt="Card image cap">
                </div>
            </div>
            <span class="font-weight-light text-uppercase">Sunday 09 April 2023</span>
            <h2 class="font-weight-bold text-uppercase w-lg-75 pl-0 text-left pt-2">Launch of the latest tower</h2>
            <hr>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <a class="read_more" href="news-details.html">Read more…</a>
            </p>
        </div> -->
        <!-- End POST 2 -->

        <!-- POST 3 -->
        <!-- <div class="post container-fluid">
            <div class="row">
                <div class="col-12">
                    <img class="img-fluid pb-4" src="imgs/news-page/news-3.png" alt="Card image cap">
                </div>
            </div>
            <span class="font-weight-light text-uppercase">Sunday 09 April 2023</span>
            <h2 class="font-weight-bold text-uppercase w-lg-75 pl-0 text-left pt-2">Launch of the latest tower</h2>
            <hr>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <a class="read_more" href="news-details.html">Read more…</a>
            </p>
        </div> -->
        <!-- End POST 3 -->
      
    </div>
</div>

<!-- End news-page -->



@endsection
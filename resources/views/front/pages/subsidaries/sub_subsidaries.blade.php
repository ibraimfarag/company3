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
    <header data-aos="zoom-out-right" class="w-100 sub_subsidaries" style="background-image: url({{ $subsidaries->img('bg_image_subsidaries') }});">
    </header>


    <!-- Start sub_subsidaries -->
    <div class="container-fluid pt-5 pb-5" id="news-page">
        <div class="container-fluid pl-lg-3 pr-lg-3 content">
            <div data-aos="zoom-in-right" class="col-md-6" style="line-height: normal;">
                <span class="text-uppercase news-title">{{ App::getLocale() =='en'?explode_word_count($subsidaries->subsidaries_title,0,3):explode_word_count($subsidaries->subsidaries_title_ar,0,3) }}</span>
                <h2 class="text-uppercase font-weight-normal title-section">
                    {{ App::getLocale() =='en'?explode_word_count($subsidaries->subsidaries_title,4):explode_word_count($subsidaries->subsidaries_title_ar,4)}}
                </h2>
            </div>
            <!-- POST 1 -->
            <div class="post container-fluid">
                <!-- <h2 class="text-uppercase w-lg-75 pl-0 text-left pt-2">SKY AD. DEVELOPMENTS ORGANIZES A MEDIA <b>TRIP TO ABU DHABI</b> TO SHOWCASE DIAMOND GROUP’S ACHIEVEMENTS IN THE UAE</h2>
                <hr> -->
                <p class="card-text">
                    {!! App::getLocale() =='en'?$subsidaries->subsidaries_description:$subsidaries->subsidaries_description_ar !!}
                </p>
            </div>
            
        
            
            
            @if($subsidaries->link || $subsidaries->click_here_to_visit)
                <a target="_blank" href="{{ $subsidaries->link }}" class="pt-5 back-to nav-link d-inline">
                    @if(App::getLocale() =='en')
                        <img width="30px" src="{{ asset('assets-front/imgs/arrow-right.png') }}" loading="lazy" alt="">
                    @else
                        <img width="30px" src="{{ asset('assets-front/imgs/arrow-left.png') }}" loading="lazy" alt="">
                    @endif
                    <span class="font-weight-normal">{!! App::getLocale() =='en'?$subsidaries->click_here_to_visit:$subsidaries->click_here_to_visit_ar !!}</span>
                </a>
            @endif
        </div>
    </div>
    <!-- End sub_subsidaries -->
@endsection
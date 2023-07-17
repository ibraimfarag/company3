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

    function word_count($text ){
        $textSplited = explode(' ',$text);
        $result = count($textSplited);
        return $result;
    }
@endphp

<header data-aos="zoom-out-right" class="w-100 portfolio-header">
</header>


<!-- Start SUBSIDARIES -->


<div class="container-fluid pt-5 pb-5" id="subsidaries">
    <div class="container-fluid pl-lg-3 pr-lg-3 content">
        <div data-aos="zoom-in-right" class="col-md-6 pl-0" style="line-height: normal;">
            <span class="text-uppercase news-title">{{ App::getLocale() =='en'?'OUR':'' }}</span>
            <h2 class="text-uppercase font-weight-normal title-section">
                {{ App::getLocale() =='en'?'Subsidiaries':'شركاؤنا' }}
            </h2>
        </div>


        @foreach ($subsidaries as $subsidary)
        
            <!-- POST 3 -->
            <div class="post" style="background-image: url({{ $subsidary->img('bg_image_subsidaries') }});" id="SKY_AD_Developments">
                <div class="w-100 h-100">
                    <div class="overlay">
                        <div class="width_overlay d-flex h-100">
                            <h2 class="text-uppercase w-100 p-lg-5 font-weight-bold text-white"> {{ App::getLocale() =='en'?$subsidary->subsidaries_title:$subsidary->subsidaries_title_ar }} </h2>
                            <div class="width_overlay_img p-lg-3 pb-5 d-flex justify-content-center align-items-end">
                                @if(App::getLocale() =='en')
                                    <img id="arrow_detail" loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1.png') }}" width="60px" alt="" >
                                @else
                                    <img id="arrow_detail" loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1-ar.png') }}" width="60px" alt="" >
                                @endif
                            </div>
                            @if($subsidary->link || $subsidary->click_here_to_visit)
                                <a target="_blank" href="{{ $subsidary->link }}" class="btn pl-0 ml-0 d-flex align-items-center align-content-center position-absolute">
                                    @if(App::getLocale() =='en')
                                        <img loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1.png') }}" width="40px" alt="" >
                                    @else
                                        <img loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1-ar.png') }}" width="40px" alt="" >
                                    @endif
                                    <span class="text-white {{ App::getLocale() =='en'?'ml-2':'mr-2' }}">
                                        @if(App::getLocale() =='en')
                                            {{ $subsidary->click_here_to_visit }}
                                        @else
                                            {{ explode_word_count($subsidary->click_here_to_visit_ar,0,4) }}
                                            <br>
                                            {{ explode_word_count($subsidary->click_here_to_visit_ar,5) }}
                                        @endif
                                    </span>
                                </a>
                            @endif
                        </div>
                        <div class="width_overlay_details float-right d-flex h-100">
                            <p class="p-3 font-weight-normal text-white">
                                {{-- @php
                                    $subsidariesDescription = App::getLocale() =='en'?$subsidary->subsidaries_description :$subsidary->subsidaries_description_ar;
                                @endphp
                                @if(word_count($subsidariesDescription) > 30) --}}
                                    {{ App::getLocale() =='en'?explode_word_count($subsidary->subsidaries_description,0,30) :explode_word_count($subsidary->subsidaries_description_ar,0,30) }}....
                                    
                                    <a href="{{ route('subsidaries.sub_subsidaries', $subsidary->id) }}" class="text-white readMore"
                                        style="text-decoration:underline;font-weight: 700">{{ App::getLocale() =='en'?'read more':'إقرأ المزيد' }}</a>

                                {{-- @else
                                {{ App::getLocale() =='en'?$subsidary->subsidaries_description :$subsidary->subsidaries_description_ar }}
                                @endif --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End POST 3 -->
        @endforeach

    </div>
</div>

<!-- End SUBSIDARIES -->


@endsection
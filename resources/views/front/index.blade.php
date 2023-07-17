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


<!-- Start Parallax -->
<section data-aos="zoom-out-right" class="parallax">
    <img src="{{ asset($home_page->img('bg_1',null,'main')) }}" id="burjkhalifa">
    <img src="{{ asset('assets-front/imgs/new-parallax/cloud.png') }}" id="cloud">
    <img src="{{ asset('assets-front/imgs/new-parallax/cloud-3.png') }}" id="cloud_3">
    <img src="{{ asset('assets-front/imgs/new-parallax/cloud-4.png') }}" id="cloud_4">
    <img src="{{ asset($home_page->img(App::getLocale() =='en'?'text':'text_ar',null,'main')) }}" id="dubaitext">
    <!-- <div id="dubaitext">
        <h2>COMPREHENSIVE MANAGEMENT SOLUIONS TALLORED TO YOUR NEEDS.</h2>
    </div> -->
    <img src="{{ asset($home_page->img('bg_2',null,'main')) }}" id="building">
    <img class="D" src="{{ asset($home_page->img('logo_D',null,'main')) }}" id="D">
    {{-- <!-- <img src="{{ asset('assets-front/imgs/new-parallax/white-line.png') }}" id="white_line"> --> --}}
    <img src="{{ asset('assets-front/imgs/new-parallax/layout.png') }}" id="layout">
</section>
<!-- End Parallax -->


<!-- Start Our Industries -->
<div class="container-fluid" id="Industries">
    <div class="row">
        <div class="col-md-3 Industries col-6 ">
            <div data-aos="zoom-out-right" class="container  p-1 text-right text-white">
                <h2 class="pb-1 pt-3 text-uppercase font-weight-bold h2_Industries">{{ App::getLocale() =='en'?'Our Industries':'قطاعاتنا' }}</h2>
                @if(App::getLocale() =='en')
                    <img loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1.png') }}" alt="" class="img-fluid pt-4 "style="width:20%">
                @else
                    <img loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1-ar.png') }}" alt="" class="img-fluid pt-4 "style="width:20%">
                @endif
            </div>
        </div>

        <div class="col-md-3 col-6 pt-3 container_icons" style="background-color: #252425;">
            <div data-aos="zoom-out-right" class="container-fluid pt-3 pb-3 pl-1 pr-1 text-center icons">
                <img loading="lazy" src="{{ asset($home_page->img('industries_icon')) }}" alt="" class="img-fluid" style="width:20%">
                <h4 class="pt-4 pb-3 text-uppercase font-weight-bold text-white">{!! App::getLocale() =='en'?$home_page->industries_text:$home_page->industries_text_ar !!}</h4>
            </div>
        </div>

        <div class="col-md-3 col-6 pt-3 container_icons" style="background-color: #252425;">
            <div data-aos="zoom-out-right" class="container-fluid pt-3 pb-3 pl-1 pr-1 text-center icons">
                <img loading="lazy" src="{{ asset($home_page->img('industries_icon2')) }}" alt="" class="img-fluid" style="width:20%">
                <h4 class="pt-4 pb-3 text-uppercase font-weight-bold text-white">{!! App::getLocale() =='en'?$home_page->industries_text2:$home_page->industries_text2_ar !!}</h4>
            </div>
        </div>

        <div class="col-md-3 col-6 pt-2 container_icons" style="background-color: #252425;">
            <div data-aos="zoom-out-right" class="container-fluid pt-3 pb-3 pl-1 pr-1 text-center icons">
                <img loading="lazy" src="{{ asset($home_page->img('industries_icon3')) }}" alt="" class="img-fluid " style="width:20%">
                <h4 class="pt-4 pb-3 text-uppercase font-weight-bold text-white">{!! App::getLocale() =='en'?$home_page->industries_text3:$home_page->industries_text3_ar !!}
                </h4>
            </div>
        </div>

    </div>
</div>
<!-- ENd Our Industries -->


<!-- Start Our SUBSIDARIES -->
<div class="container-fluid pt-5" id="Our-Subsidaries">
    <div class="row">
        <h2 data-aos="zoom-out-right" style="color: #845930;align-items:baseline;justify-content:space-between"
            class="col-md-8 d-flex text-uppercase {{ App::getLocale() =='en'?'pl-lg-5':'pr-lg-5' }} font-weight-bold title-section py-lg-3">
            {{ App::getLocale() =='en'?'Our Subsidiaries':'شركاؤنا' }}
        </h2>
        <div class="col-md-4 p-md-0 p-3">
            <div class="{{ App::getLocale() =='en'?'swiper-button-next':'swiper-button-prev' }} w-auto d-flex align-items-center">
                <h6>{{ App::getLocale() =='en'?'SWIPE TO VIEW':'اسحب للاطلاع' }}</h6>
                @if(App::getLocale() =='en')
                    <img width="50px" src="{{ asset('assets-front/imgs/arrow-right.png') }}">
                @else
                    <img width="50px" src="{{ asset('assets-front/imgs/arrow-left.png') }}">
                @endif
            </div>
        </div>
    </div>

   

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            @foreach ($subsidaries as $subsidary)    
                <div class="swiper-slide pb-md-2 pb-sm-2 p-lg-2">
                    <div data-aos="zoom-out-right" class="card ">
                        <img loading="lazy" class="card-img-top" src="{{ $subsidary->img('bg_image_home') }}" alt="Card image cap"
                            style="height: 100%!important;">
                        <img loading="lazy" class="card-img-top position-absolute" src="{{ asset('assets-front/imgs/Our-portfolio/layout.png') }}"
                            alt="Card image cap">

                        <div class="card-body ">
                            
                            <div>

                                <h3 class="text-uppercase text-white font-weight-bold h3_card">{{ App::getLocale() =='en'?$subsidary->subsidaries_title:$subsidary->subsidaries_title_ar }}</h3>
                                <hr class="border border-white">
                                <h5 class="text-white description">{{ App::getLocale() =='en'?mb_strimwidth(($subsidary->subsidaries_description ), 0, 150, "..."):mb_strimwidth(($subsidary->subsidaries_description_ar ), 0, 200, "...") }}
                                    <a href="{{ route('subsidaries.sub_subsidaries', $subsidary->id) }}" class="text-white readMore"
                                        style="text-decoration:underline">{{ App::getLocale() =='en'?'read more':'إقرأ المزيد' }}</a>
                                </h5>

                                @if($subsidary->link || $subsidary->click_here_to_visit)
                                    
                                    <a target="_blank" href="{{ $subsidary->link }}"
                                        class="btn pl-0 ml-0 d-flex align-items-center align-content-center text-decoration-underline {{ App::getLocale() =='en'?'text-left':'text-right' }}">
                                        @if(App::getLocale() =='en')
                                            <img loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1.png') }}" alt="" >
                                        @else
                                            <img loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1-ar.png') }}" alt="" >
                                        @endif
                                        <span class="text-white {{ App::getLocale() =='en'?'ml-2':'mr-2' }}">
                                        @if(App::getLocale() =='en')
                                            {{ explode_word_count($subsidary->click_here_to_visit,0,4) }}
                                            <br>
                                            {{ explode_word_count($subsidary->click_here_to_visit,5) }}
                                        @else
                                            {{ explode_word_count($subsidary->click_here_to_visit_ar,0,4) }}
                                            <br>
                                            {{ explode_word_count($subsidary->click_here_to_visit_ar,5) }}
                                        @endif
                                        </span>
                                    </a>
                                @endif

                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Repeat slider -->
            @foreach ($subsidaries as $subsidary)    
                <div class="swiper-slide pb-md-2 pb-sm-2 p-lg-2">
                    <div data-aos="zoom-out-right" class="card ">
                        <img loading="lazy" class="card-img-top" src="{{ $subsidary->img('bg_image_home') }}" alt="Card image cap"
                            style="height: 100%!important;">
                        <img loading="lazy" class="card-img-top position-absolute" src="{{ asset('assets-front/imgs/Our-portfolio/layout.png') }}"
                            alt="Card image cap">

                        <div class="card-body ">
                            
                            <div>

                                <h3 class="text-uppercase text-white font-weight-bold h3_card">{{ App::getLocale() =='en'?$subsidary->subsidaries_title:$subsidary->subsidaries_title_ar }}</h3>
                                <hr class="border border-white">
                                <h5 class="text-white description">{{ App::getLocale() =='en'?mb_strimwidth(($subsidary->subsidaries_description ), 0, 150, "..."):mb_strimwidth(($subsidary->subsidaries_description_ar ), 0, 200, "...") }}
                                    <a href="{{ route('subsidaries.sub_subsidaries', $subsidary->id) }}" class="text-white readMore"
                                        style="text-decoration:underline">{{ App::getLocale() =='en'?'read more':'إقرأ المزيد' }}</a>
                                </h5>

                                @if($subsidary->link || $subsidary->click_here_to_visit)
                                    
                                    <a target="_blank" href="{{ $subsidary->link }}"
                                        class="btn pl-0 ml-0 d-flex align-items-center align-content-center text-decoration-underline {{ App::getLocale() =='en'?'text-left':'text-right' }}">
                                        @if(App::getLocale() =='en')
                                            <img loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1.png') }}" alt="" >
                                        @else
                                            <img loading="lazy" src="{{ asset('assets-front/imgs/Our-Industries/1-ar.png') }}" alt="" >
                                        @endif
                                        <span class="text-white {{ App::getLocale() =='en'?'ml-2':'mr-2' }}">
                                        @if(App::getLocale() =='en')
                                            {{ explode_word_count($subsidary->click_here_to_visit,0,4) }}
                                            <br>
                                            {{ explode_word_count($subsidary->click_here_to_visit,5) }}
                                        @else
                                            {{ explode_word_count($subsidary->click_here_to_visit_ar,0,4) }}
                                            <br>
                                            {{ explode_word_count($subsidary->click_here_to_visit_ar,5) }}
                                        @endif
                                        </span>
                                    </a>
                                @endif

                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Repeat slider -->
        </div>

        <!-- <div class="swiper-button-prev">
            <span>SWIPE TO VIEW</span>
            <img src="https://open-code.tech/wp-content/uploads/2023/03/arrow_left.png">    
        </div>
        -->
        <!-- <div class="swiper-button-next">
            <span>SWIPE TO VIEW</span>
            <img src="imgs/arrow-right.png">   
        </div>  -->
    </div>
</div>
<!-- End Our SUBSIDARIES -->


<!-- Start News -->
<div class="container-fluid pt-5 pb-5" id="news">
    <div class="row pl-lg-5 pr-lg-5">
        <div data-aos="zoom-in-right" class="col-md-6" style="line-height: normal;">
            <span class="text-uppercase {{ App::getLocale() =='en'?'text-left':'text-right d-block' }} news-title">{{ App::getLocale() =='en'?'NEWS':'الأخبار' }}</span>
            <h2 class="text-uppercase {{ App::getLocale() =='en'?'text-left':'text-right' }} font-weight-normal title-section">
                {{ App::getLocale() =='en'?'OUR LATEST UPDATES':'والمستجدات' }}
            </h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="{{ route('news.all') }}">
                <button type="button" class="btn btn-link btn-lg float-right read-all text-uppercase"
                    data-aos="zoom-in-right">
                    {{  App::getLocale() =='en'?'Read more':'إقرأ المزيد' }}
                    @if(App::getLocale() =='en')
                        <img loading="lazy" data-aos="zoom-in-left" class="pl-2" width="25%"
                            src="{{ asset('assets-front/imgs/news/arrow-right.svg') }}">
                    @else
                        <img loading="lazy" data-aos="zoom-in-left" class="pl-2" width="25%"
                        src="{{ asset('assets-front/imgs/news/arrow-left.svg') }}">
                    @endif
                </button>
            </a>
        </div>
        <div class="col-12">
            <hr class="border">
            <div class="row">

                @foreach ($news as $article)
                    <!-- First News -->
                    <div data-aos="zoom-in-right" class="col-md-4 pt-4">
                        <img loading="lazy" src="{{ $article->img('main_image',null,'main') }}" class="img-fluid">
                    </div>
                    <div data-aos="zoom-in-left" class="col-md-8 pt-4">
                        <h5 class="text-uppercase {{ App::getLocale() =='en'?'text-left':'text-right' }} category">Construction Updates</h5>
                        <h2 class="text-uppercase {{ App::getLocale() =='en'?'text-left':'text-right' }} title">
                            {!! App::getLocale() =='en'?$article->title:$article->title_ar !!}
                        </h2>
                        <p class="description">
                            {!! App::getLocale() =='en'?explode_word_count($article->description,0,30):explode_word_count($article->description_ar,0,30) !!}...
                            <a class="read_more" href="{{ route('article.show',$article) }}">{{  App::getLocale() =='en'?'Read more':'إقرأ المزيد' }}</a></p>
                    </div>
                    <!-- End First News -->
                @endforeach

            </div>
        </div>
    </div>

</div>
<!-- End News -->


<!-- Start Portfolio -->

<div class="container-fluid pb-4" id="slider_sky_ad">
    <div class="row">
        <div class="col-lg-3 col-md-5">
            <div class="row">
                <div class="col-9 column c80">
                    <div class="overlay"></div>
                    <h3 class="font-weight-bold text-uppercase">{{ App::getLocale() =='en'?'Diamond Group':'مجموعة دايموند' }}
                        <br><small class="text-uppercase">{{ App::getLocale() =='en'?'PORTFOLIO':'مشاريعنا' }}</small>
                    </h3>
                    <footer class="text-uppercase font-weight-bold footer">{{ App::getLocale() =='en'?'SWIPE TO VIEW':'اسحب للاطلاع' }}</footer>
                </div>
                <div class="col-3 column c20 footer">
                    <img loading="lazy" width="60px" src="{{ asset('assets-front/imgs/Our-Industries/1.png') }}">
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-7 pt-3 this_slider_skyAd">
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">

                    @foreach ($portfolio as $portfo)
                        <div class="swiper-slide">
                            <img loading="lazy" src="{{ $portfo->img('img') }}"
                                class="img-fluid h-100">
                            <div class="overlay">
                                <h3 class="font-weight-bold text-uppercase">{{ App::getLocale() =='en'?$portfo->title:$portfo->title_ar }}
                                    <br><small class="text-uppercase">{{ App::getLocale() =='en'?$portfo->sub_title:$portfo->sub_title_ar }}</small>
                                </h3>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($portfolio as $portfo)
                        <div class="swiper-slide">
                            <img loading="lazy" src="{{ $portfo->img('img') }}"
                                class="img-fluid h-100">
                            <div class="overlay">
                                <h3 class="font-weight-bold text-uppercase">{{ App::getLocale() =='en'?$portfo->title:$portfo->title_ar }}
                                    <br><small class="text-uppercase">{{ App::getLocale() =='en'?$portfo->sub_title:$portfo->sub_title_ar }}</small>
                                </h3>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
    </div>
</div>

<!--- End Portfolio  -->


<!-- Start GET IN TOUCH -->
<div data-aos="zoom-in-right" class="w-100 pb-5 " id="contact">
    <a target="_blank"
        href="{{ $contact->map_location }}">
        <iframe
        src="{{ $contact->map_location }}"
        width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <img loading="lazy"class="icon-open" src="{{ asset('assets-front/imgs/contact/icon-open.png') }}">
    </a>
    <div data-aos="zoom-in-right" class="pt-5 container-fluid m-auto">

        <form id="ContcatForm" class="row pl-lg-5 pr-lg-5">
            @csrf
            @method('POST')
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-uppercase" for="full-name">{{ App::getLocale() =='en'?'Full Name*':'الاسم الكامل*' }}</label>
                    <input type="text" name="name" class="form-control" id="full-name" aria-describedby="emailHelp"
                        placeholder="{{ App::getLocale() =='en'?'Enter Your Full Name':'أدخل اسمك الكامل' }}">
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="PHONE">{{ App::getLocale() =='en'?'PHONE*':'رقم الهاتف*' }}</label>
                    <input type="tel" name="phone" class="form-control" id="PHONE" placeholder="{{ App::getLocale() =='en'?'Add Your Phone Number':'أدخل رقم الهاتف' }}">
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-uppercase" for="EMAIL">{{ App::getLocale() =='en'?'EMAIL*':'البريد الإلكتروني*' }}</label>
                    <input type="email" name="email" class="form-control" id="EMAIL" aria-describedby="emailHelp"
                        placeholder="{{ App::getLocale() =='en'?'Add Your Email':'البريد الإلكتروني' }}">
                </div>
                <div class="form-group d-none">
                    <label class="text-uppercase" for="COUNTRY">{{ App::getLocale() =='en'?'COUNTRY*':'الدولة:*' }}</label>
                    <input type="text" name="country" class="form-control" id="COUNTRY"
                        placeholder="{{ App::getLocale() =='en'?'Add Your Country':'الدولة' }}">
                </div>
            </div>
            <div class="col-12">
                <textarea class="form-control w-100 message" name="message" rows="10" placeholder="{{ App::getLocale() =='en'?'Your Message…':'اكتب رسالتك هنا...' }}"></textarea>
            </div>
            <div class="col-12 pt-5">
                @if(App::getLocale() =='en')
                    <button id="sendButton" style="font-size: 11.2px;" type="button" class="btn btn-link btn-lg float-right read-all text-uppercase" data-aos="zoom-in-right">
                        submit<img loading="lazy"data-aos="zoom-in-left" class="pl-2" width="25%" src="{{ asset('assets-front/imgs/news/arrow-right.svg') }}">
                    </button>
                    <div id="spinner" style="display: none;">
                        <i class="fa fa-spinner fa-pulse px-2" aria-hidden="true"></i>
                        Sending...
                    </div>
                
                @else
                    <button id="sendButton" style="font-size: 11.2px;" type="button" class="btn btn-link btn-lg float-right read-all text-uppercase" data-aos="zoom-in-right">
                        إرسال<img loading="lazy"data-aos="zoom-in-left" class="pr-2" width="25%" src="{{ asset('assets-front/imgs/news/arrow-left.svg') }}"> <!-- pl-2 => pr-2 and arrow-right.svg => arrow-left.svg -->
                    </button>
                    <div id="spinner" style="display: none;">
                        <i class="fa fa-spinner fa-pulse px-2" aria-hidden="true"></i>
                        جاري الإرسال...
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
<!-- End GET IN TOUCH -->


@section('scripts')
        <script>
            $("#sendButton").click(function() {
                $("#spinner").show();
                var form = document.getElementById('ContcatForm');
                var formData = new FormData(form);

                axios.post('{{ route('contact-post') }}', formData)
                    .then(function(response) {
                        // Handle success response
                        $("#spinner").hide();
                        swal({
                            title: "{{ App::getLocale() =='en'?'Sent successfully!':'تم الأرسال بنجاح' }}",
                            icon: "success",
                            buttons: false,
                            timer: 1500
                        });
                    })
                    .catch(function(error) {
                        var errors=[];
                        var err = error.response.data.errors
                        for (const key in err) {
                            if (err.hasOwnProperty.call(err, key)) {
                                const element = err[key];
                                errors.push(element[0])
                            }
                        }

                        // Handle error response
                        $("#spinner").hide();
                        swal({
                            title: "{{ App::getLocale() =='en'?'Something is wrong, make sure the data entered is correct.!':'هناك خطأ ما , تأكد من صحه البيانات المدخله!' }}",
                            icon: "error",
                            text:`${errors.join(' , ')}`,
                            button: "{{ App::getLocale() =='en'?'OK':'تمام' }}",
                        });
                    });
            });
        </script>
    @endsection
    
@endsection
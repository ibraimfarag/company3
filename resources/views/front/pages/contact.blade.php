@extends('layouts.front')
@section('content')



<header data-aos="zoom-out-right" class="w-100 contact-us-header">
</header>

<div class="container-fluid pt-5 " id="contact-us">
    <div class="container-fluid pl-lg-3 pr-lg-3 content">
        <div data-aos="zoom-in-right" class="col-md-6 pb-3" style="line-height:normal">
            <span class="text-uppercase news-title">{{ App::getLocale() =='en'?'Contact':'تواصل' }} </span>
            <h2 class="text-uppercase  font-weight-normal title-section">
                {{ App::getLocale() =='en'?'Us':'معنا' }}
            </h2>
        </div>
        <div class="container-fluid">
            <span class="text-uppercase font-weight-bold call-on">{{ App::getLocale() =='en'?'CALL ON ':'اتصل على: ' }}</span>
            <span class="text-uppercase call-number">
                {{ $contact->phone }}
            </span>
        </div>
        <!-- POST 1 -->
        <div class="post container-fluid pt-4 pb-4">
            <span class="contact-text-top text-uppercase ">
                {!! App::getLocale() =='en'?$contact->address:$contact->address_ar !!}
            </span>
        </div>
        
      
    </div>
    
</div>






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
        <div class="row pl-lg-5 pr-lg-5 pb-5 pt-3">
            <div class="col-12">
                <h2 class="text-uppercase title-section">{{ App::getLocale() =='en'?'FOR INQUIRIES':'للاستفسارات' }}</h2>
                <p class="feedback">
                    {{ App::getLocale() =='en'?'Please share any comments or feedback you have;<br>
                    all thoughts are appreciated.':'الرجاء إدخال بياناتك أدناه لنتواصل معك في أقرب وقت.' }}
                    
                </p>
            </div>
        </div>
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
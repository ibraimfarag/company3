@extends('layouts.front')
@section('content')



<header data-aos="zoom-out-right" class="w-100 career-header">
</header>


<!-- Start Career -->
<div class="container-fluid pt-5 " id="career">
    <div class="container-fluid pl-lg-3 pr-lg-3 content">
        <div data-aos="zoom-in-right" class="col-md-6 pb-4" style="line-height: normal;">
            <span class="text-uppercase news-title">{{ App::getLocale() =='en'?'Career':'' }}</span>
            <h2 class="text-uppercase font-weight-normal title-section">
                {{ App::getLocale() =='en'?'opportunities':'الوظائف' }}
            </h2>
        </div>
        <!-- POST 1 -->
        <div class="post container-fluid">
            <span class="text-top">{{ App::getLocale() =='en'?$career->intro:$career->intro_ar }}</span>
            <h2 class="font-weight-bold text-uppercase w-lg-75 pl-0 pt-5">
                {{ App::getLocale() =='en'?'Why work at Diamond Group?':'لماذا تنضم إلى فريق مجموعة دايموند؟' }}
            </h2>
        </div>
        
      
    </div>
    
</div>


    <!-- Start career-icons -->
    <div data-aos="zoom-out-right" class="m-auto" id="our-values">
        <div class="row">

            @foreach ($why_work_at_diamond_group as $value)
                <!-- Item-Icon 1 -->
                <div data-aos="zoom-out-right" class="col-lg-4 col-md-6 col-sm-12 p-md-5 p-1">
                    <div class="card text-center" style="background-color: #252425;">
                        <div class="card-img-top">
                            <img loading="lazy"class="img-fluid" src="{{ $value->img('img') }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ App::getLocale() =='en'?$value->title:$value->title_ar }}</h5>
                            <p class="card-text text-white">
                                {{ App::getLocale() =='en'?$value->description:$value->description_ar }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            
        </div>
    </div>
    <!-- End career-icons -->
<!-- End Career -->


<!-- Start GET IN TOUCH -->
<div data-aos="zoom-in-right" class="w-100 pb-5 pt-5" id="contact">
    <div data-aos="zoom-in-right" class="pt-5 container-fluid m-auto">

        <form id="DataContcatForm" method="POST" action="{{ route('career.career_form') }}" enctype="multipart/form-data" class="row pl-lg-5 pr-lg-5">
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
            <div class="col-12 pt-3">
                @if(App::getLocale() =='en')
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6 ">
                            <label for="file-input" class="d-flex align-items-center">
                                <span id="file-input-label"></span>
                                <span for="file-input" class="text-uppercase upload_resume">UPLOAD your resume HERE</span>
                            </label>
                            <input type="file" name="cv" id="file-input" accept="pdf/*">
                        </div>
                        <div class="col-md-6">
                            <button id="sendButton" style="font-size: 11.2px;" type="button" class="btn btn-link btn-lg float-right read-all text-uppercase" data-aos="zoom-in-right">
                                APPLY<img loading="lazy"data-aos="zoom-in-left" class="pl-2" width="25%" src="{{ asset('assets-front/imgs/news/arrow-right.svg') }}">
                            </button>
                            <div id="spinner" style="display: none;">
                                <i class="fa fa-spinner fa-pulse px-2" aria-hidden="true"></i>
                                Sending...
                            </div>
                        </div>
                    </div>

                @else

                    <div class="row d-flex align-items-center " style="direction: ltr;">
                        <div class="col-md-6 ">
                            <label for="file-input" class="d-flex align-items-center justify-content-end" >
                                <span for="file-input" class="text-uppercase upload_resume">أرفق سيرتك الذاتية</span>
                                <span id="file-input-label"></span>
                            </label>
                            <input type="file" name="cv" id="file-input" accept="pdf/*">
                        </div>
                        <div class="col-md-6">
                            <button id="sendButton" style="font-size: 11.2px;" type="button" class="btn btn-link btn-lg float-right read-all text-uppercase" data-aos="zoom-in-right">
                                إرسال<img loading="lazy"data-aos="zoom-in-left" class="pr-2" width="25%" src="{{ asset('assets-front/imgs/news/arrow-left.svg') }}"> <!-- pl-2 => pr-2 and arrow-right.svg => arrow-left.svg -->
                            </button>
                            <div id="spinner" style="display: none;">
                                <i class="fa fa-spinner fa-pulse px-2" aria-hidden="true"></i>
                                جاري الإرسال...
                            </div>
                        </div>
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
        var form = document.getElementById('DataContcatForm');
        var formData = new FormData(form);

        

        axios.post('{{ route('career.career_form') }}', formData)
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
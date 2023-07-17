<div class="col-12 row" >
    <div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener active" data-opentab="en-tab">
        <span  class="fal fa-wrench me-2"></span>	EN
    </div>
    <div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener" data-opentab="ar-tab">
        <span  class="fal fa-link me-2"></span>	AR
    </div>
</div>


<div class="col-12 col-lg-8 px-3 py-5">
	 		 
    <!--- Start en-tab ---->
    <div class="col-12 row p-0 taber active" id="en-tab">
        <div class="col-12 px-0 d-flex mb-3 row pb-3">
            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                Logo (D)
            </div>
            <div class="col-12 col-lg-9 px-2">
                <input type="" name="settings[website_name]" class="form-control" value="{{$settings['website_name']}}"  maxlength="190">
            </div> 
        </div>
        <div class="col-12 px-0 d-flex mb-3 row pb-3">
            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
               Address
            </div>
            <div class="col-12 col-lg-9 px-2">
                <textarea name="settings[address]" class="form-control">{{$settings['address']}}</textarea>
            </div> 
        </div>
        <div class="col-12 px-0 d-flex mb-3 row pb-3">
            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
               about the site
            </div>
            <div class="col-12 col-lg-9 px-2">
                <textarea name="settings[website_bio]" class="form-control">{{$settings['website_bio']}}</textarea>
            </div> 
        </div>
        <div class="col-12 px-0 d-flex mb-3 row pb-3">
            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
               Contact Mail
            </div>
            <div class="col-12 col-lg-9 px-2">
                <input type="email" name="settings[contact_email]" class="form-control" value="{{$settings['contact_email']}}" >
            </div> 
        </div>
        <div class="col-12 px-0 d-flex mb-3 row pb-3">
            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
               Logo Site(200*200)
            </div>
            <div class="col-12 col-lg-9 px-2">
                <input type="file" name="settings[website_logo]" class="form-control" >
                <div class="col-12 p-2">
                    <img src="{{$settings['get_website_logo']}}" style="width:100px;max-height: 100px;">
                </div>
            </div> 
        </div>
        <div class="col-12 px-0 d-flex mb-3 row pb-3">
            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
               Wide logo(500*200)
            </div>
            <div class="col-12 col-lg-9 px-2">
                <input type="file" name="settings[website_wide_logo]" class="form-control" >
                <div class="col-12 p-2">
                    <img src="{{$settings['get_website_wide_logo']}}" style="width:100px;max-height: 100px;">
                </div>
            </div> 
        </div>
        <div class="col-12 px-0 d-flex mb-3 row pb-3">
            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
               Thumbnail - Website Icon(50*50)
            </div>
            <div class="col-12 col-lg-9 px-2">
                <input type="file" name="settings[website_icon]" class="form-control" >
                <div class="col-12 p-2">
                    <img src="{{$settings['get_website_icon']}}" style="width:100px;max-height: 100px;">
                </div>
            </div> 
        </div>
    </div>
    <!--- End en-tab ---->

</div>
<style>
    .taber.active{
        background-color: rgba(0, 0, 0, 0.023);
    }
    .settings-tab-opener{
        background-color: gainsboro;
    }
</style>

<div class="col-12 row" >
    {{-- <div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener active" data-opentab="Section-One">
        <span  class="fa-solid fa-1 me-2"></span>	Section One(Hedare)
    </div> --}}

    {{-- <div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener" data-opentab="Section-Two">
        <span  class="fa-solid fa-2 me-2"></span>	Section Two(INDUSTRIES)
    </div> --}}

    <div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener" data-opentab="Section-Three">
        <span  class="fa-solid fa-3 me-2"></span>	Section Three(subsidaries)
    </div>
</div>



<div class="col-12  px-3 py-5">
	 		 
    <!--- Start Section One(Hedare) ---->
    {{-- <div class="col-12 row p-0 taber active" id="Section-One">
        
            <div class="col-12 p-2">
                <div class="col-12">
                    Logo (D)
                </div>
                <div class="col-12 pt-3">
                    <input type="file" name="logo_D" class="form-control" accept="image/*">
                </div>
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('logo_D') }}" style="width:120px;">
                </div>
            </div>
            
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    bg_1 (Building background)
                </div>
                <div class="col-12 pt-3">
                    <input type="file" name="bg_1" class="form-control" accept="image/*">
                </div>
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('bg_1') }}" style="width:120px;">
                </div>
            </div>
            
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    bg_2(building)
                </div>
                <div class="col-12 pt-3">
                    <input type="file" name="bg_2" class="form-control" accept="image/*">
                </div>
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('bg_2') }}" style="width:120px;">
                </div>
            </div>
            
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    Text EN
                </div>
                <div class="col-12 pt-3">
                    <input type="file" name="text" class="form-control" accept="image/*">
                </div>
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('text') }}" style="width:300px;">
                </div>
            </div>
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    Text AR
                </div>
                <div class="col-12 pt-3">
                    <input type="file" name="text_ar" class="form-control" accept="image/*">
                </div>
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('text_ar') }}" style="width:300px;">
                </div>
            </div>
    </div> --}}
    <!--- End Section One(Hedare) ---->

    <!--- Start Section Two(INDUSTRIES) ---->
    {{-- <div class="col-12 row p-0 taber" id="Section-Two">
        <!-- Start Item 1 -->
        <div class="col-12 col-lg-6 p-2 border-bottom">
            <div class="col-12">
                icon 1
            </div>
            <div class="col-12 pt-3">
                <input type="file" name="industries_icon" class="form-control" accept="image/*">
            </div>
            <div class="col-12 pt-3">
                <img src="{{ App\Models\HomePage::first()->img('industries_icon') }}" style="width:120px;">
            </div>
        </div>
        
        <div class="col-12 col-lg-6 p-2 border-bottom">
            <div class="col-12">
                Title 1 (EN)
            </div>
            <div class="col-12 pt-3">
                <input type="text" name="industries_text" class="form-control" value="{{old('industries_text',$page)}}">
            </div>

            <div class="col-12">
                Title 1 (AR)
            </div>
            <div class="col-12 pt-3">
                <input type="text" name="industries_text_ar" class="form-control" value="{{old('industries_text_ar',$page)}}">
            </div>
        </div>
        <!-- End Item 1 -->
        <!-- Start Item 2 -->
        <div class="col-12 col-lg-6 p-2 border-bottom">
            <div class="col-12">
                icon 2
            </div>
            <div class="col-12 pt-3">
                <input type="file" name="industries_icon2" class="form-control" accept="image/*">
            </div>
            <div class="col-12 pt-3">
                <img src="{{ App\Models\HomePage::first()->img('industries_icon2') }}" style="width:120px;">
            </div>
        </div>
        
        <div class="col-12 col-lg-6 p-2 border-bottom">
            <div class="col-12">
                Title 2 (EN)
            </div>
            <div class="col-12 pt-3">
                <input type="text" name="industries_text2" class="form-control" value="{{old('industries_text2',$page)}}">
            </div>

            <div class="col-12">
                Title 2 (AR)
            </div>
            <div class="col-12 pt-3">
                <input type="text" name="industries_text2_ar" class="form-control" value="{{old('industries_text2_ar',$page)}}">
            </div>
        </div>
        <!-- End Item 2 -->
        <!-- Start Item 2 -->
        <div class="col-12 col-lg-6 p-2 border-bottom">
            <div class="col-12">
                icon 3
            </div>
            <div class="col-12 pt-3">
                <input type="file" name="industries_icon3" class="form-control" accept="image/*">
            </div>
            <div class="col-12 pt-3">
                <img src="{{ App\Models\HomePage::first()->img('industries_icon3') }}" style="width:120px;">
            </div>
        </div>
        
        <div class="col-12 col-lg-6 p-2 border-bottom">
            <div class="col-12">
                Title 3 (EN)
            </div>
            <div class="col-12 pt-3">
                <input type="text" name="industries_text3" class="form-control" value="{{old('industries_text3',$page)}}">
            </div>

            <div class="col-12">
                Title 3 (AR)
            </div>
            <div class="col-12 pt-3">
                <input type="text" name="industries_text3_ar" class="form-control" value="{{old('industries_text3_ar',$page)}}">
            </div>
        </div>
        <!-- End Item 3 -->
        


    </div> --}}
    <!--- End Section Two(INDUSTRIES) ---->

    <!--- Start Section Three(subsidaries) ---->
    <div class="col-12 row p-0 taber" id="Section-Three">
        
        <!-- Start Item 1 -->
        <div>
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#Add_Item" aria-expanded="false" aria-controls="Add_Item">
                Add Item
            </button>

            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Item_1" aria-expanded="false" aria-controls="Item_1">
                Item 1
            </button>
        </div>
          
        <div class="collapse pb-3" id="Item_1">
            <div class="card card-body">
                <button class="btn btn-outline-danger position-absolute" style="right: 10px;">
                    <i class="fal fa-trash"></i> Remove
                </button>
                <div class="col-12 p-2 row">
                    <div class="col-12 row p-0">
                        <div class="col-12">
                            <h4>Item Number 1</h4>
                        </div>
                        <div class="col-6 pt-3">
                            <img src="{{ App\Models\HomePage::first()->img('bg_image_home') }}" style="width:120px;">
                            <div class="form-group">
                                <label class="form-control-label" for="basic-url">Background Image in HomePage(610 * 868)</label>
                                <div class="input-group">
                                  {{-- <span class="input-group-text" id="basic-addon3">BG Home</span> --}}
                                  <input type="file" name="bg_image_home" class="form-control" accept="image/*" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 pt-3">
                            <img src="{{ App\Models\HomePage::first()->img('bg_image_subsidaries') }}" style="width:120px;">
                            <div class="form-group">
                                <label class="form-control-label" for="basic-url">Background Image in HomePage(1635 * 610)</label>
                                <div class="input-group">
                                  {{-- <span class="input-group-text" id="basic-addon3">BG Home</span> --}}
                                  <input type="file" name="bg_image_subsidaries" class="form-control" accept="image/*" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 row p-0 pt-4">
                        <div class="col-6">
                            Title (EN)
                            <input type="text" name="subsidaries_title" class="form-control" value="{{old('industries_text',$page)}}">
                        </div>
        
                        <div class="col-6">
                            Title (AR)
                            <input type="text" name="subsidaries_title_ar" class="form-control" value="{{old('industries_text_ar',$page)}}">
                        </div>
                    </div>

                    <div class="col-12 row p-0 pt-4">
                        <div class="col-6">
                            Description (EN)
                            <textarea name="subsidaries_description" class="form-control" style="min-height:150px">{{old('subsidaries_description',$page)}}</textarea>
                        </div>

                        <div class="col-6">
                            Description (AR)
                            <textarea name="subsidaries_description_ar" class="form-control" style="min-height:150px">{{old('subsidaries_description_ar',$page)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- End Item 1 -->

        <!-- Start Add New Item-->
        <div class="collapse pb-3" id="Add_Item">
            <div class="card card-body">
                <button class="btn btn-outline-danger position-absolute" style="right: 10px;">
                    <i class="fal fa-trash"></i> Remove
                </button>
                <div class="col-12 p-2 row">
                    <div class="col-12 row p-0">
                        <div class="col-12">
                            <h4>Item Number 1</h4>
                        </div>
                        <div class="col-6 pt-3">
                            <div class="form-group">
                                <label class="form-control-label" for="basic-url">Background Image in HomePage(610 * 868)</label>
                                <div class="input-group">
                                  {{-- <span class="input-group-text" id="basic-addon3">BG Home</span> --}}
                                  <input type="file" name="bg_image_home" class="form-control" accept="image/*" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 pt-3">
                            <div class="form-group">
                                <label class="form-control-label" for="basic-url">Background Image in HomePage(1635 * 610)</label>
                                <div class="input-group">
                                  {{-- <span class="input-group-text" id="basic-addon3">BG Home</span> --}}
                                  <input type="file" name="bg_image_subsidaries" class="form-control" accept="image/*" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 row p-0 pt-4">
                        <div class="col-6">
                            Title (EN)
                            <input type="text" name="subsidaries_title" class="form-control" value="{{old('industries_text',$page)}}">
                        </div>
        
                        <div class="col-6">
                            Title (AR)
                            <input type="text" name="subsidaries_title_ar" class="form-control" value="{{old('industries_text_ar',$page)}}">
                        </div>
                    </div>

                    <div class="col-12 row p-0 pt-4">
                        <div class="col-6">
                            Description (EN)
                            <textarea name="subsidaries_description" class="form-control" style="min-height:150px">{{old('subsidaries_description',$page)}}</textarea>
                        </div>

                        <div class="col-6">
                            Description (AR)
                            <textarea name="subsidaries_description_ar" class="form-control" style="min-height:150px">{{old('subsidaries_description_ar',$page)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Add New Item-->
          
        
    </div>
    <!--- End Section Three(subsidaries) ---->
</div>






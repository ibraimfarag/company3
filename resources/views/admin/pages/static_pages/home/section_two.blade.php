@extends('layouts.admin')
@section('content')
    <div class="col-12 col-lg-10 p-3 card">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.pages.home.update_section_two', $page) }}">
                @csrf
                @method('PUT')

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
                        <input type="text" name="industries_text" class="form-control"
                            value="{{ old('industries_text', $page) }}">
                    </div>

                    <div class="col-12">
                        Title 1 (AR)
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="industries_text_ar" class="form-control"
                            value="{{ old('industries_text_ar', $page) }}">
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
                        <input type="text" name="industries_text2" class="form-control"
                            value="{{ old('industries_text2', $page) }}">
                    </div>

                    <div class="col-12">
                        Title 2 (AR)
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="industries_text2_ar" class="form-control"
                            value="{{ old('industries_text2_ar', $page) }}">
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
                        <input type="text" name="industries_text3" class="form-control"
                            value="{{ old('industries_text3', $page) }}">
                    </div>

                    <div class="col-12">
                        Title 3 (AR)
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="industries_text3_ar" class="form-control"
                            value="{{ old('industries_text3_ar', $page) }}">
                    </div>
                </div>
                <!-- End Item 3 -->


                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

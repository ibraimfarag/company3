@extends('layouts.admin')
@section('content')

<div class="col-12 col-lg-10 p-3 card">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.career.update_intro',$page)}}">
            @csrf
            @method("PUT")
            
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    Intro (EN)
                </div>
                <div class="col-12 pt-3">
                    <textarea name="intro" rows="10" class="form-control with-file-explorer">{{old('intro',$intro_career_page)}}</textarea>
                </div>
            </div>

            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    Intro (AR)
                </div>
                <div class="col-12 pt-3">
                    <textarea name="intro_ar" rows="10" class="form-control with-file-explorer">{{old('intro_ar' ,$intro_career_page)}}</textarea>
                </div>
            </div>
            
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
@extends('layouts.admin')
@section('content')

<div class="col-12 col-lg-10 p-3 card">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.home.update_section_one',$page)}}">
            @csrf
            @method("PUT")
            <div class="col-12 p-2">
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('logo_D') }}" style="width:120px;">
                </div>
                <div class="col-12 pt-3">
                    Logo (D)
                    <input type="file" name="logo_D" class="form-control" accept="image/*">
                </div>
            </div>
            
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('bg_1') }}" style="width:120px;">
                </div>

                <div class="col-12 pt-3">
                    bg_1 (Building background)
                    <input type="file" name="bg_1" class="form-control" accept="image/*">
                </div>
            </div>
            
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('bg_2') }}" style="width:120px;">
                </div>
                <div class="col-12 pt-3">
                    bg_2(building)
                    <input type="file" name="bg_2" class="form-control" accept="image/*">
                </div>
            </div>
            
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('text') }}" style="width:300px;">
                </div>
                <div class="col-12 pt-3">
                    Text EN
                    <input type="file" name="text" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12 pt-3">
                    <img src="{{ App\Models\HomePage::first()->img('text_ar') }}" style="width:300px;">
                </div>
                <div class="col-12 pt-3">
                    Text AR
                    <input type="file" name="text_ar" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
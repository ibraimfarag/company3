@extends('layouts.admin')
@section('content')

<div class="col-12 col-lg-10 p-3 card">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.contact.update_details',$page)}}">
            @csrf
            @method("PUT")
            
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    CALL ON (Phone)
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="phone" required maxlength="190" class="form-control" value="{{old('phone',$contact)}}">
                </div>
            </div>

            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    address (EN)
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="address" required maxlength="190" class="form-control" value="{{old('address' ,$contact)}}">
                </div>
            </div>

            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    address (AR)
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="address_ar" required maxlength="190" class="form-control" value="{{old('address_ar',$contact)}}">
                </div>
            </div>

            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    Map Location
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="map_location" required class="form-control" value="{{old('map_location',$contact)}}">
                </div>
            </div>
            
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
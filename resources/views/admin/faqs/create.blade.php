@extends('layouts.admin')
@section('content')
<div class="col-12 p-3 card">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.faqs.store')}}">
            @csrf
            <div class="col-12 col-lg-8 p-0 ">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> Add New
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
             
                    
                    <div class="col-12 col-lg-12 p-2">
                        <div class="col-12">
                            question
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="question" required maxlength="190" class="form-control" value="{{old('question',$level??"")}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 p-2">
                        <div class="col-12">
                            answer
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="answer" class="form-control" style="min-height:150px">{{old('answer',$level??"")}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 p-2">
                        <div class="col-12">
                            is featured
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="is_featured">
                                <option @if(old('is_featured',$level??"")=="0" ) selected @endif value="0">No</option>
                                <option @if(old('is_featured',$level??"")=="1" ) selected @endif value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

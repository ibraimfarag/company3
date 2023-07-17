@extends('layouts.admin')
@section('content')
<div class="col-12 p-3 card">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row " enctype="multipart/form-data" method="POST" action="{{route('admin.articles.store')}}">
            @csrf
            <input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{uniqid()}}">
            <div class="col-12 col-lg-10 p-0  ">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> Add article
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                    <div class="col-12 col-lg-6 p-2 d-none"><!-- This Element is hidden --->
                        <div class="col-12">
                            category
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control select2-select d-none" name="category_id[]" required multiple size="1" style="height:30px;opacity: 0;">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" selected @if(old('category_id')==$category->id) selected @endif>{{$category->title}}</option>
                                    @break
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2 d-none"><!-- This Element is hidden --->
                        <div class="col-12">
                            Tags
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control select2-select" name="tag_id[]"  multiple size="1" style="height:30px;opacity: 0;">
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>
                    <div class="col-12 p-2">
                        <div class="col-12">
                            URL(slug)
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="slug" required maxlength="190" class="form-control" value="{{old('slug')}}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            title (EN)
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title" required maxlength="190" class="form-control" value="{{old('title')}}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            title (AR)
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title_ar" required maxlength="190" class="form-control" value="{{old('title_ar')}}">
                        </div>
                    </div>

                    <div class="col-12 p-2">
                        <div class="col-12">
                            main image
                        </div>
                        <div class="col-12 pt-3">
                            <input type="file" name="main_image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12 pt-3">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            description (EN)
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="description" class="editor with-file-explorer">{{old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            description (AR)
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="description_ar" class="editor with-file-explorer">{{old('description_ar')}}</textarea>
                        </div>
                    </div>

                    <div class="col-12 p-2">
                        <div class="col-12">
                            meta description
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="meta_description" class="form-control" style="min-height:150px">{{old('meta_description')}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 p-2 d-none"><!-- This Element is hidden --->
                        <div class="col-12">
                            is featured
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="is_featured">
                                <option @if(old('is_featured')=="0" ) selected @endif value="0">No</option>
                                <option @if(old('is_featured')=="1" ) selected @endif value="1">Yes</option>
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

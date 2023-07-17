@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 card">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.articles.update',$article)}}">
            @csrf
            @method("PUT")
            <input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{uniqid()}}">
            <div class="col-12 col-lg-10 p-0 ">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> Edit article
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                    <div class="col-12 col-lg-6 p-2 d-none"> <!-- This Element is hidden --->
                        <div class="col-12">
                            category
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control select2-select" name="category_id[]" required multiple size="1" style="height:30px;opacity: 0;">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(in_array($category->id,$article->categories->pluck('id')->toArray())) selected @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2 d-none"><!-- This Element is hidden --->
                        <div class="col-12">
                            Tags
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control select2-select" name="tag_id[]" multiple size="1" style="height:30px;opacity: 0;">
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}" @if(in_array($tag->id,$article->tags->pluck('id')->toArray())) selected @endif>{{$tag->tag_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12"></div>
                    <div class="col-12 p-2">
                        <div class="col-12">
                            URL(slug)
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="slug" required maxlength="190" class="form-control" value="{{$article->slug}}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            title (EN)
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title" required maxlength="190" class="form-control" value="{{$article->title}}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            title (AR)
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title_ar" required maxlength="190" class="form-control" value="{{$article->title_ar}}">
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
                            <img src="{{$article->main_image()}}" style="width:100px">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            description (EN)
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="description" class="editor with-file-explorer">{{$article->description}}</textarea>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            description (AR)
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="description_ar" class="editor with-file-explorer">{{$article->description_ar}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 p-2">
                        <div class="col-12">
                            meta description
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="meta_description" class="form-control" style="min-height:150px">{{$article->meta_description}}</textarea>
                        </div>
                    </div>

                    <div class="col-12 p-2 d-none"> <!-- This Element is hidden --->
                        <div class="col-12">
                            is featured
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="is_featured">
                                <option @if($article->is_featured=="0") selected @endif value="0">No</option>
                                <option @if($article->is_featured=="1") selected @endif value="1">Yes</option>
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

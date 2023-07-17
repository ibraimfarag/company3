@extends('layouts.admin')
@section('content')
<style type="text/css">
	.settings-tab-opener{
		/*box-shadow: 0px 6px 12px #ebebeb;*/
    	border-radius:0px;
    	cursor: pointer;
    	width:200px;
    	height: 45px;
    	border-left:1px solid var(--border-color);
    	border-bottom:1px solid var(--border-color);
	}
	.settings-tab-opener.active{
		box-shadow: 0px 6px 12px #c8e0ff;
		color: #fff;
		background: #2196f3;
	}
	.taber:not(.active){
		display: none;
	}
	
</style>

<div class="col-12 p-3 card">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.update',$page)}}">
            @csrf
            @method("PUT")
            <input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{uniqid()}}">
            <div class="col-12 col-lg-10 p-0 ">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> Edit Page
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                  
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            Title AR
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title" required maxlength="190" class="form-control" value="{{old('title',$page)}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            Title EN
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title_en" required maxlength="190" class="form-control" value="{{old('title_en',$page)}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            URL(Slug)
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="slug" required maxlength="190" class="form-control" value="{{old('slug',$page)}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            Main Image
                        </div>
                        <div class="col-12 pt-3">
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12 pt-3">
                            <img src="{{$page->image()}}" style="width:120px;">
                        </div>
                    </div>


                    <!-- Start Content Page ---->
                    <div class="col-12  p-2">
                        <div class="col-12">
                            @if($page->slug == 'home'|| $page->slug =='about'||$page->slug =='careers' || $page->slug =='Contact-Us' || $page->slug == 'subsidaries')
                                
                            @else
                                Content Page
                            @endif
                        </div>
                        <div class="col-12 pt-3">

                            @switch($page->slug)
                                @case('home')
                                    {{-- @include('admin.pages.static_pages.home') --}}
                                @break

                                @case('about')
                                    {{-- @include('admin.pages.static_pages.about') --}}
                                @break

                                @case('subsidaries')
                                    {{-- @include('admin.pages.static_pages.subsidaries') --}}
                                @break

                                @case('news')
                                    {{-- @include('admin.pages.static_pages.news') --}}
                                @break

                                @case('careers')
                                    {{-- @include('admin.pages.static_pages.career') --}}
                                @break

                                @case('Contact-Us')
                                    {{-- @include('admin.pages.static_pages.contact') --}}
                                @break


                                @default
                                    <textarea name="description" class="editor">{{old('description',$page)}}</textarea>
                                @break
                            @endswitch


                        </div>
                    </div> 
                    <!-- End Content Page ---->


                    <div class="col-12 p-2">
                        <div class="col-12">
                            Meta Description
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="meta_description" class="form-control" style="min-height:150px">{{old('meta_description',$page)}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 p-2">
                        <div class="col-12">
                            Deletable
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="removable">
                                <option @if(old('removable',$page)=="1" ) selected @endif value="1">Yes</option>
                                <option @if(old('removable',$page)=="0" ) selected @endif value="0">No</option>
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

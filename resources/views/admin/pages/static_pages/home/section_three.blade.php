@extends('layouts.admin')
@section('content')
    <div class="col-12 col-lg-10 p-3 card">
        <div class="col-12 col-lg-12 p-0 ">
            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-pages"></span> Section three (Subsidaries) and Subsidaries Page
                    </div>
                    <div class="col-12 col-lg-4 p-0">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        @can('pages-create')
                            <a data-bs-toggle="modal" data-bs-target="#addNewSubsidaries">
                                <span class="btn btn-primary"><span class="fas fa-plus"></span> Add New</span>
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="min-width:1100px;">


                    <table class="table table-sm table-bordered  table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>BG Image Home Page</th>
                                <th>BG Image Subsidaries Page</th>
                                <th>Title (EN)</th>
                                <th>Title (AR)</th>
                                <th scope="col">Description (EN)</th>
                                <th scope="col">Description (AR)</th>
                                <th>Link (Text EN)</th>
                                <th>Link (Text AR)</th>
                                <th>Link (URL)</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subsidaries as $subsidary)
                                <tr>
                                    <td>{{ $subsidary->id }}</td>
                                    <td>
                                        <img src="{{ $subsidary->img('bg_image_home') }}" style="width:120px;">
                                    </td>
                                    <td>
                                        <img src="{{ $subsidary->img('bg_image_subsidaries') }}" style="width:120px;">
                                    </td>
                                    <td>{!! $subsidary->subsidaries_title !!}</td>
                                    <td>{!! $subsidary->subsidaries_title_ar !!}</td>
                                    <td>{{ mb_strimwidth(($subsidary->subsidaries_description ), 0, 50, "...")}}</td>
                                    <td>{{ mb_strimwidth(($subsidary->subsidaries_description_ar ), 0, 50, "...")}}</td>
                                    <td>{!! $subsidary->click_here_to_visit??'none' !!}</td>
                                    <td>{!! $subsidary->click_here_to_visit_ar??'none' !!}</td>
                                    <td>
                                        @if($subsidary->link!= null)
                                            <a target="_blank" class="btn btn-sm btn-link" href="{{ $subsidary->link }}">Visit</a>
                                        @else
                                            none
                                        @endif
                                    </td>
                                    <td>
                                        @can('pages-update')
                                        <a data-bs-toggle="modal" data-bs-target="#UpdateNewSubsidaries_{{ $subsidary->id }}">
                                            <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                <span class="fas fa-wrench "></span> Edit
                                            </span>
                                        </a>
                                        @endcan
                                        @can('pages-delete')
                                        <form method="POST" action="{{route('admin.pages.home.delete_subsidaries',$subsidary->id)}}" class="d-inline-block">@csrf @method("DELETE")
                                            <button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('Are you sure about the deletion process?');if(result){}else{event.preventDefault()}">
                                                <span class="fas fa-trash "></span> Delete
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.home.update_section_one',$page)}}">
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
        </form> --}}
        </div>
    </div>



    <!-- Modal Add Subsidaries -->
    <div class="modal fade" id="addNewSubsidaries" tabindex="-1" role="dialog" aria-labelledby="addNewSubsidaries"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-center">
                            <h3 class="font-weight-bolder text-primary text-gradient">Add New Item</h3>
                        </div>
                        <div class="card-body pb-3">
                            <form id="validate-form" role="form text-left" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.home.add_subsidaries',$page)}}">
                                @csrf
                                @method("PUT")

                                <div class="col-md-6">
                                    <label>BG Image Home Page</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="bg_image_home" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>BG Image Subsidaries Page</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="bg_image_subsidaries" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Title (EN)</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="subsidaries_title" value="{{old('subsidaries_title')}}" class="form-control" placeholder="Title EN">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Title (AR)</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="subsidaries_title_ar" value="{{old('subsidaries_title_ar')}}" class="form-control" placeholder="Title AR">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Description (EN)</label>
                                    <div class="input-group mb-3">
                                        <textarea name="subsidaries_description" class="form-control">{{old('subsidaries_description')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Description (AR)</label>
                                    <div class="input-group mb-3">
                                        <textarea name="subsidaries_description_ar" class="form-control">{{old('subsidaries_description_ar')}}</textarea>
                                    </div>
                                </div>

                                <p>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                      Add Link(URL)
                                    </button>
                                </p>
                                  <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <div class="row p-0">
                                            <div class="col-md-6">
                                                <label>Text (EN)</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="click_here_to_visit" value="{{old('click_here_to_visit')}}" class="form-control" placeholder="Text (EN)">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Text (AR)</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="click_here_to_visit_ar" value="{{old('click_here_to_visit_ar')}}" class="form-control" placeholder="Text (AR)">
                                                </div>
                                            </div>
            
                                            <div class="col-md-12">
                                                <label>Link (URL)</label>
                                                <div class="input-group mb-3">
                                                    <input type="url" name="link" value="{{old('link')}}" class="form-control" placeholder="link">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                  </div>


                                <div class="text-center">
                                    <button type="submit" id="submitEvaluation"
                                        class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Update Subsidaries -->
    @foreach ($subsidaries as $subsidary)
        <div class="modal fade" id="UpdateNewSubsidaries_{{ $subsidary->id }}" tabindex="-1" role="dialog" aria-labelledby="UpdateNewSubsidaries_{{ $subsidary->id }}"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-center">
                                <h3 class="font-weight-bolder text-primary text-gradient">Update Item</h3>
                            </div>
                            <div class="card-body pb-3">
                                <form id="validate-form" role="form text-left" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.home.update_subsidaries', $subsidary->id)}}">
                                    @csrf
                                    @method("PUT")

                                    <div class="col-md-6">
                                        <img src="{{ $subsidary->img('bg_image_home') }}" style="width:120px;">
                                        <label>BG Image Home Page</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="bg_image_home" class="form-control" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <img src="{{ $subsidary->img('bg_image_subsidaries') }}" style="width:120px;">
                                        <label>BG Image Subsidaries Page</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="bg_image_subsidaries" class="form-control" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Title (EN)</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="subsidaries_title" value="{{old('subsidaries_title',$subsidary)}}" class="form-control" placeholder="Title EN">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Title (AR)</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="subsidaries_title_ar" value="{{old('subsidaries_title_ar',$subsidary)}}" class="form-control" placeholder="Title AR">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Description (EN)</label>
                                        <div class="input-group mb-3">
                                            <textarea name="subsidaries_description" class="form-control">{{old('subsidaries_description',$subsidary)}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Description (AR)</label>
                                        <div class="input-group mb-3">
                                            <textarea name="subsidaries_description_ar" class="form-control">{{old('subsidaries_description_ar',$subsidary)}}</textarea>
                                        </div>
                                    </div>

                                    <p>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Add Link(URL)
                                        </button>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <div class="row p-0">
                                                <div class="col-md-6">
                                                    <label>Text (EN)</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="click_here_to_visit" value="{{old('click_here_to_visit',$subsidary)}}" class="form-control" placeholder="Title EN">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Text (AR)</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="click_here_to_visit_ar" value="{{old('click_here_to_visit_ar',$subsidary)}}" class="form-control" placeholder="Title EN">
                                                    </div>
                                                </div>
                
                                                <div class="col-md-12">
                                                    <label>Link (URL)</label>
                                                    <div class="input-group mb-3">
                                                        <input type="url" name="link" value="{{old('link',$subsidary)}}" class="form-control" placeholder="Link">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" id="submitEvaluation"
                                            class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

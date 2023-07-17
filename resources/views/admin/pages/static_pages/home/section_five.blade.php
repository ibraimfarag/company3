@extends('layouts.admin')
@section('content')
    <div class="col-12 col-lg-10 p-3 card">
        <div class="col-12 col-lg-12 p-0 ">
            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-pages"></span> Section five (portfolio) and portfolio Page
                    </div>
                    <div class="col-12 col-lg-4 p-0">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        @can('pages-create')
                            <a data-bs-toggle="modal" data-bs-target="#addNewportfolio">
                                <span class="btn btn-primary"><span class="fas fa-plus"></span> Add New</span>
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="min-width:1100px;">


                    <table class="table table-bordered  table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title (EN)</th>
                                <th>Title (AR)</th>
                                <th>Sub Title (EN)</th>
                                <th>Sub Title (AR)</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolio as $portfo)
                                <tr>
                                    <td>{{ $portfo->id }}</td>
                                    <td>
                                        <img src="{{ $portfo->img('img') }}" style="width:120px;">
                                    </td>
                                    <td>{{ $portfo->title }}</td>
                                    <td>{{ $portfo->title_ar }}</td>
                                    <td>{{ $portfo->sub_title }}</td>
                                    <td>{{ $portfo->sub_title }}</td>
                                    <td>
                                        @can('pages-update')
                                        <a data-bs-toggle="modal" data-bs-target="#UpdateNewportfolio_{{ $portfo->id }}">
                                            <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                <span class="fas fa-wrench "></span> Edit
                                            </span>
                                        </a>
                                        @endcan
                                        @can('pages-delete')
                                        <form method="POST" action="{{route('admin.pages.home.delete_portfolio',$portfo->id)}}" class="d-inline-block">@csrf @method("DELETE")
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



    <!-- Modal Add portfolio -->
    <div class="modal fade" id="addNewportfolio" tabindex="-1" role="dialog" aria-labelledby="addNewportfolio"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-center">
                            <h3 class="font-weight-bolder text-primary text-gradient">Add New Item</h3>
                        </div>
                        <div class="card-body pb-3">
                            <form id="validate-form" role="form text-left" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.home.add_portfolio',$page)}}">
                                @csrf
                                @method("PUT")

                                <div class="col-12">
                                    <label>Image </label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="img" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Title (EN)</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Title EN">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Title (AR)</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="title_ar" value="{{old('title_ar')}}" class="form-control" placeholder="Title AR">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label>Sub Title (EN)</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="sub_title" value="{{old('sub_title')}}" class="form-control" placeholder="Title EN">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Sub Title (AR)</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="sub_title_ar" value="{{old('sub_title_ar')}}" class="form-control" placeholder="Title AR">
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


    <!-- Modal Update portfolio -->
    @foreach ($portfolio as $portfo)
        <div class="modal fade" id="UpdateNewportfolio_{{ $portfo->id }}" tabindex="-1" role="dialog" aria-labelledby="UpdateNewportfolio_{{ $portfo->id }}"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-center">
                                <h3 class="font-weight-bolder text-primary text-gradient">Update Item</h3>
                            </div>
                            <div class="card-body pb-3">
                                <form id="validate-form" role="form text-left" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.pages.home.update_portfolio', $portfo->id)}}">
                                    @csrf
                                    @method("PUT")

                                    <div class="col-12">
                                        <img src="{{ $portfo->img('img') }}" style="width:120px;">
                                        <label>Image </label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="img" class="form-control" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Title (EN)</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="title" value="{{old('title',$portfo)}}" class="form-control" placeholder="Title EN">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Title (AR)</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="title_ar" value="{{old('title_ar',$portfo)}}" class="form-control" placeholder="Title AR">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label>Sub Title (EN)</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="sub_title" value="{{old('sub_title',$portfo)}}" class="form-control" placeholder="Title EN">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Sub Title (AR)</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="sub_title_ar" value="{{old('sub_title_ar',$portfo)}}" class="form-control" placeholder="Title AR">
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

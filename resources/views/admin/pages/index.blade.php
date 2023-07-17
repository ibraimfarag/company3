@extends('layouts.admin')
@section('content')

<div class="col-12 p-3 card">
	<div class="col-12 col-lg-12 p-0 ">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-pages"></span> Pages
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('pages-create')
					<a href="{{route('admin.pages.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> Add New</span>
					</a>
					@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="search..." value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3 pb-5" style="overflow:auto">
			<div class="col-12 p-0 pb-5" style="min-width:1100px;height: 100%;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Added By</th>
						<th>Link(Slug)</th>
						<th>Image</th>
						<th>Title</th>
						<th>Control</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pages as $page)
					<tr>
						<td>{{$page->id}}</td>
						<td>{{$page->user->name}}</td>
						<td>{{$page->slug}}</td>
						<td><img src="{{$page->image()}}" style="width:40px"></td>
						<td>{{$page->title}}</td>
					 
						<td style="width: 270px;">

							@can('pages-read')
							<a target="_blank" href="{{ $page->slug=="home"?url('/'):route('page.show',['page'=>$page])}}">
								<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
									<span class="fas fa-search "></span> Show
								</span>
							</a>
							@endcan

							@can('pages-update')
							<a href="{{route('admin.pages.edit',$page)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> Control
								</span>
							</a>
							@endcan
							@can('pages-delete')
							<form method="POST" action="{{route('admin.pages.destroy',$page)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('Are you sure about the deletion process?');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> Delete
								</button>
							</form>
							@endcan


							<div class="dropdown d-inline-block ">
								<button class="py-1 px-2 btn btn-outline-primary font-small" type="button"
									id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
									<span class="fal fa-bars"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
									data-popper-placement="bottom-start"
									style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 29px, 0px);">
									
									@switch($page->slug)
										@case("home")
											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.home.edit_section_one',$page) }}">
													<span class="fal fa-eye"></span> 
													Section One(Hedare)
												</a>
											</li>

											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.home.edit_section_two',$page) }}">
													<span class="fal fa-eye"></span> 
													Section Two(INDUSTRIES)
												</a>
											</li>

											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.home.show_section_three',$page) }}">
													<span class="fal fa-eye"></span> 
													Section Three(subsidaries)
												</a>
											</li>

											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.home.show_section_five',$page) }}">
													<span class="fal fa-eye"></span> 
													Section Five(Portfolio)
												</a>
											</li>

											@break
										@case("about")
											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.about.edit_intro',$page) }}">
													<span class="fal fa-eye"></span> 
													Section One(intro)
												</a>
											</li>

											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.about.show_our_values',$page) }}">
													<span class="fal fa-eye"></span> 
													Section Two(Our Values)
												</a>
											</li>

											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.about.show_our_management',$page) }}">
													<span class="fal fa-eye"></span> 
													Section Three(Our Management)
												</a>
											</li>

											@break
											
										@case("careers")
											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.career.edit_intro',$page) }}">
													<span class="fal fa-eye"></span> 
													Section One(intro)
												</a>
											</li>

											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.career.show_why_work_at_diamond_group',$page) }}">
													<span class="fal fa-eye"></span> 
													Section Two<br>
													(why work at diamond group?)
												</a>
											</li>
											@break

										@case("Contact-Us")
											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.contact.edit_details',$page) }}">
													<span class="fal fa-eye"></span> 
													Contact-Us Details
												</a>
											</li>

											@break

										@case("subsidaries")
											<li>
												<a class="dropdown-item font-1" href="{{ route('admin.pages.home.show_section_three',$page) }}">
													<span class="fal fa-eye"></span> 
													Show Subsidaries
												</a>
											</li>
											@break
									@endswitch

							</div>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$pages->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection

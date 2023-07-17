@extends('layouts.admin')
@section('content')
<style>
	@media (min-width: 1200px){
		.boxs .col-xlg-2_5{
			flex: 0 0 auto;
			width:19.666667%;
		}
	}
</style>
	<div class="row boxs">
		<!--- Users --->
		@can('users-read')
			<div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
				<a href="{{route('admin.users.index')}}" class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-capitalize font-weight-bold">managers</p>
									<h5 class="font-weight-bolder">
										{{\App\Models\User::count()}}
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="fa-solid fa-users"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan
		<!--- End Users --->

		<!--- NOTIFICATIONS --->
		{{-- <div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
			<a href="{{route('admin.notifications.index')}}" class="card">
				<div class="card-body p-3">
					<div class="row">
						<div class="col-8">
							<div class="numbers">
								<p class="text-sm mb-0 text-capitalize font-weight-bold">notifications</p>
								<h5 class="font-weight-bolder">
									{{auth()->user()->unreadNotifications->count()}}
								</h5>
							</div>
						</div>
						<div class="col-4 text-end">
							<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
								<i class="fa-solid fa-bell"></i>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div> --}}
		<!--- End NOTIFICATIONS --->

		<!--- articles --->
		@can('articles-read')
			<div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
				<a href="{{route('admin.articles.index')}}" class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-capitalize font-weight-bold">Articles</p>
									<h5 class="font-weight-bolder">
										{{\App\Models\Article::count()}}
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="ni ni-books"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan
		<!--- End articles --->

		<!--- categories --->
		{{-- @can('categories-read')
			<div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
				<a href="{{route('admin.categories.index')}}" class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-capitalize font-weight-bold">Categories</p>
									<h5 class="font-weight-bolder">
										{{\App\Models\Category::count()}}
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="ni ni-tag"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan --}}
		<!--- End categories --->

		<!--- files --->
		@can('hub-files-read')
			<div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
				<a href="{{route('admin.files.index')}}" class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-capitalize font-weight-bold">files</p>
									<h5 class="font-weight-bolder">
										{{-- {{\App\Models\HubFile::count()}} --}}
										{{\App\Models\Media::count()}}
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="ni ni-single-copy-04"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan
		<!--- End files --->

		<!--- Menu --->
		{{-- @can('menus-read')
			<div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
				<a href="{{route('admin.menus.index')}}" class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-capitalize font-weight-bold">Menu</p>
									<h5 class="font-weight-bolder">
										{{\App\Models\Menu::count()}}
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="fa-solid fa-list-ul"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan --}}
		<!--- End Menu --->

		<!--- pages --->
		@can('pages-read')
			<div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
				<a href="{{route('admin.pages.index')}}" class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-capitalize font-weight-bold">Pages</p>
									<h5 class="font-weight-bolder">
										{{\App\Models\Page::count()}}
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="fa-solid fa-file-invoice"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan
		<!--- End pages --->

		<!--- contacts --->
		@can('contacts-read')
			<div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
				<a href="{{route('admin.contacts.index')}}" class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-capitalize font-weight-bold">contact Us</p>
									<h5 class="font-weight-bolder">
										{{\App\Models\Contact::count()}}
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="fa-solid fa-file-invoice"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan
		<!--- End contacts --->

		<!--- announcements --->
		{{-- @can('announcements-read')
			<div class="col-xl-2 col-xlg-2_5 col-md-3 col-sm-6 mb-xl-0 mb-4 mt-2">
				<a href="{{route('admin.announcements.index')}}" class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-capitalize font-weight-bold">announcements</p>
									<h5 class="font-weight-bolder">
										{{\App\Models\Announcement::count()}}
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="fa-solid fa-bullhorn"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan --}}
		<!--- End announcements --->

	</div>

<div class="container-fluid">
	<div class="col-12 px-2 py-2">
		<div style="height: 4px ;background: rgb(118 169 169);border-radius: 7px;transition: width .5s ease-in-out;width: 0%;" id="home-dashboard-divider"></div>
	</div>
	<livewire:dashboard-statistics />
</div>
	
@endsection
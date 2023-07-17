@extends('layouts.admin')
@section('content')
<div class="col-12 p-3 card">
	<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => 'Dashboard' , 'isactive' => false],
			['url' => route('admin.users.index') , 'title' => 'Users' , 'isactive' => false],
			['url' => route('admin.users.show', $user->id) , 'title' =>  $user->name, 'isactive' => false],
			['url' => '#' , 'title' => 'Edit' , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.update',$user)}}">
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-8 p-0 ">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>Edit User
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Name
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3"  maxlength="190" class="form-control" value="{{$user->name}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Email
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email"  class="form-control"  value="{{$user->email}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Password
				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password"  class="form-control"  minlength="8" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Personal Image
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="avatar"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">
					<img src="{{$user->getUserAvatar()}}" style="width:100px;margin-top:20px">
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Phone
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="phone"   maxlength="190" class="form-control"  value="{{$user->phone}}" >
				</div>
			</div>
			@if(auth()->user()->can('user-roles-update'))
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Roles
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="roles[]" multiple required>
						@foreach($roles as $role)
							<option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->display_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@endif
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Brief
				</div>
				<div class="col-12 pt-3">
					<textarea  name="bio" maxlength="5000" class="form-control" style="min-height:150px">{{$user->bio}}</textarea>
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Blocked
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" name="blocked">
						<option @if($user->blocked=="0") selected @endif value="0">No</option>
						<option @if($user->blocked=="1") selected @endif value="1">Yes</option>
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
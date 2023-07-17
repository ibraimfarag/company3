@extends('layouts.admin')
@section('content')
<div class="col-12 p-3 card">
	<div class="col-12 col-lg-12 p-0 ">
		 
		<div class="col-12 col-lg-12 p-0 ">

			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> صلاحيات المستخدم
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				{{-- {{dd($permissions)}} --}}
				<table class="table table-striped-columns table-hover" style="width:400px">
					<thead>
						<tr style="">
							<th>#</th>
							<th style="width: 56px;">Add</th>
							<th style="width: 56px;">Show</th>
							<th style="width: 56px;">Edit</th>
							<th style="width: 56px;">Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($permissions as $permission)
						@php
						$permissions_break = ['announcements', 'categories', 'comments', 'menu-links','menus','notifications','plugins','tags','faqs'];
                        if (in_array($permission->table, $permissions_break)) {
                            continue;
                        }
						$sub_permissions = \Spatie\Permission\Models\Permission::where('table',$permission->table)->get();
						@endphp
						<tr>
							
						 

							<td>
								@if($permission->table=='users')
                                    Managers
                                @elseif ($permission->table=='user-roles')
                                    Manager Roles
                                @else
                                    {{ $permission->table }}
                                @endif
								
							</td>

							@if($sub_permissions->where('name',$permission->table.'-create')->first())
							<td style="width: 56px;">

								@if($role->hasPermissionTo($permission->table.'-create')) 
									<span class="fas fa-check font-2" style="color:green;"></span>
								@endif


							</td>
							@else
							<td style="width: 56px;">
							</td>
							@endif
							@if($sub_permissions->where('name',$permission->table.'-read')->first())
							<td style="width: 56px;">
								@if($role->hasPermissionTo($permission->table.'-read')) 
									<span class="fas fa-check font-2" style="color:green;"></span>
								@endif
							</td>
							@else
							<td style="width: 56px;">
							</td>
							@endif
							@if($sub_permissions->where('name',$permission->table.'-update')->first())
							<td style="width: 56px;">
								 
								@if($role->hasPermissionTo($permission->table.'-update')) 
									<span class="fas fa-check font-2" style="color:green;"></span>
								@endif
							</td>
							@else
							<td style="width: 56px;">
							</td>
							@endif
							@if($sub_permissions->where('name',$permission->table.'-delete')->first())
							<td style="width: 56px;">
								 
								@if($role->hasPermissionTo($permission->table.'-delete')) 
									<span class="fas fa-check font-2" style="color:green;"></span>
								@endif
							</td>
							@else
							<td style="width: 56px;">
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			 
			</div>
 
		</div>
	</div>
</div>
@endsection
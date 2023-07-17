@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box card">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-articles"></span> News
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('articles-create')
					<a href="{{route('admin.articles.create')}}">
						<span class="btn btn-primary"><span class="fas fa-plus"></span> Add new article</span>
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
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>user</th>
						<th>main image</th>
						<th>title (EN)</th>
						<th>title (AR)</th>
						{{-- <th>is featured</th> --}}
						<th>visitors</th>
						<th>control</th>
					</tr>
				</thead>
				<tbody>
					@foreach($articles as $article)
					<tr>
						<td>{{$article->id}}</td>
						<td>{{$article->user->name}}</td>
						{{-- <td>
							<a href="{{route('admin.categories.index',['id'=>$article->category_id])}}" style="color:#2381c6">{{$article->category->title_ar}}</a>
						</td> --}}
						<td><img src="{{$article->main_image()}}" style="width:40px"></td>
						<td>{{$article->title}}</td>
						<td>{{$article->title_ar}}</td>

						{{-- <td>
							@if($article->is_featured==1)
							<span class="fas fa-check-circle text-success" ></span>
							@endif
						</td> --}}
						<td>{{$article->views}}</td>
						<td style="width: 360px;">


							

							@can('articles-read')
							<a href="{{route('article.show',['article'=>$article])}}">
								<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
									<span class="fas fa-search "></span> show
								</span>
							</a>
							@endcan
							
							{{-- @can('comments-read')
							<a href="{{route('admin.article-comments.index',['article_id'=>$article->id])}}">
								<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
									<span class="fas fa-comments "></span> comments
								</span>
							</a>
							@endcan --}}

							@can('articles-update')
							<a href="{{route('admin.articles.edit',$article)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> control
								</span>
							</a>
							@endcan
							@can('articles-delete')
							<form method="POST" action="{{route('admin.articles.destroy',$article)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('Are you sure about the deletion process?');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> delete
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
		<div class="col-12 p-3">
			{{$articles->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
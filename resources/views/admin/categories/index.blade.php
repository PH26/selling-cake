@extends('admin.layout.index')
@section('content')
<div class="page-header">
	<h1>Category
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			List category
		</small>
	</h1>
	<br>
	@if(session('notification'))
		<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
			{{session('notification')}}
		</div>
	@endif
	@if(session('warning'))
		<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
			{{session('warning')}}
		</div>
	@endif
	<div class="hr hr-18 dotted hr-double"></div>

	<!-- <div class="row"> -->
			<div class="col-xs-12">
				<!-- <div> -->
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="center">ID</th>
								<th class="center">Name</th>
								<th class="center">Actions</th>
							</tr>
						</thead>

						<tbody>
							@foreach($cates as $cate)
							<tr>
								<td class="center">{{$cate->id}}</td>
								<td class="center">{{$cate->name}}</td>
								<td class="center">
									<div class="hidden-sm hidden-xs action-buttons">
										<a class="green" href="admin/category/edit/{{$cate->id}}">
											<i class="ace-icon fa fa-pencil bigger-130"></i>
										</a>

										<a class="red" data-categoryid={{ $cate->id }} data-toggle="modal" data-target="#delete" title="Delete category">
											<i class="ace-icon fa fa-trash-o bigger-130"></i>
										</a>
									</div>

									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
														<span class="green">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				<!-- </div> -->
			</div>
		</div>
		<!-- Modal -->
	<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style='position: relative; top:21px; font-weight:bold;'>Delete Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="GET" id='delete-category'>
						{{csrf_field()}}
					<div class="modal-body">
					<p class="text-center" style='color: red;'>
						Are you sure want to delete this category?
					</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-danger">Yes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@section('script')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    $('#delete').on('show.bs.modal', function (event) {
      		var button = $(event.relatedTarget)
			var categoryID = button.data('categoryid')
            $("#delete-category").attr('action', 'admin/category/delete/' + categoryID );

    })
</script>

@endsection
</div>
@endsection
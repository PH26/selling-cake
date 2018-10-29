@extends('admin.layout.index')
@section('content')
<div class="page-header">
	<h1>Slide
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			List slide
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

	<div class="hr hr-18 dotted hr-double"></div>

	<!-- <div class="row"> -->
		<div class="col-xs-12">
			<div>
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="center">ID</th>
							<th class="center">Link</th>
							<th class="center">Image</th>
							<th class="center">Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach($slides as $slide)
						<tr>
							<td class="center"><p style="position:relative; top:25px">{{$slide->id}}</p></td>
							<td class="center"><p style="position:relative; top:25px">{{$slide->link}}</p></td>
							<td class="center"><img width='100px' src='upload/slide/{{$slide->image}}'></td>
							<div class="hidden-sm hidden-xs action-buttons">
							<td class="center">
								<div class="hidden-sm hidden-xs action-buttons" style="position:relative; top:25px">
									<a class="green" href="admin/slide/edit/{{$slide->id}}">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" data-slideid={{ $slide->id }} data-toggle="modal" data-target="#delete" title="Delete slide" >
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style='position: relative; top:21px; font-weight:bold;'>Delete Slide</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="GET" id='delete-slide'>
						{{csrf_field()}}
					<div class="modal-body">
					<p class="text-center" style='color: red;'>
						Are you sure want to delete this slide?
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
			var slideid = button.data('slideid')
            $("#delete-slide").attr('action', 'admin/slide/delete/' + slideid );
    })
</script>

@endsection
@endsection
@extends('admin.layout.index')
@section('content')
<div class="page-header">
	<h1>User Management
		<small>
		<i class="ace-icon fa fa-angle-double-right"></i>
			List User
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
		<form id='form'>
				
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="center">ID</th>
							<th class="center">Name</th>
							<th class="center">Email</th>
							<th class="center">Address</th>
							<th class="center">Phone</th>
							<th class="center">Role</th>
							<th class="center">Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach($users as $user)
						<tr>
							<td class="center">{{$user->id}}</td>
							<td class="center">{{$user->name}}</td>
							<td class="center">{{$user->email}}</td>
							<td class="center">{{$user->address}}</td>
							<td class="center">{{$user->phone}}</td>
							<td class="center">
							@if($user->role == 1)
								{{"Admin"}}
							@else
								{{"Normal"}}
							@endif
							</td>
							<td class="center">
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="admin/user/edit/{{$user->id}}">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>
									<a class="red" class="btn btn-danger" data-userid={{ $user->id }} data-toggle="modal" data-target="#delete" title="Delete user" >
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
		</form>
	</div>
	<!-- Modal -->
	<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style='position: relative; top:21px; font-weight:bold;'>Delete User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="GET" id='delete-user'>
						{{csrf_field()}}
					<div class="modal-body">
					<p class="text-center" style='color: red;'>
						Are you sure want to delete this user?
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
			var userId = button.data('userid')
            $("#delete-user").attr('action', 'admin/user/delete/' + userId );

    })
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
		// $.noConflict();
	$(document).ready(function(){
		fetch_users_data();

		function fetch_users_data(query = '')
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url:"{{ route('users_search.action') }}",
				method:'GET',
				data:{query:query, _token:_token},
				dataType:'json',
				success:function(data)
				{
					console.log(data);
					$('tbody').html(data.table_data);
					$('#total_records').text(data.total_data);
				},
					error: function(err){
						console.log(err)
				}
			});
		}

		$('#search').on('change', function() {
			var query = $(this).val();
			fetch_users_data(query);
		});
	});
</script>

@endsection

@endsection



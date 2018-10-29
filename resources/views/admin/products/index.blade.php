@extends('admin.layout.index')
@section('content')
<div class="page-header">
	<h1>Product
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			List product
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
				<div>
					<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
						<div class="row">
							<div class="col-xs-6">
								<!-- <div class="dataTables_length" id="dynamic-table_length">
									<label>Display
										<select id="display" aria-controls="dynamic-table" class="form-control input-sm" type='submit'>
											<option value="5">5</option>
											<option value="10">10</option>
											<option value="15">15</option>
											<option value="20">20</option>
											<option value="50">50</option>
										</select>
										records
									</label>
								</div> -->
							</div>
							<div class="col-xs-6">
								<div id="dynamic-table_filter" class="dataTables_filter">
								<form class="form-search" action="{{url('product_search.action')}}" >
									{{ csrf_field() }}
									<label>Search:
										<input type="text" class="form-control input-sm" name="search" id="search" aria-controls="dynamic-table" autocomplete="off">
									</label>
								</form>
								</div>
							</div>
						</div>

						<table id="product_table" class="table table-bordered" style="width:100%">
							<thead>
								<tr role="row">
									<th class="center">ID</th>
									<th class="center" >Name</th>
									<th class="center" >Category</th>
									<th class="center">Quantity</th>
									<th class="center">Actions</th>
								</tr>
							</thead>
							<tbody id='data'>
								<!-- @foreach($products as $product)
								<tr>
									<td class="center">{{$product->id}}</td>
									<td class="center">{{$product->name}}</td>
									<td class="center">{{$product->categories->name}}</td>
									<td class="center">{{$product->quantity}}</td>
									<td class="center">
										<div class="hidden-sm hidden-xs action-buttons">
											<a class="green" href="admin/product/edit/{{$product->id}}">
												<i class="ace-icon fa fa-pencil bigger-130"></i>
											</a>

											<a class="red" data-productid={{ $product->id }} data-toggle="modal" data-target="#delete" title="Delete product">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>
										</div>
									</td>
								</tr>
									@endforeach -->
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
					<h5 class="modal-title" id="exampleModalLabel" style='position: relative; top:21px; font-weight:bold;'>Delete Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="GET" id='delete-product'>
						{{csrf_field()}}
					<div class="modal-body">
					<p class="text-center" style='color: red;'>
						Are you sure want to delete this product?
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
			var productID = button.data('productid')
            $("#delete-product").attr('action', 'admin/product/delete/' + productID );

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
			$("#display").change(function () {
				var selectedText = $(this).find("option:selected").text();
				var display = $(this).val();
				// alert("Selected Text: " + selectedText + " Value: " + selectedValue);
       		 });
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url:"{{ route('products_search.action') }}",
				method:'GET',
				data:{query:query, _token:_token},
				dataType:'json',
				success:function(data)
				{
					console.log(data);
					$('tbody').html(data.table_data);
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


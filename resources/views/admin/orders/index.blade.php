@extends('admin.layout.index')
@section('content')
	<div class="page-header">
		<h1>Order Manager</h1>
		<br>
			@if(session('notification'))
			<div class="alert alert-success">
				{{session('notification')}}
			</div>
			@endif
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="row">
					<div class="col-xs-12">
						<table id="simple-table" class="table  table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">ID</th>
									<th class="detail-col">Details</th>
									<th class="center">User</th>
									<th class="center">Order Date</th>
									<th class="center">Note</th>
									<th class="center">Payment</th>
									<th class="center">Status</th>
									<th class="center">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($orders as $order)
								<tr>
									<td  class="center">{{$order->id}}</td>
									<td class="center">
										<div class="action-buttons">
											<a href="" class="green bigger-140 show-details-btn" title="Show Details" id="{{$order->id}}">
												<i class="ace-icon fa fa-angle-double-down"></i>
												<span class="sr-only">Details</span>
											</a>
										</div>
									</td>
									<td  class="center">
										{{$order->users->name}}
									</td>
									<td  class="center">{{$order->date_order}}</td>
									<td  class="center">{{$order->note}}

									</td>
									<td  class="center">{{$order->payment}}</td>

									<td  class="center">
										<span class="btn btn-white btn-primary">{{$order->status}}</span>
									</td>

									<td class="center">
										<div class="hidden-sm hidden-xs btn-group ">
											<a href="admin/order/edit/{{$order->id}}"><button class="btn btn-xs btn-info" style='margin-right:10px;'>
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											</a>
											<a href="admin/order/delete/{{$order->id}}"><button class="btn btn-xs btn-danger">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</button>
											</a>
										</div>
									</td>
								</tr>
								@foreach($order->orderDetails as $orderDetail)
										<tr class="detail-row order-detail-{{$order->id}}" >
										<td colspan="8">
											<div class="table-detail">
												<div class="row">
													<div class="col-xs-12 col-sm-2">
														<div class="text-center">
															<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="upload/products/{{$orderDetail->products->image}}"
															width='176.83 px'/>
															<br />
														</div>
													</div>

													<div class="col-xs-12 col-sm-7">

														<div class="profile-user-info profile-user-info-striped">
															<div class="profile-info-row">
																<div class="profile-info-name"> Product Name </div>

																<div class="profile-info-value">
																	<span>{{$orderDetail->products->name}}</span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name"> Price </div>

																<div class="profile-info-value">
																	<span>{{$orderDetail->price}}</span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name">Quantity</div>

																<div class="profile-info-value">
																	<span>{{$orderDetail->quantity}}</span>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
							@endforeach
						    </tbody>
						</table>
					</div><!-- /.span -->
				</div><!-- /.row -->
			</div><!-- /.col -->
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	jQuery(function($) {
		$('.show-details-btn').on('click', function(e) {
			e.preventDefault();
			var order_id= $(this).attr('id');
			// console.log(order_id,$('.detail-row').length );

			$('.detail-row').each(function( index ) {
				$(this).removeClass('open');
			});
			$('.order-detail-'+order_id).each(function( index ) {
				$(this).addClass('open');
			});
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});
	})
</script>
@endsection
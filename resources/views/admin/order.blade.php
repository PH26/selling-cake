@extends('admin.layout.index')
@section('content')
	<div class="page-header">
		<h1>
		Order Manager
		</h1>
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
											<a href="" class="green bigger-140 show-details-btn" title="Show Details">
												<i class="ace-icon fa fa-angle-double-down"></i>
												<span class="sr-only">Details</span>
											</a>
										</div>
									</td>
									<td  class="center">
										{{$order->users->name}}
									</td>
									<td  class="center">{{$order->date_order}}</td>
									<td  class="center">{{$order->note}}</td>
									<td  class="center">{{$order->payment}}</td>

									<td  class="center">
										<span class="label label-sm label-warning">{{$order->status}}</span>
									</td>

									<td>
										<div class="hidden-sm hidden-xs btn-group">
											<button class="btn btn-xs btn-success">
												<i class="ace-icon fa fa-check bigger-120"></i>
											</button>

											<button class="btn btn-xs btn-info">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>

											<button class="btn btn-xs btn-danger">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</button>

											<button class="btn btn-xs btn-warning">
												<i class="ace-icon fa fa-flag bigger-120"></i>
											</button>
										</div>

										<!-- <div class="hidden-md hidden-lg">
											<div class="inline pos-rel">
												<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
													<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
												</button>

											<ul class="dropdown-menu 		 dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
														<span class="blue">
															<i class="ace-icon fa fa-search-plus bigger-120"></i>
														</span>
													</a>
												</li>

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
										</div> -->
									</td>
								</tr>
								@endforeach
								@foreach($orderDetails as $orderDetail)
								<tr class="detail-row">
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

						</tbody>
					</table>
				</div><!-- /.span -->
			</div><!-- /.row -->

				<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!
</div>
@endsection

@section('script')
<script type="text/javascript">
	jQuery(function($) {
		$('.show-details-btn').on('click', function(e) {
			e.preventDefault();
			$(this).closest('tr').next().toggleClass('open');
			$(this).closest('tr').next().next().next().toggleClass('open');
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});
	})
</script>
@endsection
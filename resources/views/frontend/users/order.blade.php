@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

@include('frontend.layout.section')
<div class="ps-section--page-reverse">
        <div class="container">
          <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                  <div class="ps-blog-detail pt-80 pb-80">
                    <div class="ps-post">
                      <div class="ps-post__header"><a class="ps-post__title" >My Order</a>
                      </div>
                      <div class="ps-post__content">
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

				<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                  <div class="ps-sidebar">
                    <aside class="ps-widget ps-widget--sidebar ps-widget--category">
                      <div class="ps-widget__header">
                        <h3 class="ps-widget__title">My Area</h3>
                      </div>
                      <div class="ps-widget__content">
                        <ul class="ps-list--arrow">
                          <li ><a href="user/profile"><span class="circle"></span>My Profile</a></li>
                          <li class="current"><a href="user/order"><span class="circle"></span>My Order</a></li>
                        </ul>
                      </div>
                    </aside>
                  </div>
                </div>
          </div>
        </div>
      </div>
</div>
@endsection
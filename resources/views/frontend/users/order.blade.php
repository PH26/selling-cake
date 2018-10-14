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
											@if(session('notification'))
													<div class="alert alert-success">
															{{session('notification')}}
													</div>
											@endif
                      <div class="ps-post__header"><a class="ps-post__title" >My Order</a>
                      </div>
                      <div class="ps-post__content">
												<div class="row">
													<div class="col-xs-12">
														<!-- PAGE CONTENT BEGINS -->
														<div class="row">
															<div class="col-xs-12">
																<table id="simple-table" class="table  table-bordered table-hover">
																@if(count($orders) > 0)
																	<thead>
																		<tr>
																			<th class="center">Number</th>
																			<th class="detail-col">Details</th>
																			<th class="center">Order Date</th>
																			<th class="center"users>Note</th>
																			<th class="center">Payment</th>
																			<th class="center">Status</th>
																			<th class="center">Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		@foreach($orders as $key => $order)
																		<tr>
																			<td class="center">
																				{{$key + 1}}
																			</td>
																			<td class="center">
																				<div class="action-buttons">
																					<a href="" class="green bigger-140 show-details-btn" title="Show Details" id="{{$order->id}}">
																						<i class="ace-icon fa fa-angle-double-down"></i>
																						<span class="sr-only">Details</span>
																					</a>
																				</div>
																			</td>
																			<td  class="center">{{$order->date_order}}</td>
																			<td  class="center">{{$order->note}}

																			</td>
																			<td  class="center">{{$order->payment}}</td>

																			<td  class="center">
																				<span class="btn btn-white btn-primary">{{$order->status}}</span>
																			</td>

																			<td>
																				<div class="hidden-sm hidden-xlg btn-group">
																					<a href="user/order/delete/{{$order->id}}"><button class="btn btn-danger btn-xlg">
																						<i class="ace-icon fa fa-trash-o bigger-200"></i>
																					</button></a>
																				</div>
																			</td>
																		</tr>
																		@foreach($order->orderDetails as $orderDetail)
																				<!-- <form href="user/order/delete/{{$order->id}}"method='POST'>
																				{{ csrf_field() }} -->
																				<tr class="detail-row order-detail-{{$order->id}}" style='display: none'>
																				<td colspan="8">
																					<div class="table-detail">
																						<div class="row">
																							<div class="col-xs-12 col-sm-2">
																								<div class="text-center">
																									<img class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="upload/products/{{$orderDetail->products->image}}"
																									width='176.83 px'/>
																									<br />
																								</div>
																							</div>

																							<div class="col-xs-12 col-sm-7">
																								<div class="profile-user-info profile-user-info-striped">
																									<div class="profile-info-row">
																										<div class="profile-info-name"> Product Name:  <span>{{$orderDetail->products->name}}</span> </div>

																									<div class="profile-info-row">
																										<div class="profile-info-name"> Price:  <span>{!!number_format($orderDetail->price,0,",",".") . ' đ'!!}</span> </div>
																									</div>

																									<div class="profile-info-row">
																										<div class="profile-info-name">Quantity:  <span>{{$orderDetail->quantity}}</span>
																										</div>
																									</div>

																								</div>
																							</div>
																						</div>
																					</div>
																				</td>
																				</tr>
																			<!-- </form> -->
																			@endforeach
																		@endforeach
																</tbody>
																@else
																<h3 style='text-align: center; color: red;'>You don't have any order</h3>
																@endif
															</table>
														</div><!-- /.span -->
													</div><!-- /.row -->

														<!-- PAGE CONTENT ENDS -->
													</div><!-- /.col -->
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
				$(this).style.display = "block";
			});
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});
	})
</script>
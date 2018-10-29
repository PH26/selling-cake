@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

<div class="ps-section--hero"><img src="frontend/images/hero/01.jpg" alt="">
            <div class="ps-section__content text-center">
                <h3 class="ps-section__title">OUR BAKERY</h3>
                <div class="ps-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="homepage">Home</a></li>
                        <li class="active">My Order</li>
                    </ol>
                </div>
            </div>
        </div>
<div class="ps-section--page-reverse">
    <div class="container">
      <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
              <div class="ps-blog-detail pt-80 pb-80">
                <div class="ps-post">
				@if(session('notification'))
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
								{{session('notification')}}
						</div>
				@endif
                  <div class="ps-post__header"><a class="ps-post__title" >My Order</a></div>
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
												<th class="center" style='width: 20px;'>Number</th>
												<th class="center" >Order Date</th>
												<th class="center">Note</th>
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
												<td  class="center">{{$order->date_order}}</td>
												<td  class="center">{{$order->note}}

												</td>
												<td  class="center">{{$order->payment}}</td>

												<td  class="center">
													<span class="btn btn-white btn-primary">{{$order->status}}</span>
												</td>

												<td>
													<div class="hidden-sm hidden-xlg btn-group">
													<button class="btn btn-danger" data-orderid={{ $order->id }} data-toggle="modal" data-target="#delete" title="Delete order">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</div>
												</td>
											</tr>
											@foreach($order->orderDetails as $orderDetail)
											<tr class="detail-row order-detail-{{$order->id}}">
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
					<!-- Modal -->
					<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel" style='position: relative; top:21px; font-weight:bold;'>Delete Order</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="" method="GET" id='delete-order'>
							{{csrf_field()}}
						<div class="modal-body">
						<p class="text-center" style='color: red;'>
							Are you sure want to delete this order?
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
			var order_id = button.data('orderid')
            $("#delete-order").attr('action', 'user/order/delete/'+order_id );

    })
  </script>

@endsection


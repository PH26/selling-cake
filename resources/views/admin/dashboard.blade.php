@extends('admin.layout.index')
@section('content')
<div class="page-header">
							<h1>Dash Board</h1>
							<br>
							@if(session('notification'))
								<div class="alert alert-success">
									{{session('notification')}}
								</div>
                        	@endif
							<div class="hr hr-18 dotted hr-double"></div>

							<!-- <div class="row"> -->
									<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Welcome to {{Auth::user()->name}} come back to Vanila Bakery Admin

								</div>

								<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-5 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">{{count($user)}}</span>
												<div class="infobox-content">User</div>
											</div>

										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-birthday-cake"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">{{count($product)}}</span>
												<div class="infobox-content">Product</div>
											</div>

										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-align-justify"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">{{count($category)}}</span>
												<div class="infobox-content">Category</div>
											</div>
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">{{count($orders)}}</span>
												<div class="infobox-content">Order</div>
											</div>
										</div>

									</div>

									<div class="vspace-12-sm"></div>

									<div class="col-sm-5" style="position:relative;left:170px;">
										<div class="widget-box">
                                        <h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Order Management
												</h4>
                                        <table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th class='center'>User</th>

																<th class='center'>Order Date</th>

																<th class='center'>Status</th>
															</tr>
														</thead>

														<tbody>
                                                            @foreach($orders as $order)
															<tr>
																<td class='center'>{{$order->users->name}}</td>

																<td class='center'>{{$order->date_order}}</td>

																<td class='center'>
																	<span class="label label-info arrowed-right arrowed-in">{{$order->status}}</span>
																</td>
															</tr>
                                                            @endforeach
														</tbody>
                                                 </table>

											</div>

										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								<!-- </div>/.row -->


							</div><!-- /.col -->
						</div><!-- /.row -->
									</div>
								</div>
</div>
@endsection
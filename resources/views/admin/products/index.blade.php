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
									{{session('notification')}}
								</div>
                        	@endif
							<div class="hr hr-18 dotted hr-double"></div>


							<div class="row">
								<div class="col-xs-12">
								<form id='form'>
										<div class="clearfix">
											<div class="pull-right tableTools-container">
												<div class="dt-buttons btn-overlap btn-group">
													<a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title="">
														<span><i class="fa fa-search bigger-110 blue"></i> <span class="hidden">Show/hide columns</span></span>
													</a>
												</div>
											</div>
										</div>

										<div>
											<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
												<div class="row">
													<div class="col-xs-6">
														<div class="dataTables_length" id="dynamic-table_length">
															<label>Display
																<select name="dynamic-table_length" aria-controls="dynamic-table" class="form-control input-sm">
																	<option value="10">10</option>
																	<option value="25">25</option>
																	<option value="50">50</option>
																	<option value="100">100</option>
																</select>
																records
															</label>
														</div>
													</div>
													<div class="col-xs-6">
														<div id="dynamic-table_filter" class="dataTables_filter">
															<label>Search:
																<input type="text" class="form-control input-sm" name="search" id="search" aria-controls="dynamic-table" autocomplete="off">
															</label>
														</div>
													</div>
												</div>
												<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
												<thead>
													<tr role="row">
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Name</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Category</th>
														<th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">Quantity</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Actions</th>
													</tr>
												</thead>
												<tbody id='data'>
													@foreach($products as $product)
													<tr>
														<td class="center">{{$product->id}}</td>
														<td class="center">{{$product->name}}</td>
														<td class="center">{{$product->categories->name}}</td>
														<td class="center">{{$product->quantity}}</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="admin/product/edit/{{$product->id}}">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="admin/product/delete/{{$product->id}}">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>
														</td>
													</tr>
												   	 @endforeach
												</tbody>

											</table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">Showing 1 to 10 of 23 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="dynamic-table" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="dynamic-table" tabindex="0"><a href="#">2</a></li><li class="paginate_button " aria-controls="dynamic-table" tabindex="0"><a href="#">3</a></li><li class="paginate_button next" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_next"><a href="#">Next</a></li></ul></div></div></div></div>
										</div>
									</form>
									</div>
								</div>

@endsection



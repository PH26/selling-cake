@extends('admin.layout.index')
@section('content')
<div class="page-header">
							<h1>
								Slide
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									List slide
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

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
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
														<td class="center">{{$slide->id}}</td>
														<td class="center">{{$slide->link}}</td>
														<td class="center"><img width='100px' src='upload/slide/{{$slide->image}}'></td>
														<div class="hidden-sm hidden-xs action-buttons">
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="admin/slide/edit/{{$slide->id}}">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="admin/slide/delete/{{$slide->id}}">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
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
																</div>
															</div>
														</td>

													</tr>
												   @endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
</div>
@endsection
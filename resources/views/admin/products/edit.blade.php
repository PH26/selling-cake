@extends('admin.layout.index')
@section('content')
<div class="page-header">
							<h1>
								Edit Product
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									{{$product->name}}
								</small>
							</h1>
						</div>
						<!-- /.page-header -->
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<div class="row">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="admin/product/edit/{{$product->id}}" method='POST' enctype='multipart/form-data'>
									{{ csrf_field() }}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name='name' value="{{$product->name}}" placeholder="Name" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Description</label>

										<div class="col-sm-4">
											<textarea name='description' value="" id='demo' class="form-control ckeditor" rows="4">{{$product->description}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category</label>

										<div class="col-sm-4">
											<select name='category_id' class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a Category...">
												@foreach($categories as $category)
													<option
													@if($product->categories->id == $category->id)
														{{"selected"}}
													@endif
													value="{{$category->id}}">{{$category->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>

										<div class="col-sm-4">
											<div class="col-xs-12">
											  <p><img width='400px' src='upload/products/{{$product->image}}'/></p>
											  <input name='image' type="file" id="id-input-file-2" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Unit Price</label>

										<div class="col-sm-4">
												<div class="widget-body">
													<div class="widget-main">
														<input name='unit_price' value="{{$product->unit_price}}" type="text" />
														<div class="space-6"></div>
													</div>
												</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Promote Price</label>

										<div class="col-sm-4">
												<div class="widget-body">
													<div class="widget-main">
														<input name='promote_price' value="{{$product->promote_price}}" type="text" class="input-sm"/>
														<div class="space-6"></div>
													</div>
												</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Quantity</label>

										<div class="col-sm-4">
												<div class="widget-body">
													<div class="widget-main">
														<input name='quantity' value="{{$product->quantity}}" type="text" />
														<div class="space-6"></div>
													</div>
												</div>
										</div>
									</div>


									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
								</form>
								<br>
								<br>
								<br>
						</div>
@endsection
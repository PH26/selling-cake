@extends('admin.layout.index')
@section('content')
<div class="page-header">
<h1><a href="admin/product/index"><i class="ace-icon fa fa-arrow-circle-left"></i></a>&nbsp;Show Product
	<small>
		<i class="ace-icon fa fa-angle-double-right"></i>
		{{$product->name}}
	</small>
</h1>
</div>
<!-- /.page-header -->

<div class="row">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="admin/product/edit/{{$product->id}}" method='POST' enctype='multipart/form-data'>
			{{ csrf_field() }}
			<div class="form-group">
				<!-- <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" name='name'  class="col-xs-10 col-sm-5" value="{{$product->name }}" />
					@if ($errors->has('name'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div> -->
			</div>
			<div class='container' style="position:relative; bottom:180px">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" name='name'  class="col-xs-10 col-sm-5" value="{{$product->name }}" readonly />
					@if ($errors->has('name'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Description</label>

				<div class="col-sm-4" style="width:383px">
					<textarea name='description' id='demo' class="form-control ckeditor" rows="4" value="" readonly>{{$product->description}}</textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category</label>

				<div class="col-sm-9" style="width:385px">
					<input type="text" id="form-field-1" name='category'  class="col-xs-10 col-sm-5" value="{{$product->categories->name}}" readonly  style="width:358px"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>

				<div class="col-sm-4" style="position:relative; left:-11px; top:5px;">
					<div class="col-xs-12">
						<p style="position: relative; left:-5px"><img width='359px' src='upload/products/{{$product->image}}'/></p>
						<!-- <input name='image' type="file" id="id-input-file-2" /> -->
					</div>

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Unit Price</label>

				<div class="col-sm-4">
					<div class="widget-body">
						<div class="widget-main" style="position:relative; left:-11px; top:-10px">
							<input name='unit_price' type="number" step=10000 class="input-sm" value="{{$product->unit_price }}" readonly/>
							<div class="space-6"></div>
							@if ($errors->has('unit_price'))
								<span class="help-block col-sm-9">
									<strong style='color:red' class="col-xs-10 col-sm-12">{{ $errors->first('unit_price') }}</strong>
								</span>
							@endif
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Promote Price</label>

				<div class="col-sm-4">
					<div class="widget-body">
						<div class="widget-main" style="position:relative; left:-11px; top:-10px;">
							<input name='promote_price' type="number" step=10000 class="input-sm" value="{{$product->promote_price}}" readonly/>
							<div class="space-6"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Quantity</label>

				<div class="col-sm-4">
					<div class="widget-body">
						<div class="widget-main" style="position:relative; left:-11px; top:-10px;">
							<input name='quantity' type="number" step=1 value="{{ $product->quantity }}" readonly/>
							<div class="space-6"></div>
							@if ($errors->has('quantity'))
								<span class="help-block col-sm-9">
									<strong style='color:red' class="col-xs-10 col-sm-12">
										{{ $errors->first('quantity') }}
									</strong>
								</span>
							@endif
						</div>
					</div>
				</div>
			</div>


			<!-- <div class="clearfix form-actions" style="margin-left:-100px; margin-right: -100px">
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
			</div> -->
		</div>
		</form>
		<br>
		<br>
		<br>
</div>
@endsection
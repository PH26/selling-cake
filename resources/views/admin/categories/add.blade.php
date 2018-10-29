@extends('admin.layout.index')
@section('content')
<div class="page-header">
	<h1><a href="admin/category/index"><i class="ace-icon fa fa-arrow-circle-left"></i></a>&nbsp;Add Category</h1>
</div>
<!-- /.page-header -->
<div class="row">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="admin/category/add" method='POST'>
			{{ csrf_field() }}
			<div class="form-group">
				<!-- <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name<span style='color:red'> *</span></label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" name='name' placeholder="Category Name" class="col-xs-10 col-sm-5" value="{{ old('name') }}"/>
					@if ($errors->has('name'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div> -->
			</div>

			<div class='container' style="position:relative; bottom:180px">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name<span style='color:red'> *</span></label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" name='name' placeholder="Category Name" class="col-xs-10 col-sm-5" value="{{ old('name') }}"/>
					@if ($errors->has('name'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="clearfix form-actions" style="margin-left:-100px; margin-right: -100px">
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
			</div>
		</form>
		<br>
		<br>
		<br>
</div>
@endsection
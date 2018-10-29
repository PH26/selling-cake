@extends('admin.layout.index')
@section('content')
<div class="page-header">
	<h1><a href="admin/slide/index"><i class="ace-icon fa fa-arrow-circle-left"></i></a>&nbsp;Edit Slide</h1>
</div>
<!-- /.page-header -->
<div class="row">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="admin/slide/edit/{{$slide->id}}" method='POST' enctype='multipart/form-data'>
			{{ csrf_field() }}
			<div class="form-group">
				<!-- <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Link</label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" name='link' value="{{$slide->link}}" placeholder="Name" class="col-xs-10 col-sm-5" />
				</div> -->
			</div>
			<div class='container' style="position:relative; bottom:180px">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Link</label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" name='link' value="{{$slide->link}}" placeholder="Image link" class="col-xs-10 col-sm-5" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>

				<div class="col-sm-4">
					<div class="col-xs-12" style="position:relative; left:-11px;">
						<p><img width='348px' src='upload/slide/{{$slide->image}}'/></p>
						<input multiple="" name='image' type="file" id="id-input-file-3" />
					</div>
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
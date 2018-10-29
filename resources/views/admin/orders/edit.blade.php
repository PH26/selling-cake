@extends('admin.layout.index')
@section('content')
<div class="page-header">
	<h1><a href="admin/order/index"><i class="ace-icon fa fa-arrow-circle-left"></i></a>&nbsp;Change Status
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			{{$orders->users->name}}
		</small>
	</h1>
</div>
<!-- /.page-header -->

<div class="row">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="admin/order/edit/{{$orders->id}}" method='POST'>
			{{ csrf_field() }}
			<div class="form-group">
				<!-- <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status</label>

				<div class="col-sm-9">
					<select name="status" id="">
						@if ($orders->status == 'Waiting')
						<option value="{{$orders->status}}" checked>{{$orders->status}}</option>
						<option value="Approved">Approved</option>
						<option value="Pending">Pending</option>
						<option value="Cancel">Cancel</option>
						@elseif ($orders->status == 'Approved')
						<option value="{{$orders->status}}" checked>{{$orders->status}}</option>
						<option value="Pending">Pending</option>
						<option value="Cancel">Cancel</option>
						<option value="Waiting">Waiting</option>
						@elseif ($orders->status == 'Pending')
						<option value="{{$orders->status}}" checked>{{$orders->status}}</option>
						<option value="Cancel">Cancel</option>
						<option value="Waiting">Waiting</option>
						<option value="Approved">Approved</option>
						@elseif ($orders->status == 'Cancel')
						<option value="{{$orders->status}}" checked>{{$orders->status}}</option>
						<option value="Waiting">Waiting</option>
						<option value="Approved">Approved</option>
						<option value="Pending">Pending</option>
						@endif
					</select>
				</div> -->
			</div>

			<div class='container' style="position:relative; bottom:180px">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status</label>

				<div class="col-sm-9">
					<select name="status" id="">
						@if ($orders->status == 'Waiting')
						<option value="{{$orders->status}}" checked>{{$orders->status}}</option>
						<option value="Approved">Approved</option>
						<option value="Pending">Pending</option>
						<option value="Cancel">Cancel</option>
						@elseif ($orders->status == 'Approved')
						<option value="{{$orders->status}}" checked>{{$orders->status}}</option>
						<option value="Pending">Pending</option>
						<option value="Cancel">Cancel</option>
						<option value="Waiting">Waiting</option>
						@elseif ($orders->status == 'Pending')
						<option value="{{$orders->status}}" checked>{{$orders->status}}</option>
						<option value="Cancel">Cancel</option>
						<option value="Waiting">Waiting</option>
						<option value="Approved">Approved</option>
						@elseif ($orders->status == 'Cancel')
						<option value="{{$orders->status}}" checked>{{$orders->status}}</option>
						<option value="Waiting">Waiting</option>
						<option value="Approved">Approved</option>
						<option value="Pending">Pending</option>
						@endif
					</select>
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
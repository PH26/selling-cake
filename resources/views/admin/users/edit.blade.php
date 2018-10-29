@extends('admin.layout.index')
@section('content')
<div class="page-header">
	<h1>
	<a href="admin/user/index"><i class="ace-icon fa fa-arrow-circle-left"></i></a>&nbsp;Edit User
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			{{$user->name}}
		</small>
	</h1>
</div>
<!-- /.page-header -->
<div class="row">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="admin/user/edit/{{$user->id}}" method='POST'>
			{{ csrf_field() }}
			<div class="form-group">
				<!-- <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" name='name' value="{{$user->name}}" class="col-xs-10 col-sm-5" />
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
					<input type="text" id="form-field-1" name='name' value="{{$user->name}}" class="col-xs-10 col-sm-5" />
						@if ($errors->has('name'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">{{ $errors->first('name') }}</strong>
						</span>
						@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" name='email'  value="{{$user->email}}" class="col-xs-10 col-sm-5" />
					@if ($errors->has('email'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-6">{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Address </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-2" name='address' value="{{$user->address}}" class="col-xs-10 col-sm-5" />
					@if ($errors->has('address'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">{{ $errors->first('address') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Phone </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-2" name='phone' value="{{$user->phone}}"  class="col-xs-10 col-sm-5" />
					@if ($errors->has('phone'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">{{ $errors->first('phone') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right radio-inline" for="form-field-2">Role</label>
							<label class="radio-inline">
								<input name="role" value="0"
								@if($user->role == 0)
									{{'checked'}}
								@endif
								type="radio">Normal
							</label>
							<label class="radio-inline">
								<input name="role" value="1"
								@if($user->role == 1)
										{{'checked'}}
								@endif
								type="radio">Admin
							</label>
						</div>
						</label>
					</div>

			<div class="space-4"></div>
				<input type="hidden" name='active' value="1">

			<div class="clearfix form-actions"  style="position:relative; bottom:200px">
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
		</div>
		<br>
		<br>
		<br>
</div>
@endsection
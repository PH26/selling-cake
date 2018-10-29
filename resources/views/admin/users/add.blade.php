@extends('admin.layout.index')
@section('content')
<div class="page-header">
		<h1><a href="admin/user/index"><i class="ace-icon fa fa-arrow-circle-left"></i></a>&nbsp;Add User</h1>
	</div>
	<div class="row" style='position:relative; bottom:10px'>
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" action="admin/user/add" method='POST'>
				{{ csrf_field() }}
				<div class="form-group">
					<!-- <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name<span style='color:red'> *</span></label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1" name='name' placeholder="Name" class="col-xs-10 col-sm-5"  value="{{ old('name') }}" />
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
						<input type="text" id="form-field-1" name='name' placeholder="Name" class="col-xs-10 col-sm-5"  value="{{ old('name') }}" />
						@if ($errors->has('name'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email<span style='color:red'> *</span></label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1" name='email' placeholder="Email" class="col-xs-10 col-sm-5" value="{{ old('email') }}"/>
						@if ($errors->has('email'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-6">{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="space-4"></div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password<span style='color:red'> *</span></label>

					<div class="col-sm-9">
						<input type="password" id="form-field-2" name='password' placeholder="Password" class="col-xs-10 col-sm-5" />
						@if ($errors->has('password'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-6">{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Confirm password<span style='color:red'> *</span></label>

					<div class="col-sm-9">
						<input type="password" id="form-field-2" name='confirm_password' placeholder="Confirm password" class="col-xs-10 col-sm-5" />
						@if ($errors->has('confirm_password'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-7">
								{{ $errors->first('confirm_password') }}
							</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Address<span style='color:red'> *</span></label>

					<div class="col-sm-9">
						<input type="text" id="form-field-2" name='address'placeholder="Address" class="col-xs-10 col-sm-5" value="{{ old('address') }}" />
						@if ($errors->has('address'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">
								{{ $errors->first('address') }}
							</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Phone<span style='color:red'> *</span></label>

					<div class="col-sm-9">
						<input type="text" id="form-field-2" name='phone'placeholder="Phone" class="col-xs-10 col-sm-5" value="{{ old('phone') }}" />
						@if ($errors->has('phone'))
						<span class="help-block col-sm-9">
							<strong style='color:red' class="col-xs-10 col-sm-5">
								{{ $errors->first('phone') }}
							</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right radio-inline" for="form-field-2">Role</label>
								<label class="radio-inline">
									<input name="role" value="0" checked="" type="radio">Normal
								</label>
								<label class="radio-inline">
									<input name="role" value="1" type="radio">Admin
								</label>
							</div>
							</label>
						</div>

				<div class="space-4"></div>
					<input type="hidden" name='active' value="1">
				
				<div class="clearfix form-actions" style="position:relative; bottom:200px">
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
@extends('admin.layout.index')
@section('content')
<div class="page-header">
							<h1>
								Add User
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
								<form class="form-horizontal" role="form" action="admin/user/add" method='POST'>
									{{ csrf_field() }}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name='name' placeholder="Name" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>

										<div class="col-sm-9">
											<input type="email" id="form-field-1" name='email' placeholder="Email" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password </label>

										<div class="col-sm-9">
											<input type="password" id="form-field-2" name='password' placeholder="Password" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Confirm password </label>

										<div class="col-sm-9">
											<input type="password" id="form-field-2" name='confirm_password' placeholder="Confirm password" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Address </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" name='address'placeholder="Address" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Phone </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" name='phone'placeholder="Phone" class="col-xs-10 col-sm-5" />
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
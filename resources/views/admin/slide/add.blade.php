@extends('admin.layout.index')
@section('content')
<div class="page-header">
							<h1>
								Add Slide
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
								<form class="form-horizontal" role="form" action="admin/slide/add" method='POST' enctype='multipart/form-data'>
									{{ csrf_field() }}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Link</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name='link' placeholder="Link" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>

										<div class="col-sm-4">
											<div class="col-xs-12">
												<input multiple="" name='image' type="file" id="id-input-file-3" />
											</div>
											<label>
												<input type="checkbox" name="file-format" id="id-file-format" class="ace" />
												<span class="lbl"> Allow only images</span>
											</label>
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
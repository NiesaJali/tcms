@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('user.update', $editData->id)}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                           
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>User Role <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="usertype" id="usertype" required="" class="form-control">
										<option value="" selectable="" disabled="">Select User Role</option>
										<option value="Admin" {{ ($editData->usertype == "Admin" ? "selected": "") }}>Admin</option>
										<option value="User" {{ ($editData->usertype == "User" ? "selected": "") }}>User</option>
									</select>
                                </div>
							</div>
                            </div>
                            <!-- End of Col 6 -->
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Username <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" 
                                    value="{{ $editData->name }}" required=""> 
                                </div>
							</div>
                            </div>
                        </div>
                        <!-- End of Row -->
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" 
                                    value="{{ $editData->email }}" required=""> 
                                </div>
							</div>
                            </div>
                            <!-- End of Col 6 -->
                            <div class="col-md-6">
                            
                            </div>
                        </div>
						</div>
						<div class="col-12">
							
						</div>
					  </div>
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	  
	  </div>
  </div>

@endsection
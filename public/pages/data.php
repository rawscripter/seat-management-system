<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">All Informations</h6>
			</div>
            <!-- /.page-title-left -->
            <div class="page-title-right d-none d-sm-inline-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a>
					</li>
                    <li class="breadcrumb-item active">All Informations</li>
				</ol>
			</div>
            <!-- /.page-title-right -->
		</div>
        <!-- /.page-title -->
	</div>
    <!-- /.container-fluid -->
    <!-- =================================== -->
    <!-- Different data widgets ============ -->
    <!-- =================================== -->
    <div class="container-fluid">
        <div class="widget-list">
            <div class="row">
                <div class="col-md-12 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-heading clearfix">
                            <h5>Filter Client Billing Status</h5>
						</div>
                        <!-- /.widget-heading -->
                        <div class="widget-body clearfix">
                            <div id="output"></div>
							
                            <div class="row">
                                <div class="col-3">
									<div class="form-group">
										<label for="">Roll</label>
										<input type="text" class="form-control" id="roll"  />
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="">Reg</label>
										<input type="text" class="form-control" id="reg"  />
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="">Subject</label> 
										<input type="text" class="form-control" id="sub" />  
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="">Dept.</label>
										<select class="m-b-10 form-control" id="dept" data-toggle="select2" >
											<optgroup >
												<option value="">None</option>
												<option value="CMT">Computer</option>
												<option value="TCT">Telecomunication</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="col-12">
									<hr>
									<p class="output text-danger text-center"></p>
								</div>
							</div>
							<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": true}' >
								<thead>
									<tr>
										<th>Sl</th>
										<th>Roll</th>
										<th>Registration</th>
										<th>Subject</th>
										<th>Dept.</th>
										<th>Type</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
						</div>
						<!-- /.widget-body -->
					</div>
					<!-- /.widget-bg -->
				</div>
				<!-- /.widget-holder -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.widget-list -->
	</div>
	<!-- /.container-fluid -->
	
</main>
</div>








<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">Dashboard</h6>
                <p class="page-title-description mr-0 d-none d-md-inline-block">statistics, charts and events</p>
			</div>
            <!-- /.page-title-left -->
            <div class="page-title-right d-none d-sm-inline-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
					</li>
                    <li class="breadcrumb-item active">Home</li>
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
        <div class="widget-list row">
            <!-- /.widget-holder -->
            <div class="widget-holder widget-sm col-lg-3 col-md-6 widget-full-height">
                <div class="widget-bg bg-primary text-inverse">
                    <div class="widget-body">
                        <div class="counter-w-info media">
                            <div class="media-body w-50">
                                <p class="text-muted mr-b-5 fw-600">Total Active Client</p><span class="counter-title d-block"><span class="counter"><?php echo $studentO->total_student(); ?></span></span>
                                <!-- /.counter-title --> <a href="<?php echo SITE_ROOT . 'report.php?report=all_client_info' ?>" class="btn btn-link btn-underlined btn-xs fs-11 btn-yellow text-white">View Clients</a>
							</div>
                            <!-- /.media-body -->
                            <div class="pull-right align-self-center">
                                <div class="mr-t-20"><span data-toggle="sparklines" data-height="40" data-width="100" data-type="bar" data-bar-spacing="3" data-bar-width="3" data-zero-axis="false" data-bar-color="rgba(144,186,236,1)" data-color-map="
									
                                    rgba(255,255,255,1.0);
									
                                    rgba(255,255,255,0.4);
									
                                    rgba(255,255,255,1.0);
									
                                    rgba(255,255,255,0.4);
									
                                    rgba(255,255,255,1.0);
									
                                    rgba(255,255,255,0.4);
									
                                    rgba(255,255,255,1.0);
									
                                    " data-chart-range-min="0"><!-- 4,7,8,5,3,6,8 --></span>
								</div>
							</div>
						</div>
                        <!-- /.counter-w-info -->
					</div>
                    <!-- /.widget-body -->
				</div>
                <!-- /.widget-bg -->
			</div>
            <!-- /.widget-holder -->
            <div class="widget-holder widget-sm col-lg-3 col-md-6 widget-full-height">
                <div class="widget-bg text-inverse" style="background: #43a2ff">
                    <div class="widget-body">
                        <div class="counter-w-info media">
                            <div class="media-body w-50">
                                <p class="text-muted mr-b-5 fw-600">Total Users</p><span class="counter-title d-block"><span class="counter"><?php echo $obj->total_count("users"); ?></span></span>
                                <!-- /.counter-title --> <a href="#" class="btn btn-link btn-underlined btn-xs btn-white fs-11">View History</a>
							</div>
                            <!-- /.media-body -->
                            <div class="pull-right align-self-center">
                                <div class="mr-t-20"><span data-toggle="sparklines" data-height="40" data-width="100" data-type="bar" data-bar-spacing="3" data-bar-width="3" data-zero-axis="false" data-bar-color="rgba(144,186,236,1)" data-color-map="
									
                                    rgba(255,255,255,1.0);
									
                                    rgba(255,255,255,0.4);
									
                                    rgba(255,255,255,1.0);
									
                                    rgba(255,255,255,0.4);
									
                                    rgba(255,255,255,1.0);
									
                                    rgba(255,255,255,0.4);
									
                                    rgba(255,255,255,1.0);
									
                                    " data-chart-range-min="0"><!-- 4,7,8,5,3,6,8 --></span>
								</div>
							</div>
						</div>
                        <!-- /.counter-w-info -->
					</div>
                    <!-- /.widget-body -->
				</div>
                <!-- /.widget-bg -->
			</div>
            <!-- /.widget-holder -->
            <div class="widget-holder widget-sm col-lg-3 col-md-6 widget-full-height">
                <div class="widget-bg mb-0">
                    <div class="widget-body pb-0">
                        <div class="counter-w-info media">
                            <div class="media-body w-50">
                                <p class="text-muted mr-b-5 fw-600">Unpaid Clients</p><span class="counter-title d-block"><span class="counter"></span>
									<!-- /.counter-title -->
									<div style="margin-right: -30px; margin-left: -30px; height: 60px">
										<canvas id="chartsJsDailyVisits"></canvas>
									</div>
								</div>
								<!-- /.media-body -->
							</div>
							<!-- /.counter-w-info -->
						</div>
						<!-- /.widget-body -->
					</div>
					<!-- /.widget-bg -->
				</div>
				<!-- /.widget-holder -->
				<div class="widget-holder widget-sm col-lg-3 col-md-6 widget-full-height">
					<div class="widget-bg">
						<div class="widget-body">
							<div class="counter-w-info media"><i class="list-icon bg-success material-icons md-18">show_chart</i>
								<div class="media-body w-50">
									<p class="text-muted mr-b-5 fw-600">Total Meters</p><span class="counter-title d-block"><span class="counter"></span></span>
									<!-- /.counter-title --> <a href="#" class="btn btn-link btn-xs btn-success fs-11">View History</a>
								</div>
								<!-- /.media-body -->
							</div>
							<!-- /.counter-w-info -->
						</div>
						<!-- /.widget-body -->
					</div>
					<!-- /.widget-bg -->
				</div>
				<!-- /.widget-holder -->
				<!-- /.widget-holder -->
				
				
                <div class="widget-holder widget-full-height col-lg-6">
					<div class="widget-bg">
						<div class="widget-heading">
							<h5 class="widget-title">Import <small>Data</small></h5>
							<!-- /.widget-graph-info -->
						</div>
						<!-- /.widget-heading -->
						<div class="widget-body">
							<form action="core/action/import.php" method="POST" enctype="multipart/form-data">
								<div class="input-group">
									<input type="file" name="file" class="form-control rounded-0" >
									<div class="input-group-append">
										<input type="submit"  class="btn btn-primary rounded-0" type="button" value="Import Data" name="Import">
									</div>
								</div>
							</form>
						</div>
                        <!-- /.widget-bg -->
					</div>
                    <!-- /.widget-holder -->
				</div>
				
				
				<div class="widget-holder widget-full-height col-lg-6">
					<div class="widget-bg">
						<div class="widget-heading">
							<h5 class="widget-title">Recent Activities <small>Updates</small></h5>
							<!-- /.widget-graph-info -->
						</div>
						<!-- /.widget-heading -->
						<div class="widget-body">
							<div class="widget-user-activities-3">
								
								<?php $logs = $userO->userLog(); ?>
								<?php foreach ($logs as $log): ?>
								<div class="single media active"><i class="list-icon material-icons">notifications_none</i>
									<div class="media-body">
										<p>
											<!-- User  -->
											<b><?php
												$user = $userO->find_by_id("users","id",$log->user_id);
												echo ucfirst($user->username);
											?></b>
											<!-- Log -->
										<?php echo $log->log ?></p>
										<!-- time -->
										<small><?php echo $obj->timeAgo($log->created_at) ?></small>
									</div>
								</div>
								<?php endforeach ?>
								<!-- /.widget-user-activities-3 -->
							</div>
                            <!-- /.widget-body -->
						</div>
                        <!-- /.widget-bg -->
					</div>
                    <!-- /.widget-holder -->
				</div>
				
                <!-- /.widget-list -->
			</div>
            <!-- /.container-fluid -->
		</main>
        <!-- /.main-wrappper -->
	</div>
	

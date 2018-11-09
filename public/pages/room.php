<?php $rooms = $roomsO->all('room'); ?>
<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">All Room</h6>
			</div>
            <!-- /.page-title-left -->
            <div class="page-title-right d-none d-sm-inline-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a>
					</li>
                    <li class="breadcrumb-item active">All Room</li>
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
                <div class="col-md-8 offset-md-2 widget-holder">
                    <div class="widget-bg">
						<button class="btn btn-primary btn-sm rounded-0 mt-3 ml-4">Add New</button>
                        <!-- /.widget-heading -->
                        <div class="widget-body clearfix mt-0 pt-0">

							<table class="table table-striped mt-0" data-toggle="datatables" data-plugin-options='{"searching": false}'>
								<thead>
									<tr>
										<th>Sl No</th>
										<th>Room No.</th>
                                        <th>Room Place</th>
										<th>View</th>
									</tr>
								</thead>


								<tbody>
									<?php foreach ($rooms as $room): ?>

									<tr>
										<td><?php echo $room->id; ?></td>
										<td><?php echo $room->room_no; ?></td>
                                        <td><?php echo $room->room_place; ?></td>
										<td><a href="index.php?page=seats&room_no=rmn_cmt130" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
									</tr>
									<?php endforeach ?>


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

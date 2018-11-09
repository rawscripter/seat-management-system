<?php $students = $studentO->all('student'); ?>
<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">All Students</h6>
              </div>
            <!-- /.page-title-left -->
            <div class="page-title-right d-none d-sm-inline-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">All Students</li>
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
                        
                        <button class="btn btn-primary btn-sm rounded-0 mt-3 ml-4">Add New</button>
                        <div class="widget-body clearfix pt-0">
                        <table class="table table-striped pt-0" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Roll</th>
                                    <th>Registration</th>
                                    <th>Dept</th>
                                    <th>Type</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php foreach ($students as $student): ?>

                                <tr>
                                    <td><?php echo $student->id; ?></td>
                                    <td><?php echo $student->roll; ?></td>
                                    <td><?php echo $student->sem; ?></td>
                                    <td><?php echo $student->dept; ?></td>
                                    <td><?php echo $student->stype; ?></td>
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

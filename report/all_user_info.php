<!-- HEADER &  NAVIGATION -->
<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>
<?php require_once('includes/sidebar.php') ?>

<!-- if user role is not admin then redirect to index page -->
<?php $userO->redirect_unauth_users('index.php') ?>

<!-- fetching all users from database -->
<?php $users = $userO->find_all("users"); ?>

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
                            <h5>All Users Information</h5>
                        </div>
                        <!-- /.widget-heading -->
                        <div class="widget-body clearfix">

                            <div class="row">
                                <div class="col-6">
                                 <div class="input-group mb-3">
                                    <button id="search_info" class="btn " type="button" style="background-color: #fff; border-bottom: 1px solid #ccc;"><i class="fa fa-search " style="font-size:20px"></i></button>
                                    <input id="search_text" type="text" style=" border: none; border-bottom: 1px solid #ccc; " class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php foreach ($users as $user): ?>

                                <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->role; ?></td>
                                    <td>

                                        <a href="<?php echo SITE_ROOT . "edit.php?query=user&id=" . $user->id?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                       <a href="<?php echo SITE_ROOT . "delete.php?query=delete&action=user&id=" . $meter->meter_id?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                    </td>
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
<?php require_once('includes/footer.php') ?>
<script src="vendor/datatables/1.10.18/js/jquery.dataTables.min.js"></script>

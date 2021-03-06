<!-- HEADER &  NAVIGATION -->
<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>
<?php require_once('includes/sidebar.php') ?>

<!-- Get All Clients info from Database -->
<?php $clients = $clientO->find_all_deleted("clients"); ?>

<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">Trash</h6>
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
                            <h5>All Deleted Clients Information</h5>
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
                                    <th>Client ID</th>
                                    <th>Meter No</th>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>Deleted At</th>
                                    <th>Unit Price</th>
                                    <th>Undo / Permanently Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clients as $client): ?>
                                    <tr>
                                        <td><?php echo $client->client_id; ?></td>
                                        <td><?php echo $client->meter_no; ?></td>
                                        <td><?php echo $client->client_name; ?></td>
                                        <td><?php echo $client->start_date; ?></td>
                                        <td><?php echo dateForUser($client->deleted_at); ?></td>
                                        <td><?php echo $client->unit_price; ?></td>
                                        <td>
                                            <!-- edit btn -->
                                            <a href="#" data-id="<?php echo $client->id ?>" class="btn btn-warning" id="undoClient"><i class="fa fa-undo"></i></a>
                                            <!-- delete Btn -->
                                            <button  type="button" data-id="<?php echo $client->id ?>" class="btn btn-danger" id="deleteIt"> <i class="fa fa-trash"></i> </button>
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

<script>
    $(document).ready(function() {
        $(document).on('click', "#undoClient", function(event) {
            event.preventDefault();
            id = $(this).data('id');
            $.ajax({
                url: 'core/ajax/restore.php',
                type: 'POST',
                data: {client_id: id,type:'client',action:'restore'},
                success:function(data){
                    location.reload();
                }
            })
        });
    });



    $(document).ready(function() {
        $(document).on('click', '#deleteIt', function(event) {
            event.preventDefault();
            id = $(this).data('id');
            $("#confirmationDelete").modal('show');
            $("#deleteBtn").attr('data-deleteid',id);
        });
    });

    $(document).ready(function() {
        $(document).on('click', '#deleteBtn', function(event) {
            event.preventDefault();
            $("#confirmationDelete").modal('hide');
            id = $(this).data('deleteid');
            $.ajax({
                url: 'core/ajax/delete.php',
                type: 'POST',
                data: {client_id: id,type:'client',action:'permanent'},
                success:function(data){
                    location.reload();
                }
            })
        });
    });
</script>

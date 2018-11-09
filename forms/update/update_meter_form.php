<!-- HEADER &  NAVIGATION -->
<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>
<?php require_once('includes/sidebar.php') ?>

<!-- if user role is not admin then redirect to index page -->
<?php $userO->redirect_unauth_users('index.php') ?>

<?php  $meter = $obj->find_by_id("meter","meter_id",$_GET['id']); ?>

<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">Meter Infortmation</h6>
            </div>
            <!-- /.page-title-left -->
            <div class="page-title-right d-none d-sm-inline-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="widget-list">
            <div class="row">
                <div class="col-md-12 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <h5 class="box-title mr-b-0">Add New Meter</h5>
                            <br>
                            <div id="output"></div>
                            <br><br>
                            <form class="form-material" id="meterRegForm">
                                <div class="row">
                                    <div class="col-lg-6 offset-md-3">
                                        <div class="form-group">
                                            <input name="meter_no" class="form-control" value="<?php  echo $meter->meter_no ?>" required type="text" id="addUsername">
                                            <label >Meter No</label>
                                        </div>
                                        <input type="text" name="meter_id"  value="<?php  echo $meter->meter_id ?>" hidden>
                                    </div>
                                </div>

                                <div class="col-lg-6 offset-md-3">
                                    <div class="form-actions btn-list">
                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                        <a href="#" onclick="history.back()" class="btn btn-outline-default">Cancel</a>
                                    </div>
                                </div>
                            </form>
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

<script src="vendor/jquery-form-validator/2.3.77/jquery.form-validator.min.js"></script>
<script src="vendor/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script>
    $(document).ready(function() {
        $("#meterRegForm").submit(function(e) {
            /* Act on the event */
            e.preventDefault();
            $.ajax({
                url: 'core/ajax/update_meter.php',
                type: 'POST',
                data: $('form#meterRegForm').serialize(),
                success:function(data){

                    data = $.trim(data);
                    if (data == '1') {
                      $('html, body').animate({scrollTop:0}, 'slow');
                      $("#output").html('<p class="success_msg"> <b>Congratulations</b> Meter Successfully added</p>');
                  }else{
                      $('html, body').animate({scrollTop:0}, 'slow');
                      $("#output").html('<p class="err_msg"> <b>Failed</b> Something wrong. Please try after sometime.</p>');
                  }
              }
          })
        });
    });
</script>

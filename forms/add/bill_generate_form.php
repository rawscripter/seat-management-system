<!-- HEADER &  NAVIGATION -->
<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>
<?php require_once('includes/sidebar.php') ?>


<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">Add Infortmation</h6>
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
                            <h5 class="box-title mr-b-0">Register Client Information</h5>
                            <br>
                            <div id="output"></div>
                            <br><br>
                            <form  id="billGenareteForm" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="m-b-10 form-control" name="meter_no" id="bill_meter_no" data-toggle="select2" required>
                                                <optgroup >
                                                    <option value="">Meter No</option>

                                                    <?php
                                                    $meters = $obj->find_all_info_form_table("meter");

                                                    foreach ($meters as $meter) {
                                                        echo '<option value='.$meter->meter_id.'>'.$meter->meter_no.'</option>';
                                                    }
                                                    ?>

                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="month" required data-toggle="select2">
                                                        <optgroup >
                                                            <option value="">Month</option>
                                                            <?php
                                                            $months = $obj->find_all_info_form_table("month");
                                                            foreach ($months as $month) {
                                                                echo '<option value='.$month->month_id.'>'.$month->month.'</option>';
                                                            }
                                                            ?>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">

                                                <div class="form-group">
                                                    <select class="form-control" name="year" required data-toggle="select2">
                                                        <optgroup >
                                                            <option value="">Year</option>
                                                            <?php
                                                            $i =  date("Y");
                                                            for ($i; $i > "1990"; $i--) {
                                                                echo '<option value="' . $i .'">' . $i .'</option>';
                                                            } ?>

                                                            ?>
                                                        </optgroup>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                         <label >Current Peak</label>
                                         <input name="current_peak" class="form-control" required type="number"  min="0">
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Present  Peak Date</label>
                                        <input name="present_peak_date" required type="date" class="form-control mb-0" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                             <div class="col-lg-6">
                                <div class="form-group">
                                 <label >Last month's peak</label>
                                 <input name="last_month_peak" id="last_month_peak" class="form-control" required type="number"  min="0" readonly="">
                             </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label >Previous peak date</label>
                                <input name="previous_peak_date" id="previous_peak_date" type="date" class="form-control mb-0" maxlength="10" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label >Last Payment date</label>
                                <input name="last_payment_date" required  class="form-control mb-0" type="date" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions btn-list">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        <a href="#" onclick="history.back()" class="btn btn-outline-default">Cancel</a>
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

<script src="<?php echo SITE_ROOT ?>vendor/jquery-form-validator/2.3.77/jquery.form-validator.min.js"></script>
<script src="<?php echo SITE_ROOT ?>vendor/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>



<script>
    $('select#bill_meter_no').on('change', function() {
     var meter =  this.value ;

     if (meter != '') {
        $.ajax({
            url: 'core/ajax/meter_info.php',
            type: 'POST',
            data: {meter: meter},
            success:function(data){
             data = jQuery.parseJSON( data );
             $("#last_month_peak").val(data['previous_peak']);
             $("#previous_peak_date").val(data['previous_peak_date']);
         }
     })
    }
})
    $(document).ready(function() {
     $("#billGenareteForm").submit(function(e) {
        /* Act on the event */
        e.preventDefault();
        $.ajax({
            url: 'core/ajax/bill_genarate.php',
            type: 'POST',
            data: $('form#billGenareteForm').serialize(),
            success:function(data){

                data = $.trim(data);
                if (data > 0) {
                  $('html, body').animate({scrollTop:0}, 'slow');
                  $("#output").html('<p class="success_msg"> <b>Congratulations</b> Meter Successfully added. <a href="print_bill.php?action=print&id='+data+'" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i>  Print Bill</a></p>');
                  $("#billGenareteForm")[0].reset();
              }else{
                  $('html, body').animate({scrollTop:0}, 'slow');
                  $("#output").html('<p class="err_msg"> <b>Failed</b> Something wrong. Please try after sometime.</p>');
              }
          }
      })
    });
 });
</script>




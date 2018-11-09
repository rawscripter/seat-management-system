<!-- HEADER &  NAVIGATION -->
<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>
<?php require_once('includes/sidebar.php') ?>

<!-- Get All Clients info from Database -->
<?php $bills = $billO->all_bill(); ?>

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
                                    <label for="">Month</label>
                                    <select class="form-control" id="bill_month"  data-toggle="select2">
                                        <optgroup >
                                            <option value="">None</option>
                                            <?php
                                            $months = $obj->find_all_info_form_table("month");
                                            foreach ($months as $month) {
                                                echo '<option value='.$month->month.'>'.$month->month.'</option>';
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Year</label>
                                    <select class="form-control" id="bill_year"  data-toggle="select2">
                                        <optgroup >
                                            <option value="">None</option>
                                            <?php
                                            $i =  date("Y");
                                            for ($i; $i > "1990"; $i--) {
                                                echo '<option value="' . $i .'">' . $i .'</option>';
                                            } ?>

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Meter No</label>
                                    <select class="m-b-10 form-control" id="bill_meter_no" data-toggle="select2" >
                                        <optgroup >
                                            <option value="">None</option>
                                            <?php
                                            $meters = $obj->find_all_info_form_table("meter");
                                            foreach ($meters as $meter) {
                                                echo '<option value='.$meter->meter_no.'>'.$meter->meter_no.'</option>';
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Paid Status</label>
                                    <select class="m-b-10 form-control" id="bill_paid_status" data-toggle="select2" >
                                        <optgroup >
                                            <option value="">None</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Not Paid">Not Paid</option>
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
                                    <th>Client Id</th>
                                    <th>Meter No</th>
                                    <th>Client Name</th>
                                    <th>Billing Month</th>
                                    <th>Bill Amount</th>
                                    <th>Last Payment Date</th>
                                    <th>Bill Status</th>
                                    <th>Payment Date</th>
                                    <th>Bill Payment</th>
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

<?php require_once('includes/footer.php') ?>
<script src="vendor/datatables/1.10.18/js/jquery.dataTables.min.js"></script>

<!-- DELETE  Modal -->
<div class="modal fade" id="confirmationPaid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form action="" method="POST" id="bill_payment">
        <div class="form-group">
            <label for="">Paid Date</label>
            <input type="date" class="form-control" id="paid_date" name="paid_date">
            <input type="text" id="bill_id" name="bill_id" hidden>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    <button type="button" id="confirmPaid"  class="btn btn-success">Confirm</button>
</div>
</div>
</div>
</div>

<script>
  $(document).ready(function() {
    $(document).on('click', '#payNow', function(event) {
        event.preventDefault();
        id = $(this).data('id');
        $("#confirmationPaid").modal('show');
        $("#bill_id").attr('value',id);
    });
});

  $(document).ready(function() {
    $(document).on('click', '#confirmPaid', function(event) {
        event.preventDefault();
        var id = $("#bill_id").val();
        var paid_date = $("#paid_date").val();
        $("#confirmationPaid").modal('hide');
        $.ajax({
            url: 'core/ajax/bill_payment.php',
            type: 'POST',
            data: $('form#bill_payment').serialize(),
            success:function(data){
                data = $.trim(data);
                if (data == '1') {
                    $('html, body').animate({scrollTop:0}, 'slow');
                    $("#output").html('<p class="success_msg"> <b>Congratulations</b>Bill Payment Successfull</p>');
                    $("#bill_payment")[0].reset();
                    $('.paid_btn-'+id).html(' <a href="#" class="btn btn-success">Paid</a>');
                    $('.paid_status-'+id).html('<span class="text-success">Paid</span>');
                    $('.paid_date-'+id).html(paid_date);
                }else{
                    $('html, body').animate({scrollTop:0}, 'slow');
                    $("#output").html('<p class="err_msg"> <b>Failed</b> Something wrong. Please try after sometime.</p>');
                }
            }
        })
    });
});

</script>



<!-- bill print -->
<div class="modal fade" id="confirmBillPrint" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <p>Are you sure you want to Print the Bill?</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    <a id="confirmPrint"  class="btn btn-success" style="color: #fff">Print</a>
</div>
</div>
</div>
</div>

<!-- end Modal -->

<script>

// Print Bill

$(document).ready(function() {
    $(document).on('click', '#billPrint', function(event) {
        event.preventDefault();
        id = $(this).data('id');
        $("#confirmBillPrint").modal('show');
        $("#confirmPrint").attr('href','print_bill.php?action=print&id='+id);
    });
});
</script>


<script>
    $(document).ready(function() {
        $('select').on('change', function() {
            // var meter =  this.value ;
            var paid_status = $("#bill_paid_status").val();
            var month = $("#bill_month").val();
            var year = $("#bill_year").val();
            var meter_no = $("#bill_meter_no").val();

$.post('core/ajax/search.php', {paid_status: paid_status,month:month,year:year,meter_no:meter_no}, function(data) {
    $('tbody').html(data);
    if ($.trim(data) != '0') {
         $(".output").html('');
        $("table").css('display','block');
    }else{
        $(".output").html('No Data Found');
        $("table").hide('display','none');
    }
});





        })
    });
</script>

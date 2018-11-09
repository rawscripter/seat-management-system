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
                            <h5>All Clients Information</h5>
                        </div>
                        <!-- /.widget-heading -->
                        <div class="widget-body clearfix">
                            <div id="output"></div>

<!--                             <div class="row">
                                <div class="col-6">
                                 <div class="input-group mb-3">
                                    <button id="search_info" class="btn " type="button" style="background-color: #fff; border-bottom: 1px solid #ccc;"><i class="fa fa-search " style="font-size:20px"></i></button>
                                    <input id="search_text" type="text" style=" border: none; border-bottom: 1px solid #ccc; " class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                            <thead>
                                <tr>
                                    <th>Client ID</th>
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
                                <?php foreach ($bills as $bill): ?>
                                    <tr>
                                        <td><?php echo  $bill->client_id ?></td>
                                        <td><?php echo $bill->meter_no ?>
                                    </td>
                                    <td><?php echo  $bill->client_name ?></td>
                                    <td><?php echo $bill->month .', ' .$bill->year; ?></td>
                                    <td><?php echo $bill->net_pay_able_am; ?></td>
                                    <td><?php echo dateForUser($bill->last_pay_date); ?></td>
                                    <td class="paid_status-<?php echo $bill->billing_id ?>">
                                        <?php if ($bill->status == 'Not Paid'): ?>
                                            <span class="text-danger">Not Paid</span>
                                        <?php endif ?>
                                        <?php if ($bill->status == 'Paid'): ?>
                                            <span class="text-success">Paid</span>
                                        <?php endif ?>
                                    </td>
                                    <td class="paid_date-<?php echo $bill->billing_id ?>">
                                        <?php
                                        if ($bill->status == 'Not Paid') {
                                            echo '-';
                                        }else{
                                            echo dateForUser($bill->paid_date);
                                        }
                                        ?>
                                    </td>
                                    <td class="paid_btn-<?php echo $bill->billing_id ?>">
                                        <?php if ($bill->status == 'Not Paid'): ?>
                                            <a href="#" id="payNow"  class="btn btn-primary" data-id="<?php echo  $bill->billing_id ?>">Pay</a>
                                            <a href="#" id="billPrint"  class="btn btn-secondary" data-id="<?php echo  $bill->billing_id ?>">Print</a>
                                        <?php endif ?>

                                        <?php if ($bill->status == 'Paid'): ?>
                                            <a href="#" class="btn btn-success">Already Paid</a>
                                        <?php endif ?>

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
    <a id="confirmPrint"  class="btn btn-success" target="_blank" style="color: #fff">Print</a>
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

<!-- HEADER &  NAVIGATION -->
<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>
<?php require_once('includes/sidebar.php') ?>

<?php  $client = $clientO->find_by_id("clients","id",$_GET['id']); ?>

<main class="main-wrapper clearfix" id="myDiv">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">Update Infortmation</h6>
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
                            <h5 class="box-title mr-b-0">Update Client Information</h5>
                            <br>
                            <div id="output"></div>
                            <br><br>
                            <form id="clientUpdateForm">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Meter No</label>
                                            <select class="form-control" name="meter_no" id="meter_no" required data-toggle="select2">
                                                <optgroup >
                                                    <option value="<?php echo $client->meter_id; ?>"><?php echo meter_no($client->meter_id) ?></option>
                                                    <?php
                                                    $meters = $obj->find_all_info_form_table("meter");
                                                    foreach ($meters as $meter) {
                                                        echo '<option value='.$meter->meter_id.'>'.$meter->meter_no.'</option>';
                                                    }
                                                    ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <input type="text" name="client_id" value="<?php echo $client->id ?>" hidden>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Client Name</label>
                                            <input name="client_name" class="form-control" type="text" value="<?php echo $client->client_name ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Contact No</label>
                                            <input name="phone" class="form-control" type="text" value="<?php echo $client->phone ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                         <label >Address</label>
                                         <input name="address" class="form-control" type="text" value="<?php echo $client->address ?>" required>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Starting Meter Reading</label>
                                        <input name="start_meter_reading" class="form-control" value="<?php echo $client->start_meter_reading ?>" required type="text"  min="0">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Demand Charge</label>
                                        <input name="demand_charge" class="form-control" required value="<?php echo $client->demand_charge ?>" type="text"  min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Servicing charge</label>
                                        <input name="service_charge" class="form-control" required value="<?php echo $client->service_charge ?>" type="text"  min="0">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Issue Date / Date of Starting</label>
                                        <input name="start_date" type="date" class="form-control mb-0" value="<?php echo $client->start_date ?>"  maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >P.F</label>
                                        <input name="pf" class="form-control" value="<?php echo $client->pf ?>" required type="text"  min="0">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Unit Price</label>
                                        <input name="unit_price" class="form-control" value="<?php echo $client->unit_price ?>" type="text"  min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Vat (%)</label>
                                        <input name="vat" class="form-control" value="<?php echo $client->vat ?>" required type="text"  min="0">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Active Status</label>
                                        <select name="status" id="" class="form-control">
                                            <?php if ($client->client_status == 'active') {
                                             echo '<option value="active">Active</option>';
                                             echo '<option value="Not Active">Not Active</option>';
                                         }else{
                                          echo '<option value="Not Active">Not Active</option>';
                                          echo '<option value="active">Active</option>';
                                      };
                                      ?>
                                  </select>
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
<script src="vendor/jquery-form-validator/2.3.77/jquery.form-validator.min.js"></script>
<script src="vendor/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<!-- HEADER &  NAVIGATION -->
<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>
<?php require_once('includes/sidebar.php') ?>

<!-- if user role is not admin then redirect to index page -->
<?php $userO->redirect_unauth_users('index.php') ?>

<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">User Infortmation</h6>
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
                            <h5 class="box-title mr-b-0">Add New User</h5>
                            <br>
                            <div id="output"></div>
                            <br><br>
                            <form class="form-material" id="userRegForm">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input name="username" class="form-control" required type="text" id="addUsername">
                                            <label >Username</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input name="email" id="addUserEmail" class="form-control" type="email" id="email">
                                            <label >Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input name="password" class="form-control" type="password" required>
                                            <label >Password</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                         <select name="role" id="" class="form-control" required>
                                             <option value="">Select</option>
                                             <option value="admin">Admin</option>
                                             <option value="moderator">moderator</option>
                                             <option value="user">User</option>
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

<script>
        $(document).ready(function() {
        $("#addUsername").blur(function(event) {
            /* Act on the event */
            var username = $("#addUsername").val();
            if (username != '') {
                $.ajax({
                    url: 'core/ajax/user_exists.php',
                    type: 'POST',
                    data: {username: username},
                    success:function(data){

                        data = $.trim(data);
                        if (data == '1') {
                            $("#output").html('<p class="err_msg"> <b>Warning!</b> User Already Exists.</p>').fadeIn('slow');;
                        }else{
                            $("#output").html('');
                        }
                    }
                })
            }

        });
    });


         $(document).ready(function() {
        $("#addUserEmail").blur(function(event) {
            /* Act on the event */
            var addUserEmail = $("#addUserEmail").val();
            if (addUserEmail != '') {
                $.ajax({
                    url: 'core/ajax/user_exists.php',
                    type: 'POST',
                    data: {email: addUserEmail},
                    success:function(data){

                        data = $.trim(data);
                        if (data == '1') {
                            $("#output").html('<p class="err_msg"> <b>Warning!</b> Email Already Exists.</p>').fadeIn('slow');;
                        }else{
                            $("#output").html('');
                        }
                    }
                })
            }

        });
    });


    $(document).ready(function() {
        $("#userRegForm").submit(function(e) {
            /* Act on the event */
            e.preventDefault();
            $.ajax({
                url: 'core/ajax/reg_user.php',
                type: 'POST',
                data: $('form#userRegForm').serialize(),
                success:function(data){

                    data = $.trim(data);
                    if (data == '1') {
                          $('html, body').animate({scrollTop:0}, 'slow');
                        $("#output").html('<p class="success_msg"> <b>Congratulations</b> User Registration Succssful</p>');
                        $("#userRegForm")[0].reset();
                    }else{
                          $('html, body').animate({scrollTop:0}, 'slow');
                        $("#output").html('<p class="err_msg"> <b>Failed</b> Something wrong. Please try after sometime.</p>');
                    }
                }
            })
        });
    });
</script>

<?php require_once('../init.php');

if (isset($_POST['client'])) {


    $client = $obj->escape($_POST['client']);
    $clients = $clientO->searchClient($client);
?>


<?php foreach ($clients as $client): ?>


    <div class="user-list-single">
        <div class="row">
            <div class="media align-items-center col-8">
                <figure class="thumb-xs2 mr-3 mr-0-rtl ml-3-rtl user--online">
                    <img src="assets/demo/users/user1.jpg" class="rounded-circle" alt="User 1">
                </figure>
                <div class="media-body overflow-hidden">
                    <p class="user-name mb-0 heading-font-family fw-400"><?php echo $client->client_name ?></p>
                </div>
                <!-- /.media-body -->
                <a href="#" class="pos-absolute pos-0 zi-1" id="show_client_msg_option" data-id="<?php echo $client->id ?>"></a>
            </div>
            <!-- /.col-8 -->
            <div class="col-4">
                <div class="d-flex flex-column">
                    <div class="text-right text-left-rtl"><span class="badge bg-success-contrast color-success">3</span>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-link btn-link dropdown-toggle p-0 color-content-color d-inline-block" data-toggle="dropdown"><i class="feather feather-more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Delete</a>
                            </div>
                            <!-- /.dropdown-menu -->
                        </div>
                        <!-- /.dropdown -->
                    </div>
                </div>
                <!-- /.d-flex -->
            </div>
            <!-- /.col-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.user-list-single -->

<?php endforeach ?>


<?php
}
?>

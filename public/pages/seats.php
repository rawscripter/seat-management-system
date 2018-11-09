<?php require_once('app/init.php') ?>
<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>
<?php require_once('includes/sidebar.php') ?>


<?php if (isset($_GET['room_no'])): ?>
<main class="main-wrapper clearfix">
    <div class="container-fluid">
        <br>
        <h5 class="text-center">Room No : CMT-103</h5>
        <br>

        <?php $seats = $obj->all($_GET['room_no']); ?>


        <div class="row">
            <?php foreach ($seats as $seat): ?>

            <div class="col-2 offset-1">
                <div class="seat"><?php echo $seat->first_row ?></div>
            </div>
            <div class="col-2">
                 <div class="seat"><?php echo $seat->second_row ?></div>
            </div>
            <div class="col-2">
                <div class="seat"><?php echo $seat->third_row ?></div>
            </div>
            <div class="col-2">
                 <div class="seat"><?php echo $seat->fourth_row ?></div>
            </div>
            <div class="col-2">
                 <div class="seat"><?php echo $seat->five_row ?></div>
            </div>

            <?php endforeach ?>
        </div>
    </div>



    <div class="row">
        <div class="col-11 text-right">
            <button class="btn btn-info" onclick="window.print();">Print</button>
        </div>
    </div>

</main>

<?php endif ?>
</div>

<?php require_once('includes/footer.php') ?>

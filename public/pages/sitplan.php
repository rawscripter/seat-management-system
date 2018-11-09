<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="container-fluid">
        <div class="row page-title clearfix">
            <div class="page-title-left">
                <h6 class="page-title-heading mr-0 mr-r-5">Making Seat Plan</h6>
            </div>
            <!-- /.page-title-left -->
            <div class="page-title-right d-none d-sm-inline-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Making Seat Plan</li>
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
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm rounded-0 mt-3 ml-4"><i class="fa fa-plus"></i> &nbsp;New Seat Plan</button>
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

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Make New Seat Plan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">



        <form id="seat_plan_form" action="x.php" method="POST">
            <!-- room select -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text btn-primary rounded-0">Select Room &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            <select required name="room_no" id="roomSelect" class="form-control">

                <option value="">Select Room</option>
                <?php  $rooms = $roomsO->all('room');  ?>
                <?php foreach ($rooms  as $room): ?>
                   <option value="<?php  echo $room->id ?>"><?php  echo $room->room_no ?></option>
               <?php endforeach ?>
           </select>
           <div class="input-group-append">
            <button type="button" class="btn btn-default rounded-0" id="total_room_capacity" name="total_room_capacity" > Total Seat </button>
        </div>
    </div>
    <!-- end room select -->

    <!-- first Deprtment select -->

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text btn-primary rounded-0">Select First Dept </span>
        </div>
        <select required name="selectedDeprtment_1" id="selectedDeprtment" class="form-control">
            <option value="">Select Dept.</option>
            <?php  $depts = $obj->all('dept');  ?>

            <?php foreach ($depts  as $dept): ?>
               <option value="<?php  echo $dept->dept_name ?>"><?php  echo $dept->dept_name ?></option>
           <?php endforeach ?>
       </select>

       <div class="input-group-append">
        <select required name="rollFrom_1" id="rollFrom" class="form-control rounded-0">
            <option value="">Roll From</option>
        </select>
    </div>

    <div class="input-group-append ">
        <select required name="rollTo_1" id="rollTo" class="form-control rounded-0">
            <option value="">Roll To</option>
        </select>
    </div>

    <div class="input-group-append ">
        <button type='button' id="total_selected_studend" name="total_selected_studend_1" class="btn btn-default rounded-0"> Total </button>
    </div>

</div>
<!-- end first Deprtment select -->

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- Second Deprtment select -->

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text btn-primary rounded-0">Select First Dept </span>
    </div>
    <select required name="selectedDeprtment_2" id="selectedDeprtment_2" class="form-control">
        <option value="">Select Dept.</option>
        <?php  $depts = $obj->all('dept');  ?>

        <?php foreach ($depts  as $dept): ?>
           <option value="<?php  echo $dept->dept_name ?>"><?php  echo $dept->dept_name ?></option>
       <?php endforeach ?>
   </select>

   <div class="input-group-append">
    <select required name="rollFrom_2" id="rollFrom_2" class="form-control rounded-0">
        <option value="">Roll From</option>
    </select>
</div>

<div class="input-group-append ">
    <select required name="rollTo_2" id="rollTo_2" class="form-control rounded-0">
        <option value="">Roll To</option>
    </select>
</div>

<div class="input-group-append ">
    <button id="total_selected_studend_2" class="btn btn-default rounded-0" type="button">Total</button>
</div>

</div>
<!-- end Second Deprtment select -->



</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary btn-sm rounded-0" data-dismiss="modal">Close</button>
    <button id="submit_seat_form" type="submit" class="btn btn-primary btn-sm rounded-0">Save changes</button>

</form>
</div>
</div>
</div>
</div>
</main>



<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>



<script>


    $(document).ready(function() {

        $('select#roomSelect').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;

            $.post('app/ajax/ajaxRoomCapacity.php', {room_id: valueSelected}, function(data) {
                $("#total_room_capacity").text(data);
            });

        });

    });

    $(document).ready(function() {

        $('select#selectedDeprtment').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;

            $.post('app/ajax/ajaxRollList.php', {dept_name: valueSelected}, function(data) {
                $("#rollFrom").html(data);
                $("#rollTo").html(data);
            });

        });

    });



    $(document).ready(function() {


        function total_seleted_student(){
            var roll_from = $("#rollFrom").val();
            var rollTo = $("#rollTo").val();
            var selectedDeprtment = $("#selectedDeprtment").val();
            var total_room_capacity = $.trim($("#total_room_capacity").text());


            if (rollTo != '') {
                if (roll_from != '') {
                    $.post('app/ajax/ajaxTotalSelectedStudent.php', {start_roll: roll_from,end_roll:rollTo,dept:selectedDeprtment}, function(data) {
                        /*optional stuff to do after success */

                        $("#total_selected_studend").text(data);
                    });

                }else{
                    $("#total_selected_studend").text('Total');
                }
            }else{
                $("#total_selected_studend").text('Total');
            }
        }

        $('select#rollTo').on('change', function (e) {
         total_seleted_student();
     });

        $('select#rollFrom').on('change', function (e) {
         total_seleted_student();
     });

    });



// for second department secet
//
//
//
//
//
//
//
$(document).ready(function() {

    $('select#selectedDeprtment_2').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;

        $.post('app/ajax/ajaxRollList.php', {dept_name: valueSelected}, function(data) {
            $("#rollFrom_2").html(data);
            $("#rollTo_2").html(data);
        });

    });

});



$(document).ready(function() {


    function total_seleted_student(){
        var roll_from = $("#rollFrom_2").val();
        var rollTo = $("#rollTo_2").val();
        var selectedDeprtment = $("#selectedDeprtment_2").val();
        var total_room_capacity = $.trim($("#total_room_capacity_2").text());


        if (rollTo != '') {
            if (roll_from != '') {
                $.post('app/ajax/ajaxTotalSelectedStudent.php', {start_roll: roll_from,end_roll:rollTo,dept:selectedDeprtment}, function(data) {
                    /*optional stuff to do after success */
                    $("#total_selected_studend_2").text(data);
                });

            }else{
                $("#total_selected_studend_2").text('Total');
            }
        }else{
            $("#total_selected_studend_2").text('Total');
        }
    }

    $('select#rollTo_2').on('change', function (e) {
     total_seleted_student();
 });

    $('select#rollFrom_2').on('change', function (e) {
     total_seleted_student();
 });

});





// $(document).ready(function() {
//     $("#submit_seat_form").click(function(event) {
//         /* Act on the event */


//         /* Act on the event */

//         var roll_from = $("#rollFrom").val();
//         var rollTo = $("#rollTo").val();
//         var selectedDeprtment = $("#selectedDeprtment").val();
//         var total_room_capacity = $.trim($("#total_room_capacity").text());


//         var roll_from_2 = $("#rollFrom_2").val();
//         var rollTo_2 = $("#rollTo_2").val();
//         var selectedDeprtment_2 = $("#selectedDeprtment_2").val();
//         var total_room_capacity_2 = $.trim($("#total_room_capacity_2").text());

//         if (roll_from != '') {
//             if (rollTo != '') {
//                 if (selectedDeprtment != '') {
//                     if (total_room_capacity != '') {
//                        if (roll_from_2 != '') {
//                         if (rollTo_2 != '') {
//                             if (selectedDeprtment_2 != '') {
//                                 if (total_room_capacity_2 != '') {
//                                     $("#seat_plan_form").submit();
//                                     console.log('ok');
//                                 }
//                             }
//                         }
//                     }
//                 }
//             }
//         }
//     }
// });
// });

</script>

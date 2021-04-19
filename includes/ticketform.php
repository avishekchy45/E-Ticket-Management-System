<?php
if (isset($_POST['go'])) {
    $bus = $_GET['bus'];
    echo "
    <style>
    #list{
        display:none;
    }
    </style>
    <form action='../printticket.php' target='_self' enctype='multipart/form-data' method='POST'>
    <h3 class='text-info'>BOOK TICKET</h3><br>
    <div class='form-group row'>
    <label for='name' class='col-sm-2 col-form-label'>NAME</label>
    <div class='col-sm-10'>
      <input type='text' class='form-control' id='name'>
    </div>
    </div>
    <div class='form-group row'>
    <label for='phone' class='col-sm-2 col-form-label'>Phone Number</label>
    <div class='col-sm-10'>
      <input type='tel' class='form-control' id='phone'>
    </div>
    </div>
    <div class='form-group row'>
    <label for='' class='col-sm-2 col-form-label'>SELECT SEAT</label>
    </div>
    ";
    $query = "select * from seat where BUS_ID = '$bus'";
    $r = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($r);
    $A = $row['A'];
    $B = $row['B'];
    $C = $row['C'];
    $D = $row['D'];
    for ($i = 1; $i <= $A; $i++) {
        echo "
        <div class='col-sm-10'>
            <div class='form-check form-check-inline'>
            <input class='form-check-input' type='checkbox' value='A$i' id='defaultCheck1'>
            <label class='form-check-label' for='defaultCheck1'> A$i </label>
            </div>
        </div>
        ";
    }
    echo "
    <br><button type='submit' class='btn btn-outline-info' value='CONFIRM' name='confirm'>CONFIRM TICKET</button>
    <a href='index.php' class='btn btn-outline-primary'>SEARCH AGAIN</a><br>
    </form>
    ";
}

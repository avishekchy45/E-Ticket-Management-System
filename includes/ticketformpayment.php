<br>
<h2 class='text-danger'>TICKET BOOKING WITH ONLINE PAYMENT WILL BE AVAILABLE SOON</h2>
<br>
<?php
if (isset($_POST['go'])) {
  $schedule_id = $_GET['schedule'];
  $bus_id = $_GET['bus'];
  echo "
  <style>
  #searchform,list{
      display:none;
  }
  </style>
  <form target='_self' enctype='multipart/form-data' method='POST' class='font-weight-bolder'>
  <h1 class='text-info'>BOOK TICKET</h1><br>
  <div class='form-group row text-justify'>
    <label for='name' class='col-sm-2 col-form-label'>Passenger Name</label>
    <div class='col-sm-10'>
    <input type='text' class='form-control' id='name' name='name' required>
    </div>
  </div>
  <div class='form-group row text-justify'>
    <label for='phone' class='col-sm-2 col-form-label'>Phone Number</label>
    <div class='col-sm-10'>
    <input type='tel' class='form-control' id='phone' name='phone' required>
    </div>
  </div>
  <div class='form-group row text-justify'>
    <label for='' class='col-sm-2 col-form-label'>SELECT SEAT</label>
  </div>
  ";
  $query = "SELECT * FROM busseatlist,buslist,busschedule WHERE buslist.BUS_ID = '$bus_id' AND buslist.SEAT_TYPE=busseatlist.SEAT_TYPE AND buslist.BUS_ID=busschedule.BUS_ID";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  $seat = explode(",", $row['SEAT']);
  $seat_row = $row['SEAT_ROW'];
  $class = $row['CLASS'];
  $coach = $row['COACH_NO'];
  $price = $row['PRICE'];
  $n = 0;
  while ($n < count($seat)) {
    $booked = "1";
    $query2 = "SELECT bookedseat.SEAT FROM ticket,bookedseat WHERE ticket.SCHEDULE_ID = '$schedule_id' AND ticket.TICKET_ID = bookedseat.TICKET_ID";
    $result2 = mysqli_query($con, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {
      $bookedseat = $row2['SEAT'];
      if ($seat[$n] == $bookedseat) {
        $booked = "disabled";
        break;
      }
    }
    $seatnumber = $seat[$n++];
    if ($booked == "disabled") {
      $seatcolor = "booked";
    } else {
      $seatcolor = "available";
    }
    echo "
      <div class='form-check form-check-inline text-center'>
      <input class='form-check-input busseat' type='checkbox' value='$seatnumber' id='seatno' name='choosedseat[]' onclick='changeprice(this);' $booked>
      <label class='form-check-label font-weight-bolder font-italic badge badge-dark $seatcolor' for='seatno' id='seatlabel'> <span>$seatnumber</span> </label>
      </div>
    ";
    if (($n % $seat_row) == 0) {
      echo "
      <br><br>
      ";
    }
  }
  echo "
    <br>
    <div class='form-group row text-justify'>
      <label for='totalprice' class='col-sm-2 col-form-label'>Total Price</label>
      <div class='col-sm-10'>
      <span id='totalprice'> You Must Select at Least One Seat </span>
      </div>
    </div> 
    <div class='form-group row text-justify'>
      <label for='class' class='col-sm-2 col-form-label'>Class</label>
      <div class='col-sm-10'>
      <input type='text' class='form-control' id='class' name='class' value='$class' readonly>
      </div>
    </div>
    <div class='form-group row text-justify'>
      <label for='coach' class='col-sm-2 col-form-label'>Coach No</label>
      <div class='col-sm-10'>
      <input type='text' class='form-control' id='coach' name='coach' value='$coach' readonly>
      </div>
    </div>
    <div class='form-group row text-justify'>
      <label for='price' class='col-sm-2 col-form-label'>Price(Per Ticket)</label>
      <div class='col-sm-10'>
      <input type='text' class='form-control' id='price' name='price' value='$price' readonly>
      </div>
    </div>
    <br>
    <br><button type='submit' class='btn btn-outline-info' value='CONFIRM' name='confirm' id='confirm'>CONFIRM TICKET</button>
    <a href='index.php' class='btn btn-outline-primary'>SEARCH AGAIN</a><br>
    </form>
    <br>
  ";
}
if (isset($_POST['confirm'])) {
  if (!isset($_SESSION['user'])) {
    echo ("<script>location.href = 'login.php';</script>");
  } else {
    $counter = "$user_id";
    $schedule_id = $_GET['schedule'];
    $bus_id = $_GET['bus'];
    $class = $_POST['class'];
    $coach = $_POST['coach'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $choosedseat = $_POST['choosedseat'];
    $total_seat = count($choosedseat);
    $price = $_POST['price'] * $total_seat;
    //$ticket_id = md5("$schedule_id" . "-" . "$choosedseat[0]");
    $ticket_id = rand();
    $allseat = implode(', ', $_POST['choosedseat']);

    $query = "INSERT INTO ticket (TICKET_ID,SCHEDULE_ID,SEAT,NAME,CONTACT,BOOKED_BY,PRICE) VALUES ('$ticket_id','$schedule_id','$allseat','$name','$phone','$counter','$price')";
    if (mysqli_query($con, $query)) {
      echo "<script>alert('Successfully Booked Seat ( $allseat )')</script>";
    } else {
      echo "<div class='text-danger'> Booking error! </div>" . mysqli_error($con);
    }

    $n = 0;
    $failed = 0;
    while ($n < $total_seat) {
      $seat = $choosedseat[$n++];
      $query = "INSERT INTO bookedseat (TICKET_ID,SEAT) VALUES ('$ticket_id','$seat')";
      if (!mysqli_query($con, $query)) {
        $failed++;
        echo "<div class='text-danger'> Booking error! </div>" . mysqli_error($con);
      }
    }
    if ($failed == 0)
      echo ("<script>location.href = 'printticket.php?ticket=$ticket_id';</script>");
  }
}
?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#confirm').click(function() {
      checked = $("input[type=checkbox]:checked").length;
      if (!checked) {
        alert("You Must Select at Least One Seat.");
        return false;
      }
    });
  });

  var total = 0;

  function changeprice(item) {
    if (item.checked) {
      total += <?php echo $price ?>;
    } else {
      total -= <?php echo $price ?>;
    }
    document.getElementById('totalprice').innerHTML = total + " /=";
  }
</script>
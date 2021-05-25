<?php
if (isset($_GET['ticket'])) {
  $ticket_id = $_GET['ticket'];
  $query = "SELECT ticket.REG,ticket.SCHEDULE_ID,SEAT,ticket.NAME,ticket.CONTACT,BOOKED_BY,busschedule.BUS_ID,DEPART,DEST,DEPART_TIME,ticket.PRICE,CLASS,COACH_NO,COMPANY FROM ticket,busschedule,buslist,busowner,departlist WHERE TICKET_ID = '$ticket_id' AND ticket.SCHEDULE_ID = busschedule.SCHEDULE_ID AND busschedule.BUS_ID = buslist.BUS_ID AND buslist.OWNER = busowner.OWNER_ID";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  $reg = $row['REG'];
  //$schedule = $row['SCHEDULE_ID'];
  $name = $row['NAME'];
  $contact = $row['CONTACT'];
  $booked = $row['BOOKED_BY'];
  $bus = $row['BUS_ID'];
  $depart = $row['DEPART'];
  $dest = $row['DEST'];
  $time = $row['DEPART_TIME'];
  $price = $row['PRICE'];
  $class = $row['CLASS'];
  $coach = $row['COACH_NO'];
  $company = $row['COMPANY'];
  $seat =  $row['SEAT'];

  echo "
  <style>
  
  </style>      
  <div id='ticketpdf'>    
    <div class='col-sm-12' style='background: linear-gradient(to right, #2193b0, #6dd5ed);border:5px solid;border-image:linear-gradient(45deg,red,blue) 10;'>
      <div class='table-responsive-sm' style='margin:15px;padding:15px;'>        
        <table class='table table-borderless'>
          <caption> ticket.com </caption>
          <thead>
              <tr>
                  <th colspan='6' scope='col' class='badge-center badge-dark' style='color: #17a2b8;background-color: black;'>$company</th>
                  <th colspan='2' scope='col' class='badge-center badge-light' style='color: #17a2b8;background-color: white;'>$company</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <th colspan='6' style='color: white;'> <i>PASSENGER COPY</i> </th>                
                  <th colspan='2' style='color: white;'> <i>BUS COPY</i> </th>
              </tr>
              <tr class='text-justify' style='text-align: justify;text-justify: inter-word;'>
                  <th>NAME: </th>
                  <td> $name </td>
                  <th>CONTACT: </th>
                  <td> $contact </td>
                  <th>BOOKED BY: </th>
                  <td> $booked </td>
                  <th>CONTACT: </th>
                  <td> $contact </td>
              </tr>
              <tr class='text-justify' style='text-align: justify;text-justify: inter-word;'>
                  <th>BOOKING TIME: </th>
                  <td> $reg </td>
                  <th>TICKET ID: </th>
                  <td> $ticket_id </td>
                  <th>BUS ID : </th>
                  <td> $bus </td>
                  <th>TICKET ID: </th>
                  <td> $ticket_id </td>
              </tr>
              <tr class='text-justify' style='text-align: justify;text-justify: inter-word;'>
                  <th>DEPART: </th>
                  <td> $depart </td>
                  <th>DESTINATION: </th>
                  <td> $dest </td>
                  <th>DEPARTURE TIME: </th>
                  <td> $time </td>
                  <th>BUS ID : </th>
                  <td> $bus </td>
              </tr>
              <tr class='text-justify' style='text-align: justify;text-justify: inter-word;'>
                  <th>CLASS : </th>
                  <td> $class </td>
                  <th>COACH NO : </th>
                  <td> $coach </td>
                  <th>SEAT : </th>
                  <td> $seat </td>
                  <th>SEAT : </th>
                  <td> $seat </td>
              </tr>
              <tr class='text-justify' style='text-align: justify;text-justify: inter-word;'>
                  <th scope='row'>PRICE : </th>
                  <td> $price </td>
                  <th scope='row'>STATUS : </th>
                  <td> PAID </td>
                  <th scope='row'> </th>
                  <td> </td>
                  <th scope='row'> </th>
                  <td> </td>
              </tr>
          </tbody>
        </table>        
      </div>
    </div>
  </div>
  <div>
    <br><button type='submit' class='btn btn-outline-info' value='PRINT' name='print' id='confirm' onclick='PrintTicket();'>PRINT TICKET</button>
  </div>
";
}
?>
<script type="text/javascript">
  function PrintTicket() {
    var divToPrint = document.getElementById('ticketpdf');
    var popupWin = window.open('', '_blank', '');
    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + ticketpdf.innerHTML + '</html>');
    popupWin.document.close();
  }
</script>
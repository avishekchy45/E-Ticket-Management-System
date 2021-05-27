<?php
$query = "SELECT * FROM ticket WHERE BOOKED_BY = '$user_id' ORDER BY REG";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 0) {
    echo "
    <h6 class='text-danger'>NO TICKETS BOOKED BY TOU TILL NOW</h6><br>
    ";
} else {
    echo "
    <table class='table table-striped table-hover table-responsive-sm' id='list'>
    <caption>List of Booked Tickets</caption>
    <thead class='thead-dark'>
    <tr>
    <th>Ticket Details</th>
    <th>PRICE(TK)</th>
    <th>PRINT</th>
    </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_array($result)) {
        $reg = $row['REG'];
        $ticket_id = $row['TICKET_ID'];
        $schedule_id = $row['SCHEDULE_ID'];
        $seat =  $row['SEAT'];
        $name = $row['NAME'];
        $contact = $row['CONTACT'];
        $price = $row['PRICE'];

        echo "
        <form action='../all/printticket.php?ticket=$ticket_id' target='_self' enctype='multipart/form-data' method='POST'>
        <tbody>
        <tr>
        <td class='text-left'><b>BOOKED ON:</b> $reg<br> <b>TICKET ID:</b> $ticket_id<br> <b>SCHEDULE_ID:</b> $schedule_id<br> <b>NAME:</b> $name<br> <b>CONTACT:</b> $contact<br> <b>SEAT:</b> <i class='text-info'>$seat</i> </td>
        <td class='align-middle'>$price</td>
        <td class='align-middle'><button type='submit' class='btn btn-outline-secondary' value='GO' name='go'>GO</button></td>
        </tr>
        </tbody>
        </form>
        ";
    }
    echo "
    </table>
    ";
}

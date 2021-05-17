<?php
$query = "SELECT * FROM busschedule,buslist,busowner WHERE DEPART_COUNTER = '$user_id' and busschedule.Bus_ID=buslist.Bus_ID AND buslist.OWNER = busowner.OWNER_ID ORDER BY DEPART_TIME";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 0) {
    echo "
    <h6 class='text-danger'>NO BUS SCHEDULED FOR YOUR COUNTER</h6><br>
    ";
} else {
    echo "
    <table class='table table-striped table-hover table-responsive-sm' id='list'>
    <caption>List of Available Buses</caption>
    <thead class='thead-dark'>
    <tr>
    <th>Bus Details</th>
    <th>PRICE(TK)</th>
    <th>VIEW SEATS</th>
    </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_array($result)) {
        $bus_id = $row['BUS_ID'];
        $schedule_id = $row['SCHEDULE_ID'];
        $depart = $row['DEPART'];
        $dest = $row['DEST'];
        $departcounter = $row['DEPART_COUNTER'];
        $destcounter = $row['DEST_COUNTER'];
        $time = $row['DEPART_TIME'];
        $price = $row['PRICE'];
        $class = $row['CLASS'];
        $company = $row['COMPANY'];
        $query2 = "SELECT ADDRESS FROM buscounter WHERE COUNTER_ID = '$destcounter'";
        $result2 = mysqli_query($con, $query2);
        $row2 = mysqli_fetch_assoc($result2);
        $address = $row2['ADDRESS'];
        echo "
        <form action='?schedule=$schedule_id&bus=$bus_id' target='_self' enctype='multipart/form-data' method='POST'>
        <tbody>
        <tr>
        <td class='text-left'><b class='text-info'>$company</b> ($class)<br> <b>From:</b> $depart<br> <b>To:</b> $dest ($address)<br> <b>Departure Time:</b> <i class='text-info'>$time</i> </td>
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

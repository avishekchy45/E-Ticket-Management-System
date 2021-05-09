<?php
$query = "SELECT * FROM busschedule,buslist WHERE DEPART_COUNTER = '$user_id' and busschedule.Bus_ID=buslist.Bus_ID";
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
        $from = $row['DEPART_COUNTER'];
        $to = $row['DEST_COUNTER'];
        $time = $row['DEPART_TIME'];
        $price = $row['PRICE'];
        $query2 = "SELECT ADDRESS FROM buscounter WHERE COUNTER_ID = '$to'";
        $r2 = mysqli_query($con, $query2);
        $row2 = mysqli_fetch_assoc($r2);
        $address = $row2['ADDRESS'];
        echo "
        <form action='?bus=$bus_id' target='_self' enctype='multipart/form-data' method='POST'>
        <tbody>
        <tr>
        <td class='text-left'><b>Bus ID:</b> $bus_id <br> <b>From:</b> $from <br> <b>To:</b> $to <i class='text-info'>($address)</i> </td>
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

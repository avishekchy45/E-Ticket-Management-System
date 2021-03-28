<?php
    $query = "select * from schedule where DEPART_COUNTER = '$user_id'";
    $r = mysqli_query($con, $query);
    echo "
    <table class='table table-striped table-hover table-responsive-sm'>
    <thead class='thead-dark'>
    <tr>
    <th>Bus details</th>
    <th>TIME</th>
    <th>BOOK TICKET</th>
    </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_array($r)) {
        $bus = $row['BUS_ID'];
        $from = $row['DEPART_COUNTER'];
        $to = $row['DEST_COUNTER'];
        $time = $row['TIME'];
        echo "
        <form action='booking.php?bus=$bus' target='_self' enctype='multipart/form-data' method='POST'>
        <tbody>
        <tr>
        <td class='text-left'>Bus ID: $bus<br>From: $from<br>To: $to</td>
        <td>$time</td>
        <td><button type='submit' id='approve' value='YES' name='yes'>YES</button></td>
        </tr>
        </tbody>
        </form>
        ";
    }
    echo "
    </table>
    ";

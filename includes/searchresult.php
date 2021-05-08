<?php
if (isset($_POST['search'])) {
    echo "
    <style>
    #searchform{
        display:none;
    }
    </style>
    ";
    $depart = $_POST['from'];
    $dest = $_POST['to'];
    $query = "SELECT * FROM busschedule,buslist,busowner WHERE DEPART = '$depart' AND DEST = '$dest' AND busschedule.BUS_ID = buslist.BUS_ID AND buslist.OWNER = busowner.OWNER_ID ORDER BY DEPART_TIME";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 0) {
        echo "
        <br><h6 class='alert alert-danger animate__animated animate__shakeX'>NO BUS AVAILABLE NOW FROM $depart to $dest</h6><br>
        ";
    } else {
        echo "
        <br><table class='table table-striped table-hover' id='list'>
        <caption>List of Available Buses</caption>
        <thead class='thead-dark animate__animated animate__headShake animate__slower'>
        <tr>
        <th>Bus Details</th>
        <th>PRICE(TK)</th>
        <th>VIEW SEATS</th>
        </tr>
        </thead>
        ";
        while ($row = mysqli_fetch_array($result)) {
            $bus_id = $row['BUS_ID'];
            $sche_id = $row['SCHEDULE_ID'];
            $time = $row['DEPART_TIME'];
            $price = $row['PRICE'];
            $class = $row['CLASS'];
            $company = $row['COMPANY'];
            echo "
            <form action='?bus=$bus_id&from=$depart&to=$dest' target='_self' enctype='multipart/form-data' method='POST'>
            <tbody class='animate__animated animate__flipInX animate__slower'>
            <tr>
            <td class='text-left'><b class='text-info'>$company</b> ($class)<br> <b>From:</b> $depart<br> <b>To:</b> $dest<br> <b>Departure Time:</b> <i class='text-info'>$time</i> </td>
            <td class='align-middle'>$price</td>
            <td class='align-middle'><button type='submit' class='btn btn-outline-secondary' value='GO' name='go'>GO</button></td>
            </tr>
            </tbody>
            </form>
            ";
        }
    }
    echo "
    </table>
    <br><a href='index.php' class='btn btn-outline-primary'>SEARCH AGAIN</a><br>
    ";
}

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
    $query = "select * from schedule,bus,owner where schedule.BUS_ID = bus.BUS_ID and bus.DEPARTURE = '$depart' and bus.DESTINATION = '$dest' and bus.owner = owner.USERNAME order by TIME";
    $r = mysqli_query($con, $query);
    if (mysqli_num_rows($r) == 0) {
        echo "
        <br><h6 class='text-danger'>NO BUS AVAILABLE NOW FROM $depart to $dest</h6><br>
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
        while ($row = mysqli_fetch_array($r)) {
            $from = $row['DEPARTURE'];
            $to = $row['DESTINATION'];
            $class = $row['CLASS'];
            $time = $row['TIME'];
            $price = $row['PRICE'];
            $company = $row['COMPANY_NAME'];
            $bus = $row['BUS_ID'];
            echo "
            <form action='?bus=$bus&from=$from&to=$to' target='_self' enctype='multipart/form-data' method='POST'>
            <tbody class='animate__animated animate__flipInX animate__slower'>
            <tr>
            <td class='text-left'><b class='text-info'>$company</b> ($class)<br> <b>From:</b> $from<br> <b>To:</b> $to<br> <b>Departure Time:</b> <i class='text-info'>$time</i> </td>
            <td class='align-middle'>$price</td>
            <td class='align-middle'><button type='submit' class='btn btn-outline-secondary' value='GO' name='go'>GO</button></td>
            </tr>
            </tbody>
            </form>
            ";
        }
        echo "
        </table>
        <br><a href='index.php' class='btn btn-outline-primary'>SEARCH AGAIN</a><br>
        ";
    }
}

<br>
<form target="_self" enctype="multipart/form-data" method="POST" class="animate__animated animate__slideInRight animate__fast" id="searchform">
    <div class="col">
        <div class="form-group">
            <label for="depart">From</label>
            <select class="form-control" id="depart" name="from" required>
                <option value="">SELECT DEPARTURE CITY</option>
                <?php
                $sql = "select distinct DEPARTURE from bus";
                $r = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($r)) {
                    $departure = $row['DEPARTURE'];
                    echo "<option value='$departure'>$departure</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="dest">To</label>
            <select class="form-control" id="dest" name="to" required>
                <option value="">SELECT DESTINATION CITY</option>
                <?php
                $sql = "select distinct DESTINATION from bus";
                $r = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($r)) {
                    $destination = $row['DESTINATION'];
                    echo "<option value='$destination'>$destination</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-primary" value="SEARCH" name="search">SEARCH BUSES</button><br>
</form>
<br>

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
        <h6 class='text-danger'>NO BUS AVAILABLE NOW FROM $depart to $dest</h6><br>
        ";
    } else {
        echo "
        <table class='table table-striped table-hover'>
        <caption>List of Available Buses</caption>
        <thead class='thead-dark animate__animated animate__bounce animate__slower'>
        <tr>
        <th>Bus details</th>
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
            echo "
            <form action='login.php?from=$from&to=$to' target='_self' enctype='multipart/form-data' method='POST'>
            <tbody class='animate__animated animate__flipInX animate__slower'>
            <tr>
            <td class='text-left'>From: $from<br>To: $to<br>Class: $class<br>Company: $company<br>Date & Time: $time</td>
            <td class='align-middle'>$price</td>
            <td class='align-middle'><button type='submit' class='btn btn-outline-secondary' value='GO' name='go'>GO</button></td>
            </tr>
            </tbody>
            </form>
            ";
            }
            echo "
            </table>
            <br>
            ";
    }
    echo"
    <br><a href='index.php' class='btn btn-outline-primary'>SEARCH AGAIN</a><br>
    ";
}
?>
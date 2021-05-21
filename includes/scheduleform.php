<?php
date_default_timezone_set('Asia/Dhaka');
$mindate = date("Y-m-d");
$mintime = date("h:i");
$min = $mindate . "T" . $mintime;
$maxdate = date("Y-m-d", strtotime("+10 Days"));
$maxtime = date("h:i");
$max = $maxdate . "T" . $maxtime;
//$max=date("Y-m-d h:i:sa", strtotime("+10 Days"));
?>
<br>
<h1 class='text-info'>SCHEDULE YOUR BUSES HERE!</h1>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
    <div class="col">
        <div class="form-group">
            <label for="bus">SELECT BUS</label>
            <select class="form-control" id="bus" name="bus" required>
                <option value="">SELECT BUS ID</option>
                <?php
                $query = "SELECT BUS_ID FROM buslist WHERE OWNER = '$user_id'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $bus_id = $row['BUS_ID'];
                    echo "<option value='$bus_id'>$bus_id</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="depart">DEPARTURE CITY</label>
            <select class="form-control" id="depart" name="departcity" required>
                <option value="">SELECT DEPARTURE CITY</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Dinajpur">Dinajpur</option>
                <option value="Sylhet">Benapole</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dest">DESTINATION CITY</label>
            <select class="form-control" id="dest" name="destcity" required>
                <option value="">SELECT DESTINATION CITY</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Dinajpur">Dinajpur</option>
                <option value="Sylhet">Benapole</option>
            </select>
        </div>
        <div class="form-group table-responsive">
            <label for="">SELECT DEPARTURE COUNTERS & TIME</label>
            <table class="table table-sm table-info">
                <thead>
                    <tr>
                        <th scope="col"><label for="depart">SELECT DEPARTURE COUNTERS</label></th>
                        <th scope="col"><label for="time">SELECT DEPARTURE TIME</label></th>
                    </tr>
                </thead>
                <?php
                $query = "SELECT COUNTER_ID FROM buscounter WHERE OWNER = '$user_id'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $depart = $row['COUNTER_ID'];
                    echo "
                    <div class='form-check'>
                    <tbody>
                    <tr class='text-justify'><td>
                    <input type='checkbox' class='form-check-input departcounter' value='$depart' id='departcounter' name='departcounter[]'>
                    <label class='form-check-label' for='departcounter'> $depart </label>
                    </td><td>
                    <input type='datetime-local' class='form-control' id='time' name='time[]' min=$min max=$max>
                    </td></tr>
                    </tbody>
                    </div>
                    ";
                }
                ?>
            </table>
        </div>
        <div class="form-group">
            <label for="dest">DESTINATION COUNTER</label>
            <select class="form-control" id="dest" name="destcounter" required>
                <option value="">SELECT DESTINATION COUNTER</option>
                <?php
                $query = "SELECT COUNTER_ID FROM buscounter WHERE OWNER = '$user_id'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $dest = $row['COUNTER_ID'];
                    echo "<option value='$dest'>$dest</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">PRICE(TK)</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <br><button type="submit" class="btn btn-outline-warning" value="ADD" name="add" id="add">ADD BUS</button><br>
</form>
<br>

<?php
if (isset($_POST['add'])) {
    $owner = "$user_id";
    $bus_id = $_POST['bus'];
    $departcity = $_POST['departcity'];
    $destcity = $_POST['destcity'];
    $departcounter = $_POST['departcounter'];
    $departtime = $_POST['time'];
    $total_time = count($departtime);
    $i = 0;
    $n = 0;
    while ($i < $total_time) {
        if ($departtime[$i] == '') {
            $i++;
            continue;
        } else
            $selectedtime[$n++] = $departtime[$i++];
    }
    $destcounter = $_POST['destcounter'];
    $price = $_POST['price'];
    $schedule_id = md5("$bus_id" . "-" . "$selectedtime[0]");
    $total_counter = count($departcounter);

    $failed = 0;
    $query = "INSERT INTO busschedule (BUS_ID,SCHEDULE_ID,DEPART,DEST,DEST_COUNTER,PRICE) VALUES ('$bus_id','$schedule_id','$departcity','$destcity','$destcounter','$price')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Successfully Scheduled Bus ( $bus_id )')</script>";
    } else {
        echo "<div class='text-danger'> Schedule Error! </div>" . mysqli_error($con);
        $failed++;
    }

    $n = 0;
    if ($failed == 0) {
        while ($n < $total_counter) {
            $counter = $departcounter[$n];
            $time = $selectedtime[$n];
            $query = "INSERT INTO departlist (SCHEDULE_ID,DEPART_COUNTER,DEPART_TIME) VALUES ('$schedule_id','$counter','$time')";
            $n++;
            if (!mysqli_query($con, $query)) {
                echo "<div class='text-danger'> Schedule Error! </div>" . mysqli_error($con);
            }
        }
    }
    //echo "$total_counter";
}
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#add').click(function() {
            checked = $("input[type=checkbox]:checked").length;
            if (!checked) {
                alert("You Must Select at Least One Counter.");
                return false;
            }
        });
    });
</script>
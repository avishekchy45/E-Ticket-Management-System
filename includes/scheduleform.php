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
        <div class="form-group">
            <label for="depart">DEPARTURE COUNTER</label>
            <select class="form-control" id="depart" name="departcounter" required>
                <option value="">SELECT DEPARTURE COUNTER</option>
                <?php
                $query = "SELECT COUNTER_ID FROM buscounter WHERE OWNER = '$user_id'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $depart = $row['COUNTER_ID'];
                    echo "<option value='$depart'>$depart</option>";
                }
                ?>
            </select>
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
            <label for="time">DEPARTURE TIME</label>
            <input type="datetime-local" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="price">PRICE(TK)</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
    <br><button type="submit" class="btn btn-outline-warning" value="ADD" name="add">ADD BUS</button><br>
</form>
<br>

<?php
if (isset($_POST['add'])) {
    $owner = "$user_id";
    $bus_id = $_POST['bus'];
    $departcity = $_POST['departcity'];
    $destcity = $_POST['destcity'];
    $departcounter = $_POST['departcounter'];
    $destcounter = $_POST['destcounter'];
    $time = $_POST['time'];
    $price = $_POST['price'];
    $schedule_id = md5("$bus_id" . "-" . "$time");
    $query = "INSERT INTO busschedule (BUS_ID,SCHEDULE_ID,DEPART,DEST,DEPART_COUNTER,DEST_COUNTER,DEPART_TIME,PRICE) VALUES ('$bus_id','$schedule_id','$departcity','$destcity','$departcounter','$destcounter','$time','$price')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Successfully Scheduled Bus ( $bus_id )')</script>";
    } else {
        echo "<div class='text-danger'> Registration error! </div>" . mysqli_error($con);
    }
}

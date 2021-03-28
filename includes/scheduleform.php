<br>
<h2>Schedule Your Buses</h2><br>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
    <div class="col">
        <div class="form-group">
            <label for="bus">SELECT BUS</label>
            <select class="form-control" id="bus" name="bus" required>
                <option value="">SELECT BUS ID</option>
                <?php
                $sql = "select BUS_ID from bus where OWNER = '$user_id'";
                $r = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($r)) {
                    $bus_id = $row['BUS_ID'];
                    echo "<option value='$bus_id'>$bus_id</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="depart">SELECT DEPARTURE</label>
            <select class="form-control" id="depart" name="depart" required>
                <option value="">SELECT DEPARTURE COUNTER</option>
                <?php
                $sql = "select USERNAME from counter where OWNER = '$user_id'";
                $r = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($r)) {
                    $depart = $row['USERNAME'];
                    echo "<option value='$depart'>$depart</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="dest">SELECT DESTINATION</label>
            <select class="form-control" id="dest" name="dest" required>
                <option value="">SELECT DESTINATION COUNTER</option>
                <?php
                $sql = "select USERNAME from counter where OWNER = '$user_id'";
                $r = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($r)) {
                    $dest = $row['USERNAME'];
                    echo "<option value='$dest'>$dest</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="time">DEPARTURE TIME</label>
            <input type="datetime-local" class="form-control" id="time" name="time" required>
        </div>
    <br><button type="submit" class="btn btn-outline-warning" value="ADD" name="add">ADD BUS</button><br>
</form>
<br>

<?php
if (isset($_POST['add'])) {
    $owner = "$user_id";
    $bus_id = $_POST['bus'];
    $depart = $_POST['depart'];
    $dest = $_POST['dest'];
    $time = $_POST['time'];
    $schedule_id = "$bus_id" . "_" . "$time";
    $sql = "insert into schedule (OWNER,BUS_ID,DEPART_COUNTER,DEST_COUNTER,TIME,SCHEDULE_ID) values ('$owner','$bus_id','$depart','$dest','$time','$schedule_id')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Successfully Scheduled Bus ( $bus_id )')</script>";
    } else {
        echo "<div class='text-danger'> Registration error! </div>" . mysqli_error($con);
    }
}

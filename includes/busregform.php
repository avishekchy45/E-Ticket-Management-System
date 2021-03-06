<br>
<h1 class='text-info'>ADD YOUR BUS HERE!</h1>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
    <div class="col">
        <div class="form-group">
            <label for="coach">COACH NO</label>
            <input type="text" class="form-control" id="coach" name="coach" required>
        </div>
        <div class="form-group">
            <label for="class">CLASS</label>
            <input type="text" class="form-control" id="class" name="class">
        </div>
        <div class="form-group">
            <label for="seat">SEAT TYPE</label>
            <select class="form-control" id="seat" name="seat" required>
                <option value="">SELECT SEAT TYPE</option>
                <?php
                $query = "SELECT SEAT_TYPE FROM busseatlist";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $type = $row['SEAT_TYPE'];
                    echo "<option value='$type'>$type</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-warning" value="ADD" name="add">ADD BUS</button><br>
</form>
<br>

<?php
if (isset($_POST['add'])) {
    $owner = "$user_id";
    $coach = $_POST['coach'];
    $class = $_POST['class'];
    $seat = $_POST['seat'];
    $bus_id = "$owner" . '-' . "$coach";
    $query = "INSERT INTO buslist (BUS_ID,OWNER,COACH_NO,CLASS,SEAT_TYPE) VALUES ('$bus_id','$owner','$coach','$class','$seat')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Successfully Added Bus ( $bus_id )')</script>";
    } else {
        echo "<div class='text-danger'> Registration error! </div>" . mysqli_error($con);
    }
}

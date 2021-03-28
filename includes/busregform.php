<br>
<h2>Register Your Buses</h2><br>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
    <div class="col">
        <div class="form-group">
            <label for="depart">DEPARTURE</label>
            <select class="form-control" id="depart" name="depart" required>
                <option value="">SELECT DEPARTURE CITY</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Dinajpur">Dinajpur</option>
            </select>
        </div>
        <div class="form-group">
        <label for="dest">DESTINATION</label>
            <select class="form-control" id="dest" name="dest" required>
                <option value="">SELECT DESTINATION CITY</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Dinajpur">Dinajpur</option>
            </select>
        </div>
        <div class="form-group">
            <label for="coach">COACH NO</label>
            <input type="text" class="form-control" id="coach" name="coach" required>
        </div>
        <div class="form-group">
            <label for="class">CLASS</label>
            <input type="text" class="form-control" id="class" name="class">
        </div>
        <div class="form-group">
            <label for="price">PRICE(TK)</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="seat">SEAT</label>
            <input type="number" class="form-control" id="seat" name="seat" required>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-warning" value="ADD" name="add">ADD BUS</button><br>
</form>
<br>

<?php
if (isset($_POST['add'])) {
    $depart = $_POST['depart'];
    $dest = $_POST['dest'];
    $coach = $_POST['coach'];
    $class = $_POST['class'];
    $price = $_POST['price'];
    $seat = $_POST['seat'];
    $bus_id = "$depart" . '-' . "$dest" . '-' . "$coach";
    $owner = "$user_id";
    $sql = "insert into bus (BUS_ID,OWNER,DEPARTURE,DESTINATION,COACH_NO,CLASS,PRICE,SEAT) values ('$bus_id','$owner','$depart','$dest','$coach','$class','$price','$seat')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Successfully Added Bus ( $bus_id )')</script>";
    } else {
        echo "<div class='text-danger'> Registration error! </div>" . mysqli_error($con);
    }
}

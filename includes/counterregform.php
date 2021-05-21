<?php
$query = "SELECT MAX_COUNTER FROM busowner WHERE OWNER_ID='$user_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$maxcounter = $row['MAX_COUNTER'];
$query = "SELECT count(COUNTER_ID) AS REG_COUNTER FROM buscounter WHERE OWNER='$user_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$regcounter = $row['REG_COUNTER'];
if ($regcounter >= $maxcounter)
    $newregister = "disabled";
else
    $newregister = $maxcounter - $regcounter;
?>
<br>
<h1 class='text-info'>REGISTER YOUR COUNTER HERE!</h1>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
    <div class="col">
        <div class="form-group">
            <label for="usr">USER NAME</label>
            <input type="text" class="form-control" id="usr" name="id" required>
        </div>
        <div class="form-group">
            <label for="usr">ADDRESS</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="usr">PHONE NUMBER</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="pwd">PASSWORD</label>
            <input type="password" class="form-control" id="pwd" name="pass" required>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-warning" value="REGISTER" name="register" <?php echo "$newregister"; ?>>REGISTER</button><br>
</form>
<br>

<?php
if ($newregister == "disabled") {
    echo "<div class='alert alert-danger animate__animated animate__shakeX'>You have reached maximum number of counters. Contact ADMIN for excedding your counter limits. <br></div>";
} else {
    echo "<div class='alert alert-success animate__animated animate__shakeX'>YOU CAN REGISTER $newregister COUNTER/S MORE. <br></div>";
}
if (isset($_POST['register'])) {
    $id = $_POST['id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $owner = "$user_id";
    $type = "counter";
    $pass = md5($pass);
    $loginquery = "INSERT INTO ulogin (UTYPE,ID,PASS) VALUES ('$type','$id','$pass')";
    $acquery = "INSERT INTO buscounter (COUNTER_ID,OWNER,ADDRESS,CONTACT) VALUES ('$id','$owner','$address','$phone')";

    if (mysqli_query($con, $loginquery) && mysqli_query($con, $acquery)) {
        echo "<script>alert('Successfully Registered COUNTER ID( $id ).');location.href = 'addcounter.php';</script>";
    } else {
        echo "<div class='text-danger'> Registration Error! </div>" . mysqli_error($con);
    }
}

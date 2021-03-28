<br>
<h2>Register Your Counter</h2><br>
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
            <label for="usr">PHONE</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="pwd">PASSWORD</label>
            <input type="password" class="form-control" id="pwd" name="pass" required>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-warning" value="REGISTER" name="register">REGISTER</button><br>
</form>
<br>

<?php
if (isset($_POST['register'])) {
    $id = $_POST['id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $owner = "$user_id";
    $type = "counter";
    $sql = "insert into counter (USERNAME,ADDRESS,OWNER,PHONE) values ('$id','$address','$owner','$phone')";
    $sql2 = "insert into login (TYPE,ID,PASS) values ('$type','$id','$pass')";

    if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
        echo "<script>alert('Successfully registered .Remember this USERNAME( $id ) for further login.')</script>";
    } else {
        echo "<div class='text-danger'> Registration error! </div>" . mysqli_error($con);
    }
}

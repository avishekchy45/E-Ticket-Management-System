<br>
<h2 class='text-danger'>USER REGISTRATION WILL BE AVAILABLE SOON</h2><br>
<h5>If You Are Not Our Registered User , Please <a class="badge badge-info" href='signup.php'>SIGN UP</a> to Book Ticket</h5><br>
<h5>If You Are Already Registered User , Please <a class="badge badge-info" href='login.php'>LOG IN</a> to Continue</h5><br>
<h1 class='text-info'>SIGNUP HERE!</h1>
<br>
<form target="_self" enctype="multipart/form-data" method="POST" class="animate__animated animate__backInDown">
    <div class="col">
        <div class="form-group">
            <label for="usr">NAME</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="usr">USER NAME</label>
            <input type="text" class="form-control" id="usr" name="id" required>
        </div>
        <div class="form-group">
            <label for="pwd">PASSWORD</label>
            <input type="password" class="form-control" id="pwd" name="pass" required>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-warning" value="REGISTER" name="register" disabled>REGISTER</button><br>
</form>
<br>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['company'];
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $type = "user";
    $sql = "insert into user (NAME,USERNAME) values ('$name','$id')";
    $sql2 = "insert into login (TYPE,ID,PASS) values ('$type','$id','$pass')";

    if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
        echo "<script>alert('Successfully registered .Remember this USERNAME( $id ) for further login.Go to login page to continue...')</script>";
    } else {
        echo "<div class='text-danger'> Registration error! </div>" . mysqli_error($con);
    }
}

<br>
<h5>If You Are Not Our Registered User , Please <a class="badge badge-info" href='signup.php'>SIGN UP</a> to Book Ticket</h5><br>
<h5>If You Are Already Registered User , Please <a class="badge badge-info" href='login.php'>LOG IN</a> to Continue</h5><br>
<h1 class='text-info'>LOGIN HERE!</h1>
<br>
<form target="_self" enctype="multipart/form-data" method="POST" class="animate__animated animate__backInDown">
    <div class="col">
        <div class="form-group">
            <label for="usr">USER NAME</label>
            <input type="text" class="form-control" id="usr" name="id" required>
        </div>
        <div class="form-group">
            <label for="pwd">PASSWORD</label>
            <input type="password" class="form-control" id="pwd" name="pass" required>
        </div>
    </div>
    <br><button type="submit" class="btn btn-dark" value="LOGIN" name="login">LOG IN</button><br>
</form>
<br>

<?php
if (isset($_POST['login'])) {
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $query = "SELECT UTYPE,ID,PASS FROM ulogin WHERE BINARY ID='$id' and BINARY PASS='$pass'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $type = $row['UTYPE'];
        $_SESSION['user'] = $type;
        $_SESSION['user_id'] = $id;
        $_SESSION['login_status'] = "in";
        header("Location:$type/index.php");
    } else {
        echo "<div class='alert alert-danger animate__animated animate__shakeX'>Incorrect User Id or Password.<br>If you are new user <a href='signup.php' class='alert-link'>SIGN UP</a> to continue...<br></div>";
    }
}

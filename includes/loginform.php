<br>
<h2>Please <a href="login.php">login</a> to book ticket</h2><br>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
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

    $query = "select TYPE,ID,PASS from login where BINARY ID='$id' and BINARY PASS='$pass'";
    $r = mysqli_query($con, $query);
    if (mysqli_num_rows($r) > 0) {
        $row = mysqli_fetch_array($r);
        $type = $row['TYPE'];
        $_SESSION['user'] = $type;
        $_SESSION['user_id'] = $id;
        $_SESSION['login_status'] = "in";
        header("Location:$type/index.php");
    } else {
        echo "<div class='text-danger'>Incorrect User Id or Password. If you are new user <a href='signup.php'>SIGNUP</a> to continue...<br></div>";
    }
}

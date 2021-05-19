<br>
<h2 class='badge badge-success'>USER REGISTRATION IS AVAILABLE NOW</h2><br>
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
            <label for="email">EMAIL</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">PHONE</label>
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
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $pass = md5($pass);
    $type = "user";
    $sql = "insert into ulogin (UTYPE,ID,PASS) values ('$type','$id','$pass')";
    $sql2 = "insert into guser (USER_ID,NAME,EMAIL,PHONE) values ('$id','$name','$email','$phone')";

    if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
        $_SESSION['user'] = "user";
        $_SESSION['user_id'] = $id;
        $_SESSION['login_status'] = "in";
        echo "
            <script>
            alert('Successfully registered.');
            location.href = 'user/index.php';
            </script>
        ";
    } else {
        echo "<div class='text-danger'> Registration error! </div>" . mysqli_error($con);
    }
}

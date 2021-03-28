<br>
<h2>Register Bus Owner</h2><br>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
    <div class="col">
        <div class="form-group">
            <label for="usr">COMPANY NAME</label>
            <input type="text" class="form-control" id="company" name="company" required>
        </div>
        <div class="form-group">
            <label for="usr">OWNER NAME</label>
            <input type="text" class="form-control" id="owner" name="owner" required>
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
    <br><button type="submit" class="btn btn-outline-warning" value="REGISTER" name="register">REGISTER</button><br>
</form>
<br>

<?php
if (isset($_POST['register'])) {
    $company = $_POST['company'];
    $owner = $_POST['owner'];
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $type = "owner";
    $sql = "insert into owner (COMPANY_NAME,NAME,USERNAME) values ('$company','$owner','$id')";
    $sql2 = "insert into login (TYPE,ID,PASS) values ('$type','$id','$pass')";

    if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
        echo "<script>alert('Successfully registered .Remember this USERNAME( $id ) for further login.Go to login page to continue...')</script>";
    } else {
        echo "<div class='text-danger'> Registration error! </div>" . mysqli_error($con);
    }
}

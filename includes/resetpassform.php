<br>
<h2>PASSWORD RESET IS NOT AVAILABLE NOW</h2><br>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
    <div class="col">
        <div class="form-group">
            <label for="usr">USER NAME</label>
            <input type="text" class="form-control" id="usr" name="id" required>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-danger" value="REGISTER" name="register" disabled>RESET PASSWORD</button><br>
</form>
<br>

<?php
if (isset($_POST['reset'])) {
    $id = $_POST['id'];
    $sql2 = "insert into login (TYPE,ID,PASS) values ('$type','$id','$pass')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Password Reset Successfull for this USERNAME( $id ). Go to login page to continue...')</script>";
    } else {
        echo "<div class='text-danger'> Error! </div>" . mysqli_error($con);
    }
}

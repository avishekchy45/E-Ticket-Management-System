<br>
<h2 class='text-success'>PASSWORD RESET IS NOW AVAILABLE</h2>
<br>
<form target="_self" enctype="multipart/form-data" method="POST">
    <div class="col">
        <div class="form-group">
            <label for="usr">USER NAME</label>
            <input type="text" class="form-control" id="usr" name="id" required>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-danger" value="RESET" name="reset">RESET PASSWORD</button><br>
</form>
<br>

<?php
if (isset($_POST['reset'])) {
    $id = $_POST['id'];
    $query = "SELECT PASS FROM ulogin WHERE ID='$id'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $query = "UPDATE ulogin SET PASS=DEFAULT(PASS) WHERE ID='$id'";
        if (mysqli_query($con, $query)) {
            echo "<div class='alert alert-success animate__animated animate__shakeX'> Password Reset of ID( $id ) is Successful! </div>";
        }
    } else {
        echo "<div class='alert alert-danger animate__animated animate__shakeX'> User Not Found! </div>" . mysqli_error($con);
    }
}

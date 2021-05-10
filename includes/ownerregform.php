<br>
<h1 class='text-info'>REGISTER BUS OWNER HERE!</h1>
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
            <label for="usr">CONTACT DETAILS</label>
            <input type="text" class="form-control" id="contact" name="contact" required>
        </div>
        <div class="form-group">
            <label for="usr">NUMBER OF COUNTER</label>
            <input type="number" class="form-control" id="counter" name="counter" required>
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
    $contact = $_POST['contact'];
    $counter = $_POST['counter'];    
    $utype = "owner";
    $loginquery = "INSERT INTO ulogin (UTYPE,ID,PASS) VALUES ('$utype','$id','$pass')";
    $acquery = "insert into busowner (OWNER_ID,NAME,COMPANY,CONTACT,REG_COUNTER) values ('$id','$owner','$company','$contact','$counter')";

    if (mysqli_query($con, $loginquery) && mysqli_query($con, $acquery)) {
        echo "<script>alert('Successfully Registered OWNER ID( $id ).')</script>";
    } else {
        echo "<div class='text-danger'> Registration Error! </div>" . mysqli_error($con);
    }
}

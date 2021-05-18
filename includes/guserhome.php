<hr>
<br>

<?php
$query = "SELECT * FROM guser WHERE USER_ID='$user_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$reg = $row['REG'];
date_default_timezone_set('Asia/Dhaka');
$now = date('Y-m-d H:i:s');
$diff = strtotime($now) - strtotime($reg);
$Days    = floor($diff / (60 * 60 * 24));
$Hours   = floor(($diff - ($Days * 60 * 60 * 24)) / (60 * 60));
$Minutes = floor(($diff - ($Days * 60 * 60 * 24) - ($Hours * 60 * 60)) / 60);

$name = $row['NAME'] == '' ? "NOT FOUND <a class='badge badge-danger' href='../settings.php'>UPDATE</a>" : $row['NAME'];
$email = $row['EMAIL'] == '' ? "NOT FOUND <a class='badge badge-danger' href='settings.php'>UPDATE</a>" : $row['EMAIL'];
$phone = $row['PHONE'] == '' ? "NOT FOUND <a class='badge badge-danger' href='settings.php'>UPDATE</a>" : $row['PHONE'];
echo "
    <h1>Welcome <i>$name</i> </h1>
    <br>
    <h5 class='text-info'>👨‍💼 USER INFO 👨‍💼</h5>
    <br>
    <a class='badge badge-info' href='../settings.php'>UPDATE YOUR INFO</a><br><br>
    <table class='table table-striped table-hover table-responsive-sm'>
    <tr>
    <th>YOUR NAME</th><td>$name</td>
    </tr>
    <tr>
    <th>E-MAIL ADDRESS</th><td>$email</td>
    </tr>
    <tr>
    <th>PHONE NUMBER</th><td>$phone</td>
    </tr>
    <tr>
    <th>USERNAME</th><td>$user_id</td>
    </tr>
    <tr>
    <th>MEMBER SINCE</th><td>$Days days, $Hours hours and $Minutes minutes</td>
    </tr>
    </table>
    ";
?>
<br>
<hr>
<hr>
<br>

<?php
$query = "SELECT * FROM busowner WHERE OWNER_ID='$user_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$reg = $row['REG'];
date_default_timezone_set('Asia/Dhaka');
$now = date('Y-m-d H:i:s');
$diff = strtotime($now) - strtotime($reg);
$Days    = floor($diff / (60 * 60 * 24));
$Hours   = floor(($diff - ($Days * 60 * 60 * 24)) / (60 * 60));
$Minutes = floor(($diff - ($Days * 60 * 60 * 24) - ($Hours * 60 * 60)) / 60);

$company = $row['COMPANY'] == '' ? "NOT FOUND <a class='badge badge-danger' href='../all/settings.php'>UPDATE</a>" : $row['COMPANY'];
$owner = $row['NAME'] == '' ? "NOT FOUND <a class='badge badge-danger' href='all/settings.php'>UPDATE</a>" : $row['NAME'];
echo "
    <h1>Welcome <i>\"$user_id\"</i> </h1>
    <br>
    <h5 class='text-info'>👨‍💼 COUNTER DETAILS 👨‍💼</h5>
    <br>
    <a class='badge badge-info' href='../all/settings.php'>UPDATE YOUR INFO</a><br><br>
    <table class='table table-striped table-hover table-responsive-sm'>
    <tr>
    <th>COMPANY NAME</th><td>$company</td>
    </tr>
    <tr>
    <th>OWNER NAME</th><td>$owner</td>
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
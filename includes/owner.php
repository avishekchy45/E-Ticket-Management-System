<h2>HOME</h2>
<hr>
<?php
$query = "select * from owner where USERNAME='$user_id'";
$r = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($r);

$reg=$row['REGISTRATION'];
date_default_timezone_set('Asia/Dhaka'); 
$now = date('Y-m-d H:i:s');
$diff = strtotime($now) - strtotime($reg);
$Days    = floor($diff/(60*60*24));   
$Hours   = floor(($diff-($Days*60*60*24))/(60*60));   
$Minutes = floor(($diff-($Days*60*60*24)-($Hours*60*60))/60);

$company = $row['COMPANY_NAME'] == '' ? "NOT FOUND <a href='../settings.php'>UPDATE</a>" : $row['COMPANY_NAME'];
$owner = $row['NAME'] == '' ? "NOT FOUND <a href='settings.php'>UPDATE</a>" : $row['NAME'];
echo "
    <h3>Welcome $owner($user_id) </h3>
    <br><a href='../settings.php'>UPDATE YOUR INFO</a><br><br>
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

<hr>
<br>

<?php
$query = "SELECT UTYPE,COUNT(ID) FROM ulogin GROUP BY UTYPE";
$result = mysqli_query($con, $query);
echo "
<h1>Welcome <i>\"$user_id\"</i> </h1>
<br>
<h5 class='text-info'>🧾 REGISTERED ACCOUNTS 🧾</h5>
<br>
<table class='table table-striped table-hover table-bordered'>
";
while ($row = mysqli_fetch_array($result)) {
    $utype = $row['UTYPE'];
    $number = $row['COUNT(ID)'];
    if ($utype == 'admin')
        $utype = 'ADMIN';
    else if ($utype == 'owner')
        $utype = 'OWNER';
    else if ($utype == 'counter')
        $utype = 'COUNTER';
    else if ($utype == 'user')
        $utype = 'GENERAL USER';
    echo "
    <tr>
    <th style='width:50%'> $utype </th><td style='width:50%'> $number </td> 
    </tr>
    ";
}
echo "
</table>
";
?>
<br>
<hr>
<?php
$sql = "SELECT UTYPE,COUNT(ID) FROM ulogin GROUP BY UTYPE";
$result = mysqli_query($con, $sql);
echo "
<br>
<table class='table table-striped table-hover'>
";
while ($row = mysqli_fetch_array($result)) {
    $utype = $row['UTYPE'];
    $number = $row['COUNT(ID)'];
    if ($utype == 'admin')
        $utype = 'ADMIN ACCOUNT';
    else if ($utype == 'owner')
        $utype = 'OWNER REGISTERED';
    else if ($utype == 'counter')
        $utype = 'COUNTER REGISTERED';
    else if ($utype == 'user')
        $utype = 'USER ACCOUNT';
    echo "
    <tr>
    <th> $utype </th><td class='text-left'> $number </td> 
    </tr>
    ";
}
echo "
</table>
<br>
";

<br>
<?php
$sql = "SELECT TYPE,COUNT(ID) FROM login GROUP BY TYPE";
$r = mysqli_query($con, $sql);
echo "
    <table class='table table-striped table-hover'>
";
while ($row = mysqli_fetch_array($r)) {
    $type = $row['TYPE'];
    $number = $row['COUNT(ID)'];
    if ($type == 'admin')
        $type = 'ADMIN ACCOUNT';
    else if ($type == 'owner')
        $type = 'OWNER REGISTERED';
    else if ($type == 'counter')
        $type = 'COUNTER REGISTERED';
    else if ($type == 'user')
        $type = 'USER ACCOUNT';
    echo "
        <tr>
        <th> $type </th><td class='text-left'> $number </td> 
        </tr>
    ";
}
echo "
    </table>
    <br>
";

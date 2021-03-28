<?php
$query = "select * from owner";
$r = mysqli_query($con, $query);
echo "
<table class='table table-striped table-hover table-responsive-sm'>
<thead class='thead-dark'>
<tr>
<th>USERNAME, NAME, COMPANY NAME</th>
</tr>
</thead>
";
while ($row = mysqli_fetch_array($r)) {
    $id = $row['USERNAME'];
    $name = $row['NAME'];
    $company = $row['COMPANY_NAME'];
    echo "
    <tbody>
    <tr>
    <td class='text-left'>USERNAME: $id<br>NAME: $name<br>Company: $company</td> 
    </tr>
    </tbody>
    ";
}
echo "
</table>
";

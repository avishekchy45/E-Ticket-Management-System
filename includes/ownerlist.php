<?php
$query = "SELECT * FROM busowner ORDER BY REG DESC";
$result = mysqli_query($con, $query);
echo "
<br>
<table class='table table-striped table-hover'>
<thead class='thead-dark'>
<tr>
<th>OWNER Details</th>
</tr>
</thead>
";
while ($row = mysqli_fetch_array($result)) {
    $ownerid = $row['OWNER_ID'];
    $name = $row['NAME'];
    $company = $row['COMPANY'];
    $contact = $row['CONTACT'];
    echo "
    <tbody>
    <tr>
    <td class='text-left'>ID: $ownerid <br>NAME: $name <br>COMPANY: $company <br>CONTACT: $contact </td> 
    </tr>
    </tbody>
    ";
}
echo "
</table>
<br>
";

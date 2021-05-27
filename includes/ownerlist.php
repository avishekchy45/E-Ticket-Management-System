<?php
$query = "SELECT * FROM busowner ORDER BY REG DESC";
$result = mysqli_query($con, $query);
echo "
<br>
<table class='table table-hover' id='ownerlist'>
<thead class='thead-dark'>
<tr>
<th>OWNER DETAILS</th>
</tr>
</thead>
<tbody>
";
while ($row = mysqli_fetch_array($result)) {
    $ownerid = $row['OWNER_ID'];
    $name = $row['NAME'];
    $company = $row['COMPANY'];
    $contact = $row['CONTACT'];
    $counter = $row['MAX_COUNTER'];
    echo "
    <tr>
    <td class='text-left text-primary'><b>ID</b>: $ownerid <br><b>NAME</b>: $name <br><b>COMPANY</b>: $company <br><b>CONTACT</b>: $contact <br><b>MAXIMUM COUNTER</b>: $counter </td> 
    </tr>
    ";
}
echo "
</tbody>
</table>
<br>
";
?>
<script>
    $(document).ready(function() {
        $('#ownerlist').DataTable();
    });
    $('#ownerlist').dataTable({
        "order": [],
        "lengthMenu": [5, 10, 25, 50, 75, 100]
    });
</script>
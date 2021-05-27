<?php
$query = "SELECT * FROM buscounter ORDER BY REG DESC";
$result = mysqli_query($con, $query);
echo "
<br>
<table class='table table-hover' id='counterlist'>
<thead class='thead-dark'>
<tr>
<th>COUNTER DETAILS</th>
</tr>
</thead>
<tbody>
";
while ($row = mysqli_fetch_array($result)) {
    $counterid = $row['COUNTER_ID'];
    $owner = $row['OWNER'];
    $address = $row['ADDRESS'];
    $contact = $row['CONTACT'];
    echo "
    <tr>
    <td class='text-left text-success'><b>ID</b>: $counterid <br><b>OWNER</b>: $owner <br><b>ADDRESS</b>: $address <br><b>CONTACT</b>: $contact </td> 
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
        $('#counterlist').DataTable();
    });
    $('#counterlist').dataTable({
        "order": [],
        "lengthMenu": [5, 10, 25, 50, 75, 100]
    });
</script>
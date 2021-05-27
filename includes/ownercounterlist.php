<?php
$query = "SELECT * FROM buscounter WHERE OWNER='$user_id' ORDER BY REG DESC";
$result = mysqli_query($con, $query);
echo "
<br>
<table class='table table-hover' id='buslist'>
<thead class='thead-dark'>
<tr>
<th>COUNTER DETAILS</th>
</tr>
</thead>
<tbody>
";
while ($row = mysqli_fetch_array($result)) {
    $counterid = $row['COUNTER_ID'];
    $address = $row['ADDRESS'];
    $contact = $row['CONTACT'];
    echo "
    <tr>
    <td class='text-left text-primary'><b>COUNTER ID</b>: $counterid <br><b>ADDRESS</b>: $address <br><b>CONTACT</b>: $contact </td> 
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
        $('#buslist').DataTable();
    });
    $('#buslist').dataTable({
        "order": [],
        "lengthMenu": [5, 10, 25, 50, 75, 100]
    });
</script>
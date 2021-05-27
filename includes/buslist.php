<?php
$query = "SELECT * FROM buslist WHERE OWNER='$user_id' ORDER BY REG DESC";
$result = mysqli_query($con, $query);
echo "
<br>
<table class='table table-hover' id='buslist'>
<thead class='thead-dark'>
<tr>
<th>BUS DETAILS</th>
</tr>
</thead>
<tbody>
";
while ($row = mysqli_fetch_array($result)) {
    $busid = $row['BUS_ID'];
    $coach = $row['COACH_NO'];
    $class = $row['CLASS'];
    $seat = $row['SEAT_TYPE'];
    echo "
    <tr>
    <td class='text-left text-success'><b>BUS ID</b>: $busid <br><b>COACH NO</b>: $coach <br><b>CLASS</b>: $class <br><b>SEAT TYPE</b>: $seat </td> 
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
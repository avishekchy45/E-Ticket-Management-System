<?php
$query = "SELECT * FROM payment ORDER BY MODIFIED DESC";
$result = mysqli_query($con, $query);
echo "
<br>
<table class='table table-hover' id='paymentlist'>
<thead class='thead-dark'>
<tr>
<th>PAYMENT DETAILS</th>
</tr>
</thead>
<tbody>
";
while ($row = mysqli_fetch_array($result)) {
    $ticketid = $row['TICKET_ID'];
    $amount = $row['AMOUNT'];
    $currency = $row['AMOUNT_CURR'];
    $txn = $row['TXN_ID'];
    $checkout = $row['CHECKOUT_SESSION_ID'];
    $status = $row['PAYMENT_STATUS'];
    $created = $row['CREATED'];
    $modified = $row['MODIFIED'];
    echo "
    <tr>
    <td class='text-left text-warning'><b>TICKET ID</b>: $ticketid <br><b>AMOUNT</b>: $amount $currency ($status)<br><b>TRANSACTION ID</b>: $txn <br><b>CHECKOUT SESSION ID</b>: $checkout <br><b>CREATED</b>: $created <br><b>MODIFIED</b>: $modified </td> 
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
        $('#paymentlist').DataTable();
    });
    $('#paymentlist').dataTable({
        "order": [],
        "lengthMenu": [5, 10, 25, 50, 75, 100]
    });
</script>
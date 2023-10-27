<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");
include("scripts.php");
include("functions.php");



echo "
<div class='container p-3 border border-primary'>
    <table id='myTable' class='display'>
    <thead>
        <tr>
            <th>Txn No</th>
            <th>Amount</th>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Date</th>
            <th>Processed by</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
";
$query = mysqli_query($conn, $sql_select ="SELECT * FROM tbl_ldlpadalaexpress");
while($row = mysqli_fetch_assoc($query ?? null)) {
    $db_txn_no = $row["txn_no"];
    $db_amt = $row["amt"];
    $db_sender = $row["sender"];
    $db_receiver = $row["receiver"];
    $db_date_time_sent = $row["date_time_sent"];
    $db_processed_by = $row["processed_by"];
    $db_status = $row["status"];

    echo "
        <tr>
            <td>$db_txn_no <a tabindex='0' class='bi bi-clipboard '   role='button' data-toggle='popover'   data-content='Copied!' onclick='CopyMyLeftTd(this)'></a></td>
            <td>$db_amt</td>
            <td>$db_sender</td>
            <td>$db_receiver</td>
            <td>$db_date_time_sent</td>
            <td>$db_processed_by</td>
            <td>$db_status</td>
        </tr>
    ";
}
?>

    </tbody>
    </table>
</div>

<?php include('footer.php');?>




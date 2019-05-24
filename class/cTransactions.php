<?php
include_once '../includes/conn.php';
include '../includes/session.php';
//Select All Data
function load_transaction(){
    $sql = "SELECT * FROM tr_transactions OORDER BY TransactionID DESC";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()){
        $data[]=$row;
    }
    $result['data'] = $data;
    return $result;
}
?>


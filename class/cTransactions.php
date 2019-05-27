<?php
include 'includes/conn.php';

//Select All Data
function load_transaction(){
    
    $sql = "SELECT * FROM tr_transactions OORDER BY TransactionID DESC";
    $query = mysql_query($sql);
    $data = array();
    while ($row = mysql_fetch_object($query)){
        $data[]=$row;
    }
    $result['data'] = $data;
    return $result;
}
?>


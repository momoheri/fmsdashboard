<?php
include 'includes/conn.php';

$result = $_POST["Result"];
$jsondata = json_decode($result,TRUE);
foreach ($jsondata['result']['data'] as $item){
    $sql="INSERT INTO tr_transactions (Date,Time,Unit,Pump,Job,UserData,Type,UnitPrice,Litres,TotalPrice) VALUES ('$item[0]','$item[1]','$item[2]','$item[3]','$item[4]','$item[5]','$item[6]','$item[7]','$item[8]','$item[9]')";
    mysql_query($sql);
}
echo json_encode("Success");
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


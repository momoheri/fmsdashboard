<?php
include 'includes/conn.php';
$method = $_GET['method'];

if($method === 'transactions'){
    $result = $_POST["result"];
    $jsondata = json_decode($result,TRUE);
    foreach ($jsondata['result']['data'] as $item){
        $date = date("Y-m-d", strtotime($item[0]));
        $cek = validationTransaction($date, $item[1], $item[4], 'transaction');
        if($cek < 1)
        {
            try {
                $sql = "INSERT INTO tr_transactions (Date,Time,Pump,UnitPrice,Litres,TotalPrice,DriverKey,DriverName) VALUES ('$date','$item[1]','$item[4]','$item[5]','$item[6]','$item[7]','$item[2]','$item[3]')";
                mysql_query($sql);
            } catch (Exception $ex) {
                die(json_encode($ex));
            }    
        }else{
            
        }
    }
    
}

if($method === 'gettank'){
    $result = $_POST['result'];
    $jsondata = json_decode($result,TRUE);
    foreach ($jsondata['result']['values'] as $item){
        
        $sql = "INSERT INTO ms_tanks (UnitNumbers,TankNumber,Volume,VolumePercent,Description,Capacity,Status,LastUpdate) VALUES ('$item[0]','$item[1]','$item[2]','$item[3]','$item[4]','$item[5]','$item[6]','$item[7]')";
        mysql_query($sql);
    }
}
//period getData default:"Current Month"
if($method === 'getString'){
    $value = 'Current Week';
    $request = json_encode(
                array (
		  'jsonrpc' => '2.0',
		  'method' => 'Transactions:Read',
		  'parameters' => 
		  array (
			'clientReference' => 'CLIENT_REFERENCE_PLACEHOLDER',
			'clientSecret' => 'CLIENT_SECRET_PLACEHOLDER',
			'period' => 
			array (
			  'type' => 'recurring',
			  'value' => $value,
			),
			'columns' => 
			array (
			  0 => 'Date',
			  1 => 'Time',
			  2 => 'Volume',
                          3 => 'Driver Authorisation',
                          4 => 'Name'  
			),
		  ),
		  'id' => '123',
		)
            );
    
    $result['request'] = $request;
    $result['apikey'] = 'PTYerryP1567';
    $result['secreetkey'] = '529163fb24688da3';
    die(json_encode($result));
}

if($method === 'tanklevel'){
    
    $request = json_encode(
            array(
                'jsonrpc' => '2.0',
		'method' => 'Tank:Level',
		'parameters' =>
                array(
                    'clientReference'=> 'CLIENT_REFERENCE_PLACEHOLDER',
                    'clientSecret' => 'CLIENT_SECRET_PLACEHOLDER',
                    'columns' => 
                    array(
                        0 => 'Unit Number',
                        1 => 'Tank Number',
                        2 => 'Volume',
                        3 => 'Volume Percent',
                        4 => 'Description',
                        5 => 'Capacity',
                        6 => 'Status',
                        7 => 'Last Updated'
                    ),
                ),
                'id' => '123'
            )
            );
    $result['request'] = $request;
    $result['apikey'] = 'PTYerryP1567';
    $result['secreetkey'] = '529163fb24688da3';
    die(json_encode($result));
}

function validationTransaction($param1,$param2,$param3,$param4){
    if($param4 == 'transaction')
    {
        $sql = "SELECT * FROM tr_transactions WHERE Date='$param1' AND Time='$param2' AND Pump='$param3'";
        $query = mysql_query($sql);
        $total = mysql_num_rows(mysql_query($sql));
        return $total;
    }else {
        
    }
}
//Select All Data
function load_transaction(){
    
    $sql = "SELECT * FROM tr_transactions ORDER BY TransactionID DESC";
    $query = mysql_query($sql);
    $data = array();
    while ($row = mysql_fetch_object($query)){
        $data[]=$row;
    }
    $result['data'] = $data;
    return $result;
}

function load_apikey(){
    $sql = "SELECT * FROM ms_key";
    $query = mysql_query($sql);
    $data = array();
    while ($row = mysql_fetch_object($query)){
        $data[] = $row;
    }
    $result['data'] = $data;
    return $result;
}

function grafik_tank(){
     $sql = "SELECT * FROM ms_tanks ORDER BY tankID DESC";
     $query = mysql_query($sql);
     $data = array();
     while ($row = mysql_fetch_array($query)){
         $data[]=$row['UnitNumbers'];
     }
     
     return $data;
 }
?>
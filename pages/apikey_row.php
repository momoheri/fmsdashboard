<?php
    include '../includes/session.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM ms_key WHERE idKey = '$id'";
        $query = mysql_query($sql);
        $result = mysql_fetch_array($query);
        //$data = array();
        /*while($row = mysql_fetch_array()){
            $data[]=$row;
        }*/
        echo json_encode(array('idkey' => $result['idKey'],'apikey' => $result['apiKey'],'secretkey' => $result['secretKey']));
    }
?>

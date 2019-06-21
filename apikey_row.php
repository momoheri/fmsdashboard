<?php
    include 'includes/session.php';
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM ms_key WHERE idKey = '$id'";
        $query = mysql_query($sql);
        $data = array();
        while ($row = mysql_fetch_object($query)){
            $data[]=$row;
        }
        $result['data'] = $data;
        die(json_encode($result));
    }
?>


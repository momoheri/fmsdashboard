<?php include 'includes/conn.php'; 

 function load_tanks(){
     $sql = "SELECT * FROM ms_tanks ORDER BY tankID DESC";
     $query = mysql_query($sql);
     $data = array();
     while ($row = mysql_fetch_object($query)){
         $data[]=$row;
     }
     $result['data'] = $data;
     return $result;
 }
 
 
?>



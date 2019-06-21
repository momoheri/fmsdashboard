<?php include '../includes/conn.php';

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

 function grafik_tank(){
      $sql = "SELECT * FROM ms_tanks ORDER BY tankID DESC";
      $query = mysql_query($sql);
      $data = array();
      while ($row = mysql_fetch_array($query)){
          $data[]=$row['UnitNumbers'];
      }

      return $data;
  }
  
  function getUsers(){
      $sql = "SELECT * FROM ms_users ORDER BY UserID DESC";
      $query = mysql_query($sql);
      $data = array();
      while ($row = mysql_fetch_object($query)){
          $data[]=$row;
      }
      $result['data'] = $data;
      return $result;
  }
?>

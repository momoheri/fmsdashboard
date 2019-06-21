<?php
session_start();
include '../includes/conn.php';

if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
    header('location: index.php');
}

$sql="SELECT * FROM ms_users WHERE UserID = '".$_SESSION['admin']."'";
$query = mysql_query($sql);
$user = mysql_fetch_object($query);
?>

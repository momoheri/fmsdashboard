<?php
error_reporting(E_ERROR);
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "fmsdata";

mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
?>

<?php
$conn = new mysqli('localhost', 'root','', 'fmsdata');

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>

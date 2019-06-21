<?php
include '../includes/session.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $apireference = $_POST['apikey'];
    $apisecret = $_POST['secretKey'];
    
    $sql = "UPDATE ms_key SET apiKey = '$apireference', secretKey = '$apisecret' WHERE idKey = '$id'";
    if(mysql_query($sql)){
        $_SESSION['success'] = 'Update Successfully';
    } else {
        $_SESSION['error'] = 'Error';
    }
}else{
    $_SESSION = 'Select API Reference to edit first';
}
header('location: ../pages/apikey.php');

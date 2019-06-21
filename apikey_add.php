<?php
include 'includes/session.php';

if(isset($_POST['add'])){
    $apireference = $_POST['apireference'];
    $apisecret = $_POST['apisecret'];
    
    $sql = "INSERT INTO ms_key (apiKey,secretKey,CreatedDate) VALUES ('$apireference','$apisecret', NOW())";
    mysql_query($sql);
}else{
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: apikey.php');

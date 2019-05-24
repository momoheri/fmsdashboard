<?php
session_start();
include 'includes/conn.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM ms_users where Username = '$username'";
    $query = $conn->query($sql);
    
    if($query->num_rows < 1){
        $_SESSION['error'] = 'Cannot find account with the username';
    }
    else{
        $row = $query->fetch_assoc();
        //if(password_verify($password, $row['Password'])){
        if($row['Password']){    
            $_SESSION['admin'] = $row['UserID'];
        }
        else
        {
            $_SESSION['error']='Incorrect Password';
        }
    }
}
else{
    $_SESSION['error']='Input admin credentials first';
}

header('location: index.php');
?>
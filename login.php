<?php
session_start();
include 'includes/conn.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM ms_users where Username = '$username'";
    $query = mysql_query($sql);
    $total = mysql_num_rows(mysql_query($sql));
    if($total<1){
        $_SESSION['error'] = 'Cannot find account with the username';
    }
    else{
        $row = mysql_fetch_object($query);
        //if(password_verify($password, $row['Password'])){
        if($row->Password){    
            $_SESSION['admin'] = $row->UserID;
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
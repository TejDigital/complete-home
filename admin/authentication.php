<?php
session_start();
if(!$_SESSION['auth'])
{
    $_SESSION['auth_msg'] = "login to access Dashboard";
    header('location:adminlogin.php');
    exit(0);
}
else
{
    if($_SESSION['auth']== "1"){
    }
    else{
        $_SESSION['alert_msg'] = "you are not authorized as admin";
        header('location:../none.php');
        exit(0);
    }
}
?>
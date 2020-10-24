<?php
session_start();

if(!isset($_SESSION['login_user']))
{
    header('location:login.php');
}
if(isset($_SESSION['login_user']))
{
    if($_SESSION['login_user']['rname'] == "customer")
    {
        header('location:index.php');
    }
}
require 'db_connect.php';

$id = $_POST['id'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];
$currentPassword = $_POST['currentPassword'];

$qry = "SELECT password FROM users WHERE id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();
$realPassword = $stmt->fetch()[0];

if($currentPassword == $realPassword)
{
    if($newPassword == $confirmPassword)
    {
        $upd_qry = "UPDATE users set password = :pass WHERE id = :id";
        $stmt = $conn->prepare($upd_qry);
        $stmt->bindParam(':pass',$newPassword);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        session_start();
        $_SESSION["change_success"] = "your password has been change successfully";
        header('location:change_password.php');
    }
    else
    {
        session_start();
        $_SESSION["psw_wrong"] = "password are not match";
        header('location:change_password.php');
    }
}
else{
    session_start();
    $_SESSION["cur_wrong"] = "current password wrong!";
    header('location:change_password.php');
}
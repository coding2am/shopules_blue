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

$id = $_GET['uid'];

$qry = "DELETE FROM users WHERE id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();

$qry = "DELETE FROM model_has_roles WHERE user_id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:user_list.php');
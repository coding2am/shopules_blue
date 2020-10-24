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

$id = $_GET['oid'];
$status = "confirm";

$sql = "UPDATE orders SET status=:v1 WHERE id = :v2";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':v1',$status);
$stmt->bindParam(':v2',$id);
$stmt->execute();

header('location:order_list.php');
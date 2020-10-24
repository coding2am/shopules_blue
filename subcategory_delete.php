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
require("db_connect.php");

$id = $_GET['scid'];
$qry = "DELETE FROM subcategories WHERE id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();
header('location:subcategory_list.php');
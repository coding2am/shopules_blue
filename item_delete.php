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

$id = $_GET['itemId'];


//deleting photo data
$photo_select = "SELECT photo FROM items WHERE id=:id";
$stmt = $conn->prepare($photo_select);
$stmt->bindParam(':id',$id);
$stmt->execute();
$photo = $stmt->fetch();

unlink($photo[0]);

$qry = "DELETE FROM items WHERE id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();
header('location:item_list.php');
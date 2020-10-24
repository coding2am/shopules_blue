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
require('db_connect.php');

$id = $_POST['realID'];
$name = $_POST['name'];
$category_id = $_POST['category'];

//var_dump($category_id);
//var_dump($name);

$qry = "UPDATE subcategories SET name=:name,category_id=:category_id WHERE id=:id ";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':category_id',$category_id);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:subcategory_list.php');

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
require ("db_connect.php");

$name = $_POST['name'];
$select = $_POST['category'];

$sql_qry = "INSERT INTO subcategories (name,category_id) VALUES (:name,:category_id)";
$stmt = $conn->prepare($sql_qry);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':category_id',$select);
$stmt->execute();

header("location:subcategory_list.php");

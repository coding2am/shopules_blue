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

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$old_photo = $_POST["oldPhoto"];
$new_photo = $_FILES["newPhoto"];

if($new_photo['size'] > 0)
{
    $photo = $new_photo;
    $basePath = "image/user/";
    $fullPath = $basePath.$new_photo["name"];
}
else{
    $photo = $old_photo;
    $fullPath = $old_photo;
}
move_uploaded_file($photo["tmp_name"],$fullPath);

$qry = "UPDATE users set name = :name ,profile= :profile, email = :email, phone = :phone, address= :address     
        WHERE id = :id ";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':profile',$fullPath);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':address',$address);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:profile.php');

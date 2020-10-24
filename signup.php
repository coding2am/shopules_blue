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
require "db_connect.php";

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$address = $_POST["address"];
$profile = "image/user/user.png";
$role_id = 2;
$status = 0;

if($password == $cpassword)
{

    if($name = "" || $phone = "" || $email = "" || $address = "")
    {

        echo "register";
        $sql = "INSERT INTO users (name,profile,email,password,phone,address,status) VALUES(:v1,:v2,:v3,:v4,:v5,:v6,:v7)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':v1',$name);
        $stmt->bindParam(':v2',$profile);
        $stmt->bindParam(':v3',$email);
        $stmt->bindParam(':v4',$password);
        $stmt->bindParam(':v5',$phone);
        $stmt->bindParam(':v6',$address);
        $stmt->bindParam(':v7',$status);
        $stmt->execute();

        //userId
        $last_id = $conn->lastInsertId();
        $sql = "INSERT INTO model_has_roles (user_id,role_id) VALUES (:v1, :v2)";
        $stmt =  $conn->prepare($sql);
        $stmt->bindParam('v1',$last_id);
        $stmt->bindParam('v2',$role_id);
        $stmt->execute();


        session_start();
        $_SESSION["reg_success"] = "Register success!";

        header('location:login.php');
    }
    else
    {
        session_start();
        $_SESSION["fill_requirements"] = "Please fill the all require fields";
        header('location:register.php');
    }
}
else
{
    session_start();
    $_SESSION["pass_notmatch"] = "Password are not match!";
    header('location:register.php');
}
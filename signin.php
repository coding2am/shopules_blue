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
session_start();

$email = $_POST["email"];
$password = $_POST["password"];


$sql = "SELECT users.*, roles.name as rname FROM users 
			INNER JOIN model_has_roles 
			ON users.id = model_has_roles.user_id
			INNER JOIN roles
			ON model_has_roles.role_id = roles.id
			WHERE email = :v1 AND password = :v2";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':v1', $email);
$stmt->bindParam(':v2', $password);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowCount() <= 0)
{
    //setting login count
    if(!isset($_COOKIE['logincount'])){
        $loginCount = 1;
    }
    else{
        $loginCount= $_COOKIE['logincount'];
        $loginCount++;
    }

    setcookie("logincount", $loginCount, time()+10);

    //checking login count
    if ($loginCount >= 3) {

        //echo "<img src='frontend/image/download.png' style='width:100%, height:100vh; object-fit:cover'>";
        echo "<h1 style='text-align: center; color:red; margin:200px 0;'>Please wait you failed the login too many times!</h1>";
        setcookie('logincount','',time()-10);

        echo "<script type=\"text/javascript\">
				(function(){
					setTimeout(function(){
						location.href='login.php';
					},10000);
				})(); 
				</script>";

    }
    else{
        $_SESSION['login_fail'] = 'Your current email and password is invalid';
        header('location:login.php');

    }

}
else
{
    //success
    $_SESSION['login_user'] = $user;
    $role = $user['rname'];

    if($role == "customer")
    {
        if (isset($_SESSION['cartURL'])) {
            header("location:".$_SESSION['cartURL']);
        }else{
            header('location:index.php');
        }
    }
    else{
        header('location:item_list.php');
    }

}
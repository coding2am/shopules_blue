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
session_start();
require ("db_connect.php");

$cart = $_POST['cart'];
$note = $_POST['notes'];
$total = $_POST['total'];

//var_dump($cart);


date_default_timezone_set("Asia/Rangoon");
$order_date = date('Y-m-d');
$voucher_no =   strtotime(date("h:i:s"));
$status = "order";
$user_id = $_SESSION['login_user']['id'];

$sql = "INSERT INTO orders (order_date, voucherno, total, note, status, user_id) VALUES(:value1, :value2, :value3, :value4, :value5, :value6)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':value1', $order_date);
$stmt->bindParam(':value2', $voucher_no);
$stmt->bindParam(':value3', $total);
$stmt->bindParam(':value4', $note);
$stmt->bindParam(':value5', $status);
$stmt->bindParam(':value6', $user_id);
$stmt->execute();

$last_id = $conn->lastInsertId();

foreach ($cart as $key => $value) {
    $id = $value['id'];
    $qty = $value['qty'];

    $sql = "INSERT INTO item_order (qty, item_id, order_id) VALUES (:value1, :value2, :value3)";
    $stmt  = $conn->prepare($sql);
    $stmt->bindParam(':value1', $qty);
    $stmt->bindParam(':value2', $id);
    $stmt->bindParam(':value3', $last_id);
    $stmt->execute();

}

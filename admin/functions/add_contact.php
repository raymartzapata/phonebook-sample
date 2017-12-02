<?php
session_start();
if(empty($_SESSION['ID'])):
header('Location:../index.php');
endif;
include('../database/connection.php');
$epr='';
    if(isset($_GET['epr']))
        $epr=$_GET['epr'];
    if(isset($_POST['submit'])){
        $target = "../image/".basename($_FILES['image']['name']);
        
    if($epr =='save'){
    $image = $_FILES['image']['name'];
    $cname = $_POST['cname'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $user_ID = $_SESSION['ID'];
    $query = "INSERT INTO contact (image, cname, phone_number, address, user_ID)
    VALUES ('$image', '$cname', '$number', '$address', '$user_ID')";
    mysqli_query($conn,$query);
        }
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "<script>alert('Successfully Added'); window.location.href='../pages/phonebook.php';</script>";
    }else{
        echo "<script>alert('Problem inserting to database!'); window.location.href='../pages/phonebook.php';</script>";
    }
  }
?>


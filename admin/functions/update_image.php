<?php
session_start();
if(empty($_SESSION['ID'])):
header('Location:../index.php');
endif;
include('../database/connection.php');
$epr='';
$msg='';
if(isset($_GET['epr']))
$epr=$_GET['epr'];
$target = "../image/".basename($_FILES['image']['name']);
 // variables for input data
if($epr == 'updateimage'){
$id = $_SESSION['ID'];
$image = $_FILES['image']['name'];
 
 // sql query for update data into database
$query = "update user set image='$image' where ID='$id'";
mysqli_query($conn,$query);
}           
if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
echo "<script>alert('Successfully change'); window.location.href='../pages/account.php';</script>";
}else{
echo "<script>alert('Error updating to database!'); window.location.href='../pages/account.php';</script>";
    }       
?>
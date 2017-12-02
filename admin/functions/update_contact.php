<?php
include('../database/connection.php');
    $epr='';
    $msg='';
    if(isset($_GET['epr']))
    $epr=$_GET['epr'];

 // variables for input data
if($epr == 'updateup'){
 $id = $_POST['idtextbox'];
 $name = $_POST['name'];
 $number = $_POST['number'];
 $address = $_POST['address'];
 
 // sql query for update data into database
 $query = mysqli_query($conn,"UPDATE contact SET cname = '$name', phone_number = '$number', address = '$address' WHERE ID = '$id'");

 if($query){
    echo '<script type="text/javascript">alert("Update Successful!"); window.location.href="../pages/phonebook.php"</script>';
 }
 else{
    $msg = 'Error' .mysql_error();
 }
}
?>
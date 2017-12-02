<?php session_start();
if(empty($_SESSION['ID'])):
header('Location:../index.php');
endif;
include('../database/connection.php');
$epr='';
if(isset($_GET['epr']))
$epr=$_GET['epr'];

 // variables for input data
if ($epr == 'update'){
    $id = $_SESSION['ID'];
    $hname = $_POST['hname'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
 
    $query = mysqli_query($conn,"update hotel_registration set hotel_name='$hname', description='$description', address='$address', postal_code='$postal_code', contact_number='$contact_number', email_address='$email_address' where account_ID='$id'");
    if($query == null){   
    echo '<script type="text/javascript">alert("Error updating to database!"); window.location.href="../pages/hotelprofile.php"</script>';
    }
    else{
        echo "<script>alert('Successfully changes'); window.location.href='../pages/hotelprofile.php';</script>";
    }
}
?>
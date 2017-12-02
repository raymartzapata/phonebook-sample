<?php
    include('admin/database/connection.php');
    $epr='';
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_GET['epr']))
        $epr=$_GET['epr'];
    if(isset($_POST['submit'])){
        $target = "admin/image/".basename($_FILES['image']['name']);

//Declaration
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
//Select hotel name if available
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name'");
    if(mysqli_num_rows($sql) > 0){
    echo '<script type="text/javascript">alert("Name already exist!"); window.location.href="index.php"</script>';
    }
    else{
    $query = "INSERT INTO user (name, address, phone_number, username, password, image) VALUES ('$name', '$address', '$phone_number', '$username', '$password', '$image');";
    mysqli_query($conn,$query);
        }
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "<script>alert('Congratulations! Your account is successfully created.'); window.location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('Problem inserting to database'); window.location.href='index.php';</script>";
    }
}
?>


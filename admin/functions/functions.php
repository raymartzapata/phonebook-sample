<?php

  function news_upload()
  {
    include '../database/connection.php'
    $epr='';
    if(isset($_GET['epr']))
        $epr=$_GET['epr'];
    if(isset($_POST['submit'])){
        $target = "../image/".basename($_FILES['image']['name']);
        

    if($epr =='save'){
    $header = $_POST['header'];
    $subheader = $_POST['subheader'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $date_created = $_POST['date_created'];
    $image = $_FILES['image']['name'];
    $location = $_POST['location'];
    $query = "INSERT INTO news (header, subheader, author, content, date_created, image, location)
    VALUES ('$header', '$subheader', '$author', '$content', '$date_created', '$image', '$location')";
    mysqli_query($conn,$query);
        }
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "<script>alert('Successful'); window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('Problem in inserting news!'); window.location.href='news.php';</script>";
    }
  }
}

?>
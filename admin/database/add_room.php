<?php
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "school";

    $conn = mysqli_connect($servername, $user, $pass, $dbname);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_POST) {
    $room = $_POST['room'];

    $sql = "INSERT INTO room (room) values ('$room')";

    if (mysqli_query($conn, $sql)) {
        
        echo '<script type="text/javascript">alert("Add Successful!"); window.location.href="../pages/room.php"</script>';
    //header ("Location: ../index.html");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
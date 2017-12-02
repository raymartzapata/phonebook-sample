<?php
	$servername = "localhost";
	$user = "root";
    $pass = "";
    $dbname = "phonebook";

    $conn = mysqli_connect($servername, $user, $pass, $dbname);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
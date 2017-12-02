<?php 
function getdatachart($sy){
	$servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "school";

    $conn = mysqli_connect($servername, $user, $pass, $dbname);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	$sel = mysql_query("SELECT * FROM year_level");

	while($row=mysql_fetch_assoc($sel)){
		extract($row);
		$sel2 = mysql_query("SELECT * from student_year_level where year_id='$year_id' and schoolyear='$sy' ");
		$num = mysql_num_rows($sel2);
		$data[] = array('y'=>$year_level,'a'=>$num);
	}

	echo json_encode($data);
}

?>
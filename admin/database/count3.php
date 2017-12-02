<?php
mysql_connect("localhost", "root", "");
mysql_select_db("school");

$users_stud = mysql_query("SELECT count(*) from student");
while ($row = mysql_fetch_assoc($users_stud)) {
$count3 = $row['count(*)'];
}            

?>
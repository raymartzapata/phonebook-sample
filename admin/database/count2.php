<?php
mysql_connect("localhost", "root", "");
mysql_select_db("school");

$users_direc = mysql_query("SELECT count(*) from teacher");
while ($row = mysql_fetch_assoc($users_direc)) {
$count2 = $row['count(*)'];
}            

?>
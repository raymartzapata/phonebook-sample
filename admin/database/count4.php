<?php
mysql_connect("localhost", "root", "");
mysql_select_db("school");

$room = mysql_query("SELECT count(*) from room");
while ($row = mysql_fetch_assoc($room)) {
$count4 = $row['count(*)'];
}            

?>
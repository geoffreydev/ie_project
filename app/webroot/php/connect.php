<?php
$host="localhost"; // Host name 
$username="sirucci"; // Mysql username
$password="Sirucci4tw"; // Mysql password
$db_name="cakedb"; // Database name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
?> 
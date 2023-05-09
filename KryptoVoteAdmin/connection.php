
<?php

define("HOST",'localhost');
define("PASSWORD",'');
define("USERNAME","root");
define("DB","kryptovotesystem");

$connection=@mysqli_connect(HOST,USERNAME,PASSWORD,DB);

if(!$connection)
{
	die("NOT Connected....");
}
else
{
echo"Connected";
	
}
mysqli_select_db($connection, DB) or die(mysql_error());


?>
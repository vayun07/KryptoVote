
<?php
/*
define("HOST",'eu-cdbr-azure-west-b.cloudapp.net');
define("PASSWORD",'5d36efeb');
define("USERNAME","bb671e4f5b9eb5");
define("DB","krptovotesystem");

$connection=@mysqli_connect(HOST,USERNAME,PASSWORD,DB); */
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
//echo"Connected";
	
}

mysqli_select_db($connection, DB) or die(mysql_error());

?>
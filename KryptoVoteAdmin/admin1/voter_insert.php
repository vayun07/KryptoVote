<?php

if(isset($_POST['btn_submit']))
{
	$name=$_POST['txt_name'];
	$id=$_POST['txt_voter_id'];
	$contact=$_POST['txt_contact'];
	
   
 
 //to connect to server and select database
include('../connection.php');



$query="INSERT INTO insert_voter(voter_id, name, contact) values ('$id', '$name', '$contact')";

	 $execute=mysqli_query($connection, $query);
	
	if(!$execute)
	{
		//die("Could not insert the data..");
		echo 'alert(Not executed)';
		header("Location:addvoter.html");
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Voter has been added")';
		echo '</script>';
	header("Location:view_voter.php");
		
	}
}
else
{
	echo("is button not post");
}
?>
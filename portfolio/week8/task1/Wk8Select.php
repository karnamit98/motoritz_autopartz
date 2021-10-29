<?php 
	error_reporting(E_ALL); 
	include '../../connection.php';
	$query="SELECT * FROM events where eventCategory='workshop'"; 	//Error: e of EventCategory was capitl 
	 
	$result=mysqli_query($connection, $query); //Error: misssing i after mysql
	 
	while($row=mysqli_fetch_assoc($result))	//Error: misssing i after mysql
	{  
		//Error: txtName and txtCategory instead of eventName and eventCategory resp.
		echo $row['eventName'].' '.$row['eventCategory'].'<br />'; 
		
	} 
?> 
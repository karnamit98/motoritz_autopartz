<?php 
	error_reporting(E_ALL); 
	include '../../connection.php'; 
	if (isset($_POST['subEvent']))		//Error: submit instead of subEvent
	{  
		$name=$_POST['txtName'];  
		$pass=$_POST['txtCategory'];      //Error: c was small in txtcategory
		$query="INSERT INTO events    VALUES  (NULL, '$name','$pass')";   //excluded the attribute names from query 
		$bool = mysqli_query($connection, $query);  
		if($bool)
			echo "Query Inserted!";
		else	
			echo "<b style='color:red'>Query Insertion Failed!!</b>"; 
		header('location:Wk8Recap.php');   
	} 
	 
?> 
<?php error_reporting(E_ALL);?> 
<!DOCTYPE html> 
<html>  
	<head>   
		<link type="text/css" rel="stylesheet" href="../style.css"/>   
		<title>Result</title>  
	</head>  
	<body>   
		<small style="float:right;margin-right:25px"> <a href="../../../watIndex.php">Back to Home</a></small> 
        <br /><b>Student ID:</b> c7202634 <br /> 
                <b>Name:</b> Amit Kumar Karn
        <hr />	

		<h1>Insert a record</h1>   
		<form method="POST" action="Wk8Insert.php" enctype="multipart/form-data">        
			<input type="text" name="txtName" placeholder="Name" />    
			<br />    
			<input type="text" name="txtCategory" placeholder="Category" />    
			<br />    
			<input type="submit" value="Submit" name="subEvent" />   
		</form>   
		<?php      
		//display results   
		/*if(isset($_POST['subEvent']))
		{
			echo "<br /><hr />";
			include 'Wk8Insert.php';
		}*/
		echo "<br /><hr />";
		include 'Wk8Select.php';  //Error: w in wk8Select.php was small
		echo "<br /><br />";    
		?>  
	</body> 
</html> 
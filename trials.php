<?php
include 'maconnection.php';

//$query = "INSERT INTO category (cat_name) VALUES ('Accelerator')";
$result = mysqli_query($connection, $query);
if($result)
{
$last_id = mysqli_insert_id($connection);
echo $last_id;
}
else
{
	echo 'failed!';
}


?>
<<?php 
    //Make connection to database 
    include '../../connection.php';
    //Gather data sent from AmendProducts.php page 
    if(isset($_POST['ammendsubmit']))
    {
        $id = $_POST['hiddenproductid'];
        $name = $_POST['newprdname'];
        $price = $_POST['newprdprice'];
        $image = $_POST['newprdimagename'];
    }
    
    //Produce an update query to update product record for the id provided 
    $query = "UPDATE products SET productname = '$name', 
        productprice = '$price', 
        productimagename = '$image' 
        where productid = $id";
    
    //run query  
    mysqli_query($connection, $query);
    
    //Redirect to watWk8.php page 
    header( 'Location: watWk8.php' ) ; 
    
?>
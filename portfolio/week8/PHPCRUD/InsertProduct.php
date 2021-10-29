<?php 
    //Make connection to database 
    include '../../connection.php';
    
    //Gather from $_POST[]all the data submitted and store in variables 
    if(isset($_POST['btnsubmit']))
    {
        //product name
        $name = $_POST['prdname'];      
        if(empty($name))
            echo "<b style='color:red'>Product Name must be entered!!<br />";
        
        //product price
        $price = $_POST['prdprice'];
        if(empty($price))
            echo "Product Price must be entered!!<br />";
        //product image filename
        $imagefile = $_POST['prdimagename'];
        if(empty($imagefile))
            echo "Product Image Filename must be entered!!</b><br />";
    }
    
    //Construct INSERT query using variables holding data gathered 
    $query = "INSERT INTO products VALUES (NULL, '$name', '$price', '$imagefile')";
    
    //run $query 
    $result = mysqli_query($connection, $query);
    if($result)
        echo "Query Inserted!";
    else    
        echo "<b style='color:red'>Query Insertion Failed!!</b>";
    
    //return to calling page(stored in the server variables) 
    header("Location: {$_SERVER['HTTP_REFERER']}"); 
    
?> 


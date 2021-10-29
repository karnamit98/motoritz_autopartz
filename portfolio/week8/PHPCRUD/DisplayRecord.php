<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel='stylesheet' type='text/css' href="../style.css" />
        <title>Display Records</title>
        <style>
            table {
                border-collapse: collapse;
                margin-left:30px;
            }

            table, th, td, th {
                border: 2px solid #4b8e8d;
                padding:10px 30px 10px 30px;
            }
        </style>
    </head>
    <body>
        <h2 style="color:#e25822;text-align:center;">Product Details </h2>
        
        <?php 
            //Make connection to database 
            include '../../connection.php';
            //create a query to select all records from customer table 
            $query = "SELECT * FROM products";      //writing query to select all columns from product table
            //run query and store the result in a variable called $result 
            $result = mysqli_query($connection, $query);    //running the query to connected database
            //Use a while loop to iterate through your $result array and display //ProductName, ProductPrice, ProductImageName. 
        ?>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Ammend</th>
                <th>Delete</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<tr>';
                    echo '<td>'.$row['productid']. '</td>';
                    echo '<td>'.$row['productname']. '</td>';
                    echo '<td>'.$row['productprice']. '</td>';
                    echo '<td><img alt ="'.$row['productimagename'].'" src="images/'.$row['productimagename']. '" /> </td>';
                    echo '<td> <a href="AmmendProduct.php?id= '. $row['productid'].'">Ammend</a></td>';
                    echo '<td><a href="DeleteProduct.php?id= '. $row['productid']. '">Delete</a></td>';
                    echo '</tr>';
                }
            ?> 
        </table>       
        <br />
        
    </body>
</html>

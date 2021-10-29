<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel='stylesheet' type='text/css' href="../style.css" />
        <title>Ammend Product</title>
        <style>
            fieldset{
                border: 2px solid #4b8e8d;
                padding:0px 0px 20px 50px;
            }
        </style>
    </head>
    <body>
        <small style="float:right;margin-right:25px"> <a href="../../../watIndex.php">Back to Home</a></small> 
        <br /><b>Student ID:</b> c7202634 <br /> 
        <b>Name:</b> Amit Kumar Karn
        <hr />

        <?php
            //Make connection to database
            include '../../connection.php';                         
            //Gather id sent from watWk8.php page
            if(isset($_GET['id']))                                   
            {
                $id = $_GET['id'];                                             
                //Produce query to select the product record for the id provided
                $query = "SELECT * FROM products where productid = $id";        
                //run query and store result
                $result = mysqli_query($connection, $query);                    
                //extract row from result using mysqli_fetch_assoc()and store $row
                while($row = mysqli_fetch_assoc($result))                       
                {

        ?>
        

        <form method="POST" action="UpdateProduct.php" enctype="multipart/form-data">
            <fieldset>
                <legend style="color:#e25822"><h2>Enter Product Details</h2></legend>
                <input type="hidden" name="hiddenproductid" value="<?php echo $row['productid']; ?> " />
                <br />
                <label for="newprdname" >Product Name: &nbsp;</label>&nbsp; 
                <input type="text" name="newprdname" value="<?php echo $row['productname'];  ?>" />
                <br />
                <br />
                <label for="newprdprice">Product Price:</label>&nbsp; &nbsp;&nbsp;
                <input type="text" name="newprdprice" value="<?php echo $row['productprice']; ?>" />
                <br />
                <br />
                <label for="newprdimagename">Image Filename:</b></label>
                <input type="text" name="newprdimagename" value="<?php echo $row['productimagename']; ?>" />
                <br />
            </fieldset><br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Submit" name="ammendsubmit" /> &nbsp;
            <input type="reset" value="Clear" name="btnclear" /><br /><br />
        </form>

        <?php
                }
            }
        ?>
        
    </body>
</html>


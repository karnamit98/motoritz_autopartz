<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel='stylesheet' type='text/css' href="../style.css" />
        <title>PHP CRUD</title>
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

        <h1 style="color:#f0134d;"> Manage Products</h1>
        <hr />
        <?php
            include 'DisplayRecord.php';
        ?>
        <br /><hr />
        <form method="POST" action="InsertProduct.php" enctype="multipart/form-data">
            <fieldset>
                <legend style="color:#e25822"><h2> Enter New Product Details</h2></legend>
                <br /><label for="prdname"><b>Product Name:</label><br />
                <input type="text" name="prdname" value="<?php if(isset($_POST['prdname']))
                                                            { echo $_POST['prdname'];} ?>" />
                <br />
                <br />
                <label for="prdprice">Price:</label><br />
                <input type="text" name="prdprice" value="<?php if(isset($_POST['prdprice']))
                                                            { echo $_POST['prdprice'];} ?>" />
                <br />
                <br />
                <label for="prdimagename">Image Filename:</b></label><br />
                <input type="text" name="prdimagename" value="<?php if(isset($_POST['prdimagename']))
                                                            { echo $_POST['prdimagename'];} ?>" />
                <br />
                <br /> &nbsp; &nbsp;
                <input type="submit" value="Submit" name="btnsubmit" />
                &nbsp; 
                <input type="reset" value="Clear" name="btnclear" />
                <br />
            </fieldset>
        </form>
        <br />
    </body>
</html>

<?php 

?>
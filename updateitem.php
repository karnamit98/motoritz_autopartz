<?php
    include 'check_session.php';
    include 'maconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Motoritz Autopartz</title>
        <!--Bootstrap Core CSS-->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" / >
        <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"-->
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="css/adminstyle.css" />
        <!--Bounce In css-->
        <link rel="stylesheet" type="text/css" href="css/bouncein.css" />
        <!-- jQuery Version 1.11.0 -->
        <script src="bootstrap/js/jquery-3.4.1.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="bootstrap/js/bootstrap.js"></script>
        
        <!--Font Awesome Kit Code-->
        <script src="https://kit.fontawesome.com/86641d4077.js" crossorigin="anonymous"></script>
        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nova+Square&display=swap" rel="stylesheet" />
        <style>
            body{
                padding-bottom:5vh;
            }
            #mitem{
                color:#e4f9ff;
            }
            .itemselect a{
                color:#484c7f;
                text-shadow:0 0 1px #1b262c !important;
            }
            a#mgitem {
                color: #ff6464;
                border-bottom:2px solid #3282b8;
                padding-bottom:3px;
            }
            .itemselect a:hover{
                color: #ff6464;
                text-shadow:0 0 2px #1b262c !important;
                border-bottom:2px solid #3282b8 !important;
            }
            fieldset{
                border: 2px solid #4b8e8d;
                padding:0px 0px 20px 50px;
            }
        </style>
        
</head>
<body>
    <header>
      <?php  include 'adminpagesidebar.php'; ?>
    </header>
    
    <main>
        <?php
         
            echo '<h2 class="text-right text-muted pt-3 mr-3"><i class="fas fa-portrait text-info"></i> '.ucfirst($admin_row['first_name']).' '.ucfirst($admin_row['last_name']).'</h2>';
          
            $iquery = "SELECT * FROM item";
            $iquery_result = mysqli_query($connection, $iquery);

        ?>

        <!-- SELECT WHETHER TO VIEW OR ADD NEW ITEM -->
        <div class="btn-group itemselect ml-1" >
            <a id="mgitem"  href="manageitem.php" class="mr-2">Existing Items</a>
            <a  id="aitem" href="additem.php">Add New Item</a>
        </div>

        <div id="cruditem" class="container pt-3">
             <?php 
            if(isset($_GET['id']))                                   
            {
                $id = $_GET['id'];                                             
                //Produce query to select the item record for the id provided
                $query = "SELECT * FROM item where item_id = $id";        
                //run query and store result
                $result = mysqli_query($connection, $query);                    
                //extract row from result using mysqli_fetch_assoc()and store $row
                
                //getting brand name
                $bquery = "SELECT item.brand_id, brand_name FROM brand INNER JOIN item ON brand.brand_id = item.brand_id WHERE item.item_id = $id";
                $bresult = mysqli_query($connection, $bquery);
                $brow = mysqli_fetch_assoc($bresult);

                //getting category name
                $cquery = "SELECT category.cat_id, cat_name FROM category INNER JOIN item_category ON category.cat_id = item_category.cat_id 
                            INNER JOIN item ON item_category.item_id = item.item_id WHERE item.item_id = $id";
                $cresult = mysqli_query($connection, $cquery);
                $crow = mysqli_fetch_assoc($cresult);
                
                while($row = mysqli_fetch_assoc($result))                       
                {

            ?>
            <form method="POST" action="updateitemload.php" enctype="multipart/form-data" class="pt-0">
                <fieldset class="pl-4 pr-4 ">
                    <legend><h3 class=" text-success"> UPDATE ITEM </h3></legend>
                    <input type="hidden" name="itemid" value="<?php echo $row['item_id']; ?> " />
                    
                    <!-- ITEM NAME -->
                    <div class="form-group text-secondary">
                        <label for="itemname">Item Name</label>
                        <input type="text" required class="form-control" name="itemname" aria-describedby="Item Name" 
                        placeholder="Item Name"  value="<?php echo $row['item_name'];  ?>" />        
                    </div>

                    <div class="row"> 
                        <!-- BRAND-->
                       <div class="col-lg-6 col-12">
                            <label for="brand" class=" text-secondary">Brand:</label>
                             <select name="brand" required class="form-control"> 
                                
                                <?php
                                    echo '<option value="'.$brow['brand_id'].'">'.ucfirst($brow['brand_name']).'</option>';
                                    $baquery = "SELECT * FROM brand";
                                    $baresult = mysqli_query($connection, $baquery);
                                    while($barow = mysqli_fetch_assoc($baresult))
                                    {
                                        echo '<option value="'.$barow['brand_id'].'">'.ucfirst($barow['brand_name']).'</option>';
                                    }
                                ?>
                            </select>
                        </div> 

                        <!--CATEGORY -->
                        <div class="col-lg-6 col-12">
                            <label for="cat" class=" text-secondary">Category:</label>
                            <select name="cat" required class="form-control" >
                                
                                <?php
                                    echo '<option value="'.$crow['cat_id'].'">'.ucfirst($crow['cat_name']).'</option>';
                                    $caquery = "SELECT * FROM category";
                                    $caresult = mysqli_query($connection, $caquery);
                                    while($carow = mysqli_fetch_assoc($caresult))
                                    {
                                        echo '<option value="'.$carow['cat_id'].'">'.ucfirst($carow['cat_name']).'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div><br />
                    
                    <div class="row">
                        <!-- ITEM PRICE -->
                        <div class="col-lg-6 col-12">
                            <div class="form-group text-secondary">
                                <label for="price">Item Price</label>
                                <input type="text" required class="form-control" name="price" aria-describedby="Item Price" 
                                placeholder="Item Price"  value="<?php echo $row['price'];  ?>" />        
                            </div>
                        </div>
                        <!-- ITEM TYPE -->
                        <div class="col-lg-6 col-12">
                            <label for="itemtype" class=" text-secondary">Item Type:</label>
                            <select name="itemtype" required class="form-control">
                                <?
                                    php if($row['item_type'] == "helmet")
                                    {
                                        echo '<option value="helmet">Helmet</option>
                                        <option value="parts">Spare Parts</option>';
                                    }
                                    else if($row['item_type'] == "parts")
                                    {
                                        echo '<option value="parts">Spare Parts</option>
                                        <option value="helmet">Helmet</option>';
                                    }
                                    else{}
                                    ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- RATE STARS -->
                        <div class="col-lg-6 col-12">
                            <label for="ratingstars" class=" text-secondary">Rate Stars:</label>
                            <select name="ratingstars" required class="form-control" >
                                <?php echo '<option value="'.$row['rating_stars'].'">'.$row['rating_stars'].'</option>'; ?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <!-- STOCK -->
                        <div class="col-lg-6 col-12">
                            <div class="form-group text-secondary">
                                <label for="stock">Stock Quantity</label>
                                <input type="text" required class="form-control" name="stock" aria-describedby="Availble Items" 
                                placeholder="Item Price"  value="<?php echo $row['stock'];  ?>" />        
                            </div>
                        </div>
                    </div>
                    
                    <!-- ITEM DESCRIPTION -->
                    <div class="form-group text-secondary">
                        <label for="itemdescription">Item Description</label>
                        <textarea class="form-control" required id="item_description" rows="4" name="itemdescription" ><?php echo $row['item_description']; ?></textarea>
                    </div>

                    <!-- ITEM IMAGE -->
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose Image File</label>
                                <input type="file" class="form-control-file " value="<?php echo $row['item_image']; ?>" name="itemimage" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary " type="submit" value="Update" name="updatesubmit" />
                    <input class="btn btn-danger " type="reset" value="Clear" name="btnclear" />
                </fieldset><br />
                
            </form>

            <?php
                    }
                }
            ?>


        </div>
    </main>

    <script>

        //Side Navbar Toggle
        $(document).ready(function(){
            $("#toggle-btn").click(function(){
                $(".nav-container").animate({
                width: "toggle"
                });
            });
        });  
    </script>
</body>
</html>
<?php
    if(isset($_POST['btnclear']))
    {

    }
?>
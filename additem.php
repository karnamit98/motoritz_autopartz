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
            a#aitem {
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
        ?>

        <!-- SELECT WHETHER TO VIEW OR ADD NEW ITEM -->
        <div class="btn-group itemselect ml-1" >
            <a id="mgitem"  href="manageitem.php" class="mr-2">Existing Items</a>
            <a  id="aitem" href="additem.php">Add New Item</a>
        </div>
            
        <div id="additem" class="container pt-3">
             <?php 
                //query for selecting item
                // $query = "SELECT * FROM item where item_id = $id";        
                // //run query and store result
                // $result = mysqli_query($connection, $query);                    
                // //extract row from result using mysqli_fetch_assoc()and store $row
                
                // //getting brand name
                // $bquery = "SELECT item.brand_id, brand_name FROM brand INNER JOIN item ON brand.brand_id = item.brand_id WHERE item.item_id = $id";
                // $bresult = mysqli_query($connection, $bquery);
                // $brow = mysqli_fetch_assoc($bresult);

                // //getting category name
                // $cquery = "SELECT category.cat_id, cat_name FROM category INNER JOIN item_category ON category.cat_id = item_category.cat_id 
                //             INNER JOIN item ON item_category.item_id = item.item_id WHERE item.item_id = $id";
                // $cresult = mysqli_query($connection, $cquery);
                // $crow = mysqli_fetch_assoc($cresult);
                
                
            $vendor = $_SESSION['session_user'];
            
            
            echo '<form method="POST" action="additemload.php?vendorid='.$vendor.'" enctype="multipart/form-data" class="pt-0">';

            ?>
                <fieldset class="pl-4 pr-4 ">
                    <legend><h3 class=" text-success"> ADD ITEM </h3></legend>
                    <input type="hidden" name="itemid" value="<?php if(isset($_POST['addsubmit'])) echo $_POST['itemid']; ?> " />
                    
                    <!-- ITEM NAME -->
                    <div class="form-group text-secondary">
                        <label for="itemname">Item Name</label>
                        <input type="text" required class="form-control" name="itemname" aria-describedby="Item Name" 
                        placeholder="Item Name"  value="<?php if(isset($_POST['addsubmit'])) echo $_POST['itemname']; ?>" />        
                    </div>

                    <div class="row"> 
                        <!-- BRAND-->
                       <div class="col-lg-6 col-12">
                            <label for="brand" class=" text-secondary">Brand:</label>
                             <select name="brand" required class="form-control" placeholder="Brand"> 
                                
                                <?php
                                    if(isset($_POST['addsubmit'])) 
                                        $currentitemid = $_POST['brand'];
                                    else
                                        echo '<option class=" text-muted" value="" >Brand</option>';
                                    $currentbrand = mysqli_query($connection, "SELECT * FROM brand, item WHERE item.brand_id = brand.brand_id 
                                                    AND item.item_id = $currentitemid");
                                    $currentbrandrow = mysqli_fetch_assoc($currentbrand);
                                    echo '<option value="'.$currentbrandrow['brand_id'].'">'.ucfirst($currentbrandrow['brand_name']).'</option>';
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
                                    if(isset($_POST['addsubmit'])) 
                                        $currentcatid = $_POST['cat'];
                                    else
                                        echo '<option value="" class=" text-muted">Category</option>';
                                    $currentcat = mysqli_query($connection, "SELECT * FROM category INNER JOIN item_category ON item_category.cat_id = category.cat_id
                                                                INNER JOIN item ON item_category.item_id = item.item_id WHERE category.cat_id = $currentcatid");
                                    $currentcatrow = mysqli_fetch_assoc($currentcat);
                                    echo '<option value="'.$currentcatrow['cat_id'].'">'.ucfirst($currentcatrow['cat_name']).'</option>';
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
                                placeholder="Item Price"  value="<?php if(isset($_POST['addsubmit'])) echo $_POST['price'];  ?>" />        
                            </div>
                        </div><br />
                        <!-- ITEM TYPE -->
                        <div class="col-lg-6 col-12">
                            <label for="itemtype" class=" text-secondary">Item Type:</label>
                            <select name="itemtype" required class="form-control">
                                <?php
                                    if(isset($_POST['addsubmit']))
                                    {
                                        if($_POST['itemtype'] == "helmet")
                                            echo '<option value="helmet">Spare Parts</option>';
                                        else if($_POST['itemtype'] == "parts")
                                            echo '<option value="parts">Spare Parts</option>';
                                        else{}
                                    }
                                    else
                                        echo '<option value="" class="disabled text-muted">Item Type</option>';
                                ?>
                                <option value="parts">Spare Parts</option>
                                <option value="helmet">Helmet</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- RATE STARS -->
                        <div class="col-lg-6 col-12">
                            <label for="ratingstars" class=" text-secondary">Rate Stars:</label>
                            <select name="ratingstars" required class="form-control" >
                                <?php 
                                    if(isset($_POST['addsubmit']))
                                        echo '<option value="'.$_POST['ratingstars'].'">'.$_POST['ratingstars'].'</option>'; 
                                    else
                                        echo '<option value="">Select Stars</option>';
                                ?>
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
                                placeholder="Available Items"  value="<?php if(isset($_POST['addsubmit'])) echo $_POST['stock'];  ?>" />        
                            </div>
                        </div>
                    </div>
                    
                    <!-- ITEM DESCRIPTION -->
                    <div class="form-group text-secondary">
                        <label for="itemdescription">Item Description</label>
                        <textarea class="form-control" required id="item_description" rows="4" name="itemdescription" placeholder="Item Description..."><?php if(isset($_POST['addsubmit'])) echo $_POST['item_description']; ?></textarea>
                    </div>

                    <!-- ITEM IMAGE -->
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose Image File</label>
                                <input type="file" class="form-control-file " value="<?php if(isset($_POST['addsubmit'])) echo $_POST['item_image']; ?>" name="itemimage" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary " type="submit" value="Add Item" name="addsubmit" />
                    <input class="btn btn-danger " type="reset" value="Clear" name="btnclear" />
                </fieldset><br />
                
            </form>

            <?php
            ?>


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
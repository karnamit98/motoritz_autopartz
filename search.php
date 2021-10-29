<?php
     session_start();
   // include 'check_session.php';
    include 'maconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and
        media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via
        file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
        html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.
        min.js"></script>
        <![endif]-->
        <title>Motoritz Autopartz</title>
        <!--Bootstrap Core CSS-->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" / >
        <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"-->
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="css/customstyle.css" />
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
        <!--Titilium webs-->
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet" />
        <!--Lobster Webs-->
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet" />
        <script src="customjs.js"></script>
        <script>

        </script>
        <style>
            html, body{
                margin:0;
                padding:0;
                overflow-x:hidden !important; 
            }
            body, header{
                font-family: 'Nova Square', cursive;
                
            }
            main{
                overflow:hidden !important; 
            }
            footer{
                /* overflow:hidden !important; */
                /* font-family: 'Titillium Web', sans-serif; */
                font-family: 'Nova Square', cursive;
            }
            .bike-bg-image{
                background-image: url('images/bikebg4.jpg');
            }
            @media (max-width: 600px)
            {
                .bike-bg-image{
                background-image: url('images/bikemobilebg1.jpg');
            }
            }
             .card:hover{
                box-shadow: 0px 0px 6px #5f6769;
            }
            .card-body a:hover {
                text-decoration:none;
                color: #3e64ff;
            }
            .card-body h5:hover{
                color: #3e64ff;
            }
            .helmets .card-title{
                color:#7c0a02;
                font-size:1.8vw;
            }
            .helmets .price{
                color:#3e64ff;
                float:right;
                font-size:1.5vw;
            }
            .helmets .card-img-top{
/*
                width:32.8vw;
                height:40vh;
*/
            }
            .card-footer{
                font-size:1.1vw;
            }
            .card-text{
                font-size:1.1vw;
            }
            .list-group-item, .card-body{
                padding:0.7vw;
            }
            
            .fa-star:hover{
                color:  #f45905;
                cursor:pointer;
            }
            .star-color-blank{
                color:  #c9d99e;
                font-size:1.8vw;
            }
            .star-color-solid
            {
                color:  #f45905;
                font-size:1.8vw;
            }
            .particon{
                width: 6vw;
                height: 5vh;
                position: relative;
                left: 46vw;
                filter: drop-shadow(1px 1px 3px #000);
            }
            a:hover{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <!--Header Section-->
        <header>
            <!--Top Header-->
            <?php include 'topnav.php' ?>
            <!-- Navigation -->
            <nav role="navigation" class="navbar navbar-expand-lg navbar-default navbar-light bg-light static-top 
            navbar-main " >
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/logopng.png" alt="motoritz autopartz logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" data-hover="dropdown" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto mx-auto" >

                            <!-- HOME -->
                            <li class="nav-item">
                            <a class="nav-link nav-link-main-custom" href="index.php"><i class="fas fa-home"></i> Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <!-- FAVOURITES -->
                            <?php include 'favouritemenu.php'; ?>

                            <!-- BRANDS -->
                            <li class="nav-item dropdown"  data-toggle="dropdown-menu">
                                <a class="nav-link nav-link-main-custom" 
                                href="brands.php">Brands <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-2">
                                <?php 
                                    $brand_name_query = "select brand_id, brand_name from brand";
                                    $brand_qry1 = mysqli_query($connection, $brand_name_query);
                                    $brand_count = mysqli_num_rows($brand_qry1);            //count of rows number of result
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $count = 0;
                                                while($row = mysqli_fetch_assoc($brand_qry1))
                                                {
                                                    if($count <= ($brand_count/2)) 
                                                    {
                                                        echo '<li class="brand-custom"><a href="brand.php?bid='.$row['brand_id'].'">'.strtoupper($row["brand_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                } 
                                                ?>    
                                            </ul> 
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                 $brand_qry2 = mysqli_query($connection, $brand_name_query);
                                                $brand_count = mysqli_num_rows($brand_qry2);            //count of rows number of result
                                                 $count = 0;
                                                 while($row = mysqli_fetch_assoc($brand_qry2))
                                                {
                                                    if($count > ($brand_count/2))    
                                                    {
                                                        echo '<li class="brand-custom"><a href="brand.php?bid='.$row['brand_id'].'">'.strtoupper($row["brand_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>    
                                </ul>
                            </li>

                            <!-- HELMETS -->
                            <li class="nav-item dropdown" data-toggle="dropdown-menu" >
                                <a class="nav-link nav-link-main-custom"
                                href="helmets.php">Helmets <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-2">
                                    <?php 
                                    $helmet_qry = "SELECT c.cat_id, c.cat_name 
                                                    FROM category c 
                                                    INNER JOIN item_category ic ON c.cat_id = ic.cat_id 
                                                    INNER JOIN item i ON ic.item_id = i.item_id 
                                                    WHERE i.item_type = 'helmet'
                                                    GROUP BY c.cat_name
                                                    ORDER BY c.cat_name;
                                                    "; 
                                    
                                    $qry2 = mysqli_query($connection, $helmet_qry);
                                    $category_count = mysqli_num_rows($qry2);            //count of rows number of result
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $count = 0;
                                                while($row1 = mysqli_fetch_assoc($qry2))
                                                {
                                                    if($count <= ($category_count/2))
                                                    {
                                                        echo '<li><a href="category.php?cid='.$row1['cat_id'].'">'.strtoupper($row1["cat_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }   
                                                ?>    
                                            </ul> 
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                 $qry3 = mysqli_query($connection, $helmet_qry);
                                                 $category_count = mysqli_num_rows($qry3);            //count of rows number of result
                                                 $count = 0;
                                                 while($row2 = mysqli_fetch_assoc($qry3))
                                                {
                                                    if($count > ($category_count/2))    
                                                    {
                                                        echo '<li><a href="category.php?cid='.$row2['cat_id'].'">'.strtoupper($row2["cat_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }
                                                ?>
                                            </ul> 
                                        </div>
                                     </div> 

                                </ul>
                            </li>
                            
                            <!-- PARTS -->
                            <li class="nav-item dropdown " data-toggle="dropdown-menu" >
                                <a class="nav-link nav-link-main-custom"
                                href="parts.php">Parts <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-2">
                                <?php 
                                    $helmet_qry = "SELECT c.cat_id, c.cat_name 
                                                    FROM category c 
                                                    INNER JOIN item_category ic ON c.cat_id = ic.cat_id 
                                                    INNER JOIN item i ON ic.item_id = i.item_id 
                                                    WHERE i.item_type = 'parts'
                                                    GROUP BY c.cat_name
                                                    ORDER BY c.cat_name;
                                                    "; 
                                    
                                    $qry2 = mysqli_query($connection, $helmet_qry);
                                    $category_count = mysqli_num_rows($qry2);            //count of rows number of result
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $count = 0;
                                                while($row1 = mysqli_fetch_assoc($qry2))
                                                {
                                                    if($count <= ($category_count/2))
                                                    {
                                                        echo '<li><a href="category.php?cid='.$row1['cat_id'].'">'.strtoupper($row1["cat_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }   
                                                ?>    
                                            </ul> 
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                 $qry3 = mysqli_query($connection, $helmet_qry);
                                                 $category_count = mysqli_num_rows($qry3);            //count of rows number of result
                                                 $count = 0;
                                                 while($row2 = mysqli_fetch_assoc($qry3))
                                                {
                                                    if($count > ($category_count/2))    
                                                    {
                                                        echo '<li><a href="category.php?cid='.$row1['cat_id'].'">'.strtoupper($row2["cat_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>    
                                </ul>
                            </li>

                            <!-- PORTFOLIO -->
                            <li class="nav-item">
                                <a class="nav-link nav-link-main-custom" href="portfolio.php">Portfolio</a>
                            </li>
                        </ul>
                    </div>
                </div> 
            </nav>
            
            <style>
                .search .input-group.md-form.form-sm.form-2 input {
                    border: 1px solid #bdbdbd;
                    border-top-left-radius: 0.25rem;
                    border-bottom-left-radius: 0.25rem;
                    }
                }
                .search btn:hover, .btnsubmit:hover{
                    background-color: #fe9801 !important;
                    
                }
                .btnsubmit{
                    margin-left:38%;
                }
                .btnsubmit:hover{
                    background-color: #fe9801;
                    filter:drop-shadow(0px 0px 3.5px black);
                    border-color: #fe9801;
                }
            </style>
        </header>
        <!--Main Body Section-->
        <main>
            
            <br /><br /><br />
            <form class="container" action="search.php" enctype="multipart/form-data" method="post">
                <div class="row justify-content-center border pt-3 pb-3 my-0 ">
                    <div class="col-12 row pb-3">
                        <div class="col-lg-6 col-sm-12 search">
                            <div class="input-group md-form form-sm form-1 pl-0">
                              <div class="input-group-prepend">
                                <button type="submit" name="searchbtn" class="btn bg-primary text-light"><i class="fas fa-search text-white"></i></button>
                              </div>
                              <input type="text" class="form-control my-0 py-1" name="search_text" placeholder="Search Item" aria-label="Search" value="<?php if(isset($_POST['searchbtn'])){echo $_POST['search_text'];} ?>">
                            </div>

                        </div>

                        <?php
                            $cat_query1 = "SELECT cat_id, cat_name FROM category";
                            $cat_result1 = mysqli_query($connection, $cat_query1);
                            $brand_query1 = "SELECT brand_id, brand_name FROM brand";
                            $brand_result1 = mysqli_query($connection, $brand_query1);
                        ?>
                        <div class="col-lg-3 col-sm-12">
                            <select class="browser-default custom-select dropdown-toggle" name="category">
                              <option selected disabled><?php 
                                                        if(!empty($_POST['category']))
                                                        {  $id = $_POST['category'];
                                                             $idq = "SELECT cat_name FROM category WHERE cat_id = $id";
                                                             $idr = mysqli_query($connection, $idq);
                                                            $r = mysqli_fetch_assoc($idr);
                                                            echo ucfirst($r['cat_name']); } 
                                                        else 
                                                            {echo "Select Category"; } 
                                                        ?></option>
                                <option class="text-muted" value="">Select Category</option>
                              <?php
                                while($row = mysqli_fetch_assoc($cat_result1))
                                {
                                    echo '<option value="'.$row['cat_id'].'">'.ucfirst($row['cat_name']).'</option>';
                                }
                              ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                        <select class="browser-default custom-select dropdown-toggle" name="brand">
                          <option selected disabled><?php 
                                                        if(!empty($_POST['brand']))
                                                          { $id = $_POST['brand'];
                                                             $idq = "SELECT brand_name FROM brand WHERE brand_id = $id";
                                                             $idr = mysqli_query($connection, $idq);
                                                            $r = mysqli_fetch_assoc($idr);
                                                            echo ucfirst($r['brand_name']); } 
                                                        else 
                                                            {echo "Select Brand"; } 
                                                        ?></option>
                          <option class="text-muted" value="">Select Brand</option>
                        <?php
                            while($row = mysqli_fetch_assoc($brand_result1))
                            {
                                echo '<option value="'.$row['brand_id'].'">'.ucfirst($row['brand_name']).'</option>';
                            }
                          ?>
                        </select>
                        </div>
                    </div>
                    <br />
                    <div class=" col-12 row text  border-top pr-0">
                    <h5 class="col-lg-2 col-sm-12 text-danger pt-4 mb-0 text-left border-right justify-content-center">SORT BY:</h5>
                        <div class="col-lg-10 col-sm-12 px-3">
                            <div class="row pl-3 pb-1 border-bottom pt-1">
                                <span class="text-success mr-3">Alphabetically</span>
                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" value="" id="alpha" name="alpha" checked />
                                  <label class="custom-control-label text-secondary" for="alpha">None</label>
                                </div>
                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" id="alpha1" value="alphaasc" name="alpha"
                                  <?php if(isset($_POST['alpha']))
                                        {
                                            if($_POST['alpha'] == "alphaasc")
                                                echo "checked";
                                        } ?>  />
                                  <label class="custom-control-label mr-2 text-secondary mr-5" for="alpha1">A - Z</label>
                                </div>

                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" value="alphadesc" id="alpha2" name="alpha"   
                                  <?php if(isset($_POST['alpha']))
                                        {
                                            if($_POST['alpha'] == "alphadesc")
                                                echo "checked";
                                        } ?> / >
                                  <label class="custom-control-label text-secondary ml-2" for="alpha2">Z - A</label>
                                </div>
                            </div>

                            
                            <div class="row pl-3 pt-1  border-bottom pb-1">
                                <span class="text-primary " style="margin-right:7vw;">Price</span>
                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" value="" id="price" name="price" checked />
                                  <label class="custom-control-label text-secondary" for="price">None</label>
                                </div>
                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" id="price1" value="priceasc" name="price"
                                    <?php if(isset($_POST['price']))
                                        {
                                            if($_POST['price'] == "priceasc")
                                                echo "checked";
                                        } ?> / >
                                  <label class="custom-control-label mr-2 text-secondary" for="price1">Low to High</label>
                                </div>

                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" value="pricedesc" id="price2" name="price"
                                    <?php if(isset($_POST['price']))
                                        {
                                            if($_POST['price'] == "pricedesc")
                                                echo "checked";
                                        } ?> / >
                                  <label class="custom-control-label text-secondary" for="price2">High to Low</label>
                                </div>
                            </div>
                            
                            <div class="row pl-3 pt-1 pb-1">
                                <span class="text-info mr-3">Date Modified</span>
                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" value="" id="date" name="date_modified" checked />
                                  <label class="custom-control-label text-secondary" for="date">None</label>
                                </div>
                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" id="date1" value="dateasc" name="date_modified"
                                    <?php if(isset($_POST['date_modified']))
                                        {
                                            if($_POST['date_modified'] == "dateasc")
                                                echo "checked";
                                        } ?> / >
                                  <label class="custom-control-label mr-2 text-secondary" for="date1">Old to New</label>
                                </div>

                                <div class="custom-control custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" value="datedesc" id="date2" name="date_modified"
                                    <?php if(isset($_POST['date_modified']))
                                        {
                                            if($_POST['date_modified'] == "datedesc")
                                                echo "checked";
                                        } ?> / >
                                  <label class="custom-control-label text-secondary ml-2" for="date2">New to Old</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=" col-12 row text  border-top pt-3">
                        <div class="col-12">
                            <button type="submit" name="searchbtn" class="btn btn-primary text-light btnsubmit px-5" value="Search">Search</button>
                        </div>
                    </div>
                </div>
                
                
            </form>
            
            <hr class="bg-info"/>
            
            <?php
                //SEARCH fields
                if(isset($_POST['searchbtn']))
                {
                    $search_text = strtolower($_POST['search_text']);
                    if(isset($_POST['category']))
                        $cat_id = $_POST['category'];
                    else
                        $cat_id = "";
                    if(isset($_POST['brand']))
                        $brand_id = $_POST['brand'];
                    else
                        $brand_id = "";      
                    //Generating query parts according to filters
                    if(!empty($cat_id))
                        $cat_query = "item_category.cat_id = $cat_id";
                    else
                        $cat_query = "";

                    if(!empty($brand_id))
                        $brand_query = "brand_id = $brand_id";
                    else
                        $brand_query = "";

                    $order_array = array();
                    
                    if(isset($_POST['alpha']))
                    {
                        $alpha = $_POST['alpha'];
                        if($alpha == "alphaasc")
                        {
                            $alpha_query = "item_name ASC";
                            array_push($order_array, $alpha_query);
                        }
                        else if($alpha == "alphadesc")
                        {
                            $alpha_query = "item_name DESC";
                            array_push($order_array, $alpha_query);
                        }
                        else
                            $alpha_query = "";
                    }
                    else
                        $alpha_query = "";
                    
                    
                    
                    if(isset($_POST['price']))
                    {
                        $price = $_POST['price'];
                        if($price == "priceasc")
                        {
                            $price_query = "price ASC";
                            array_push($order_array, $price_query);
                        }
                        else if($price == "pricedesc")
                        {
                            $price_query = "price DESC";
                            array_push($order_array, $price_query);
                        }
                        else
                            $price_query = "";
                    }
                    else
                        $price_query = "";
                    
                    
                    
                    if(isset($_POST['date_modified']))
                    {
                        $date_modified = $_POST['date_modified'];
                        if($date_modified == "dateasc")
                        {
                            $date_query = "date_modified ASC";
                            array_push($order_array, $date_query);
                        }
                        else if($date_modified == "datedesc")
                        {
                            $date_query = "date_modified DESC";
                            array_push($order_array, $date_query);
                        }
                        else
                            $date_query = "";
                    }
                    else
                        $date_query = "";
                    
                    
//                    echo "ORDER BY $alpha_query,  $price_query,  $date_query <br />";
//                    print_r($order_array);
//                    echo "<br /> ".implode(", ", $order_array);
//                    echo "<br /> $brand_query <br /> $cat_query";
                    
                    $order_query = "ORDER BY ". implode(", ", $order_array);
                    

                       

                   /* if(isset($search_text) && empty($brand_query) && empty($cat_query) && !isset($order_query))
                    {
                            $search_text_query = "SELECT * FROM item WHERE item_name LIKE '%$search_text%' $order_query";
                            if(!empty($brand_query) && empty($cat_query))
                            { 
                                $search_text_query = "SELECT * FROM item WHERE item_name LIKE '%$search_text%' AND $brand_query $order_query";
                            }
                            else if(empty($brand_query) && !empty($cat_query))
                            { 
                                 $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND item_name LIKE '%$search_text%' $order_query";   
                            }
                            else if(!empty($brand_query) && !empty($cat_query))
                            { 
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND  $brand_query AND item_name LIKE '%$search_text%' $order_query"; 
                            }
                            else{}
                    }

                    else
                    { 
                         $search_text_query = "SELECT * FROM item WHERE item_name LIKE '%$search_text%'";
                            if(!empty($brand_query) && empty($cat_query))
                            { 
                                $search_text_query = "SELECT * FROM item WHERE item_name LIKE '%$search_text%' AND $brand_query";
                            }
                            else if(empty($brand_query) && !empty($cat_query))
                            {  
                                 $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND item_name LIKE '%$search_text%'";   
                            }
                            else if(!empty($brand_query) && !empty($cat_query))
                            {  
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND  $brand_query AND item_name LIKE '%$search_text%'"; 
                            }
                            else{ }
                    }*/
					
					
					//if any of the search option is selected
                    if(!empty($search_text) || !empty($brand_query) || !empty($cat_query) || !empty($alpha_query) || !empty($price_query) || !empty($date_query))
                    {
                        //if only search text is given
                        if(empty($brand_query) && empty($cat_query) && empty($alpha_query) && empty($price_query) && empty($date_query))
                        {
                            $search_text_query = "SELECT * FROM item WHERE item_name LIKE '%$search_text%'";
                        }
                        
                        //if brand and category and order is specified
                        else if(!empty($brand_query) && !empty($cat_query) && (!empty($alpha_query) || !empty($price_query) || !empty($date_query)))
                        {   
                            if(!empty($search_text))
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND  $brand_query AND item_name LIKE '%$search_text%' $order_query";
                            else
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND  $brand_query $order_query";
                        }
                        
                        //if no brand and category and order is specified
                        else if(!empty($brand_query) && empty($cat_query) && (!empty($alpha_query) || !empty($price_query) || !empty($date_query)))
                        {
                            if(!empty($search_text))
                                $search_text_query = "SELECT * FROM item WHERE item_name LIKE '%$search_text%' AND $brand_query $order_query";
                            else
                                $search_text_query = "SELECT * FROM item WHERE $brand_query $order_query";
                        }
                        
                        //if brand and no category and order is specified
                        else if(empty($brand_query) && !empty($cat_query) && (!empty($alpha_query) || !empty($price_query) || !empty($date_query)))
                        {
                            if(!empty($search_text))
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND item_name LIKE '%$search_text%' $order_query"; 
                            else
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query $order_query";
                        }
                        
                        //if brand and category and no order is specified
                        else if(!empty($brand_query) && !empty($cat_query) && !(!empty($alpha_query) || !empty($price_query) || !empty($date_query)))
                        {   
                            if(isset($search_text))
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND  $brand_query AND item_name LIKE '%$search_text%'";
                            else
                                 $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND  $brand_query";
                        }
                        
                        //if no brand and category and no order is specified
                        else if(!empty($brand_query) && empty($cat_query) && !(!empty($alpha_query) || !empty($price_query) || !empty($date_query)))
                        {   
                            if(!empty($search_text))
                                $search_text_query = "SELECT * FROM item WHERE item_name LIKE '%$search_text%' AND $brand_query";
                            else
                                 $search_text_query = "SELECT * FROM item WHERE $brand_query";
                        }
                        
                        //if brand and no category and no order is specified
                        else if(empty($brand_query) && !empty($cat_query) && !(!empty($alpha_query) || !empty($price_query) || !empty($date_query)))
                        {
                            if(!empty($search_text))
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query AND item_name LIKE '%$search_text%'"; 
                            else
                                $search_text_query = "SELECT * FROM item, item_category WHERE item_category.item_id = item.item_id AND $cat_query"; 
                        }
                        
                        //if no brand and no category but order is specified
                        else if(empty($brand_query) && empty($cat_query) && (!empty($alpha_query) || !empty($price_query) || !empty($date_query)))
                        {
                            if(!empty($search_text))
                                $search_text_query = "SELECT * FROM item WHERE item_name LIKE '%$search_text%' $order_query";
                            else
                                $search_text_query = "SELECT * FROM item $order_query";
                        }
                        else{
							$search_text_query = "SELECT * FROM item WHERE";
						}
                    }

                    else
                    { 
                         $search_text_query = "SELECT * FROM item WHERE item_name";
                    }

                    $search_result = mysqli_query($connection, $search_text_query);
                    $result_count = mysqli_num_rows($search_result);
                    
                    echo $search_text_query;
                    echo '<div class="jumbotron text-center hoverable p-4">';

                        if($result_count != 0)
                        {
                            echo '<h4>Showing results for <span class="text-info ">'.ucfirst($search_text).'</span></h4>
                            Total Results: '.$result_count;
                            
                        }
                        else
                        {
                            echo '<h4>Showing results for <span class="text-muted ">'.ucfirst($search_text).'</span></h4>
                            <h1 class="text-danger" style="font-size:4em">No Results Found</h1>';
                        }
                      
                    echo '</div>';
                    //Displaying Results
                    while($item_row = mysqli_fetch_assoc($search_result))
                    {
                        $item_id = $item_row['item_id'];
                    $query = "SELECT item_id, item_name, item_image, price, date_modified, stock, rating_stars, item_description
                    FROM item WHERE item_id = $item_id";
                    $query_result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($query_result))
                    {
                        $itemid = $row['item_id'];

                        //query from retrieving category name
                        $category_query = "SELECT c.cat_id, c.cat_name 
                                                FROM category c 
                                                INNER JOIN item_category ic ON c.cat_id = ic.cat_id 
                                                INNER JOIN item i ON ic.item_id = i.item_id 
                                                WHERE i.item_id = $itemid";
                        //query for retrieving brand name
                        $brand_query = "SELECT brand.brand_id, brand_name
                                        FROM brand, item
                                        WHERE brand.brand_id = item.brand_id
                                        AND item_id = $itemid";
                        //query for retrieving vendor name
                        $user_query = "SELECT user_id, first_name, last_name FROM user, item
                                       WHERE item.vendor_id = user.user_id
                                       AND item_id = $itemid";
                        //running above queries
                        $category_result = mysqli_query($connection, $category_query);
                        $category_row = mysqli_fetch_assoc($category_result);

                        $brand_result = mysqli_query($connection, $brand_query);
                        $brand_row = mysqli_fetch_assoc($brand_result);

                        $user_result = mysqli_query($connection, $user_query);
                        $user_row = mysqli_fetch_assoc($user_result);
                    echo '<div class="card mb-3 mt-5 mx-auto " style="max-width: 90vw;">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                        <div class="card-img-wrap">
                          <img src="uploads/item/'.$row['item_image'].'" class="card-img" alt="'.$row['item_name'].'">
                          </div>
                        </div>
                        <div class="col-md-8">
                            <div class="text-muted card-header">Category: <a class="text-primary" href="category.php?cid='.$category_row['cat_id'].'">'.ucfirst($category_row['cat_name']).'</a></div>
                          <div class="card-body"><h5 class="card-title"><a href="product.php?iid='.$row['item_id'].'">'.strtoupper($row["item_name"]).'</a></h5>';
                            $i = 1;
                            //Rating Stars
                            $stars_num = $row['rating_stars'];
                            while($i<=5)
                            {
                                if($i <= $stars_num)
                                    echo  '<i class="fas star-color-solid star fa-star"></i>';
                                else
                                    echo  '<i class="fas star-color-blank star fa-star"></i>';
                                $i++;
                            }
                         echo ' 
                         <h5 class="price mr-2 float-right price text-success">RS. '.strtoupper($row['price']).'</h5>
                         </div><hr class="mb-0" />
                          <ul class="list-group list-group-flush mt-0">
                            <li class="list-group-item text-muted  pl-3 pr-3">Brand: <a class="text-success" href="brands.php?bid=">'.ucfirst($brand_row['brand_name']).'</a>
                            <span class="float-right">'.$row['stock'].' left in stock.</span></li>
                            <li class="list-group-item  pl-3 pr-3"><p class="card-text text-secondary">'.($row['item_description']).'</p></li>
                          </ul>
                            <p class="card-text card-footer"><small class="text-muted">Last updated on '.$row['date_modified'].' by <a class="text-dark" href="#">'.ucfirst($user_row['first_name']).' '.ucfirst($user_row['last_name']).'</a>!</small></p>
                          </div>
                        </div>
                      </div>
                    </div>';
                }
                echo '</div>';

            echo '<br />
            <hr class="text-primary" />
            <br />';
                }
                }
                ?>
            </div>
        </main> 
        
        <!--Footer Section-->
        
        <!-- Footer -->
       <footer class="page-footer font-small blue"> 
            <!--Subscribe Newsteller-->
            <div class="container-fluid newsteller">
                <h3>SUBSCRIBE US FOR LATEST UPDATES</h3>
                <hr class="hr-1 mx-auto">
                <form class="mc-trial row text-center">
                    <div class="form-group col-md-4 col-md-offset-2 col-sm-4">
                        <div class="controls">
                            <input name="name" placeholder="Enter Your Name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <div class="controls">
                            <input name="email" placeholder="Enter Your Email" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-md-4">
                        <p>
                            <button name="submit" class="btn btn-block btn-outline-light btn-submit">Submit<i class="fa fa-arrow-right"></i></button>
                        </p>
                    </div>
                </form>
            </div> 
            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left"> 
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">
                        <!-- Content -->
                        <a href="index.html" class="nav-link">
                            <h4 class="text-uppercase .foot-logo" style="font-family: 'Lobster', cursive;overflow:hidden;">
                                <span style="color:#5bd1d7">Motoritz</span>
                                <span style="color:#ff502f"> Autopartz</span>
                            </h4>
                        </a>
                        <p>Motoritz website is an ecommerce website designed for selling motorcycle accessories, 
                            parts as well as its riding gears. This website was created by Amit Karn who studies
                            at The British College located at Thapathali, Kathmandu, Nepal as an assignment project of
                            the module Web Applications and Design. This website was created on 6th January, 2020!
                        </p>
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3"> 
                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">
                        <!-- Links -->
                        <h5 class="text-uppercase   text-center" style="color:#ffe26f;overflow:hidden;">Navigation</h5>
                        <ul class="list-unstyled  text-center">
                            <li>
                                <a href="index.php" class="foot-link">Home</a>
                            </li>
                            <li>
                                <a href="brands.php" class="foot-link">Brands</a>
                            </li>
                            <li>
                                <a href="helmets.php" class="foot-link">Helmets</a>
                            </li>
                            <li>
                                <a href="parts.php" class="foot-link">Parts</a>
                            </li>
                            <li>
                                <a href="portfolio.php" class="foot-link">Portfolio</a>
                            </li>
                            <li>
                                <a href="#!" class="foot-link">Account</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">
                        <!-- Links -->
                        <h5 class="text-uppercase  text-center" style="color:#ffe26f;overflow:hidden;">Social Links</h5>
                        <ul class="list-unstyled  text-center">
                            <li>
                                <a href="https://www.linkedin.com/in/amit-karn-488174162/" style="font-family: 'Titillium Web', sans-serif;color:#0075f6;" target="blank" class="foot-link">
                                    <i class="fab fa-linkedin" style="font-size:14pt;"></i><span style="-size:12pt;"> Linked In</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/imamityk98" style="font-family: 'Titillium Web', sans-serif;color:#00acee;" target="blank" class="foot-link">
                                    <i class="fab fa-twitter-square" style="font-size:14pt;"></i><span style="font-size:12pt;"> Twitter</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/amit.karn.982" style="font-family: 'Titillium Web', sans-serif;color:#51eaea;" target="blank" class="foot-link">
                                    <i class="fab fa-facebook-square" style="font-size:14pt;"></i><span style="font-size:12pt;"> Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/theamittt/" style="font-family: 'Titillium Web', sans-serif;color:#f857b5;" target="blank" class="foot-link">
                                    <i class="fab fa-instagram" style="font-size:14pt;"></i><span style=" font-size:12pt;"> Instagram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 "> © 2020 Copyright &nbsp;&nbsp; | &nbsp;&nbsp; 
                <a href="index.php"> Motoritz Autopartz</a> &nbsp;&nbsp; | &nbsp;&nbsp; Amit Karn 
            </div>
        </footer>
        <!-- Footer--> 

      <script>
            $(document).ready(function(){
                //z-indeces of navbar and search-box when they roll over each other
                $(".navbar-main").css("z-index", "10");
                $(".landing-page-content").css("z-index", "9");
                $(".navbar-main").css("top", "40px");

                //when page reloads, the navbar goes on top even if the scroll bar is slided down
                if($("body").scrollTop() > 20 || $("html").scrollTop() > 20) {
                    $(".navbar-main").css("top", "-5px");
                }
                $(window).scroll(function(){
                    if($("body").scrollTop() > 20 || $("html").scrollTop() > 20) {
                    $(".navbar-main").css("top", "-5px");
                    $(".container").css("background-color","#ffffff");
                    $(".navbar-main").children().css("box-shadow","0px 0px 4px #5d5b6a");
                    } else {
                        $(".navbar-main").css("top", "40px");
                        $(".container").css("background-color","transparent");
                        $(".navbar-main").children().css("box-shadow","0 0 0");
                    }
                });          
            });   
          
          //Search Bar Options
          $(".dropdown-menu").click(function(){
              $(this).slideToggle(500);
            });
        </script> 
    </body>
</html>

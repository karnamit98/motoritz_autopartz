<?php
     session_start();
    //include 'check_session.php';
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
            .motorcycle{
                font-size:3vw;
                color:#2c7873;
                text-decoration:underline;
            }
            .motorcycle-reverse{
                /* transform: rotate(-90deg); */
                transform: scale(-1, 1);
            }
            .helmetssales .card, .partssales .card{
                max-width:20vw;
                margin-bottom:10vh;
            }
/*
            .helmetssales .card-title, .partssales .card-title{
                color:#8f4426;
                font-size:1.8vw;
            }
            
            .helmetssales .card-title:hover, .partssales .card-title:hover{
                color: #3e64ff;
                cursor:pointer;
            }
*/
            .brand-row .card{
                padding:0;
                border:0;
            }
            .brand-row .card-img-top{
                width: 8vw;
                height: 8vw;
            }
            .sales .card:hover{
                box-shadow: 0px 0px 6px #5f6769;
            }
            .sales .card-body a:hover {
                text-decoration:none;
                color: #3e64ff;
            }
            .sales .card-footer{
                font-size:0.9vw;
            }
            .sales .card-text{
                font-size:1vw;
            }
            .sales .card-title{
                color: #8f4426;
                font-size:1.8vw;
            }
            .sales .card-title:hover{
                color: #3e64ff;
                cursor:pointer;
            }
            .brand-row a:hover{
                text-decoration: none;
                color: #3e64ff;
                cursor:pointer;
            }
            .brand-row h5:hover{
                color: #3e64ff;
            }
          
            .bike-bg-image{
                background-image: url(images/bikebg13.jpg);
            }
            .bike-bg-image-2{
                background-image:url(images/bike9.jpg);
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
                            <li class="nav-item active">
                            <a class="nav-link nav-link-main-custom" href="index.php"><i class="fas fa-home"></i> Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <!-- FAVOURITES -->
                            <?php include 'favouritemenu.php'; ?>

                            <!-- BRANDS -->
                            <li class="nav-item dropdown " data-toggle="dropdown-menu">
                                <a href="brands.php" class="nav-link nav-link-main-custom "  > <!-- dropdown-toggle class and data-toggle excluded -->
                                    Brands <b class="caret"></b>
                                </a>
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
                                <a class="nav-link nav-link-main-custom " href="helmets.php">
                                    Helmets <b class="caret"></b>
                                </a>
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
                            <li class="nav-item dropdown"  data-toggle="dropdown-menu" >
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

                            <!-- PORTFOLIO -->
                            <li class="nav-item">
                                <a class="nav-link nav-link-main-custom" href="portfolio.php">Portfolio</a>
                            </li>
                            
                            
                        </ul>
                    </div>
                </div> 
            </nav>
        </header>
        <!--Main Body Section-->
        <main>
            <!-- Heading and Search Box inside the Bike bg image-->
            <div class="bike-bg-image">
                <div class=" bounce-in-top landing-page-content">
                    <!--Search header-->
                    <h1 class="row">
                        Shop Your Riding Gear With Us!
                    </h1>
                    <h4 class="row">
                        Find The Best Deals Of Your Favourite Moto Parts
                     </h4>
                     <hr class="landing-line" /><br />
                    
                    <!--Search Box-->
                    
                     <form class="container-fluid row landing-search" action="search.php" enctype="multipart/form-data" method="post">
                        <div class="input-group md-form form-sm form-1 pl-0">
                          <div class="input-group-prepend">
                            <button type="submit" name="searchbtn" class="btn bg-primary text-light"><i class="fas fa-search text-white"></i></button>
                          </div>
                          <input type="text" required class="form-control my-0 py-1" style="height:7vh;" name="search_text" placeholder="Search Item" aria-label="Search" value="<?php if(isset($_POST['searchbtn'])){echo $_POST['search_text'];} ?>">
                        <a class="col-lg-4 justify-content-center advance-search p-2" href="search.php">Advanced Search</a>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
            <br /><br /><br />

            <!-- LATEST ARRIVALS -->
            <h3 class="text-center"><i class="fas fa-motorcycle motorcycle"></i><br/><br />
                LATEST ARRIVALS 
                
            </h3>
            
            <hr class="hr-1" /><br />
            <!--Helmet or Parts-->
            <div class="btn-group larrivals-btn-group" >
                <button class="btn larrivals-btn" id="helmetsbtn" type="button" value="helmets">Helmets</button>
                <button class="btn larrivals-btn" id="partsbtn" type="button" value="parts">Parts</button>
            </div>
            <div id="helmetssales" class="container">
                <?php
                //sql query for selecting item attributes
                $cardquery1 = "SELECT item_id, item_image, item_name, price, item_description, 
                                rating_stars, date_modified
                                FROM item
                                WHERE item_type = 'helmet' 
                                ORDER BY date_modified DESC";
                //running query on the database
                $cardresult = mysqli_query($connection, $cardquery1);
                $item_count = mysqli_num_rows($cardresult);
                $row_count = 0;
                while($row_count <= $item_count)
                {
                    ?>
                <div class="card-columns sales row mx-auto justify-content-center">
                    <?php
                //fetching resulting data from the database
                while($row = mysqli_fetch_assoc($cardresult))
                {
                                   
                echo '<div class="card col-sm-12 col-lg-3 col-md-4 col-12">
                        <div class="card-img-wrap">
                            <img class="card-img-top" src="uploads/item/'.$row['item_image'].'" class="card-img-top" alt="'.$row['item_name'].'">
                        </div>
                        <div class="card-body">
                            <a href="product.php?iid='.$row['item_id'].'"><h5 class="card-title">'.strtoupper($row['item_name']).'</h5></a>';
                                if(isset($_SESSION['session_user']))
                                  echo  '<a href="addfavourite.php?iid='.$row['item_id'].'" class="btn btn-info text-light float-right"><i class="mr-1 fas fa-heart"></i>Favourite</a>';
                            
                            echo '<h5 class="price mr-2">RS. '.strtoupper($row['price']).'</h5>
                            <p class="card-text">'.substr($row['item_description'], 0, 60).'...
                            <a href="product.php?iid='.$row['item_id'].'">View Item</a></p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated on '.$row['date_modified'].'.</small>
                        </div>
                    </div>';
                }
                $row_count++;
                echo '</div>';
                 }
                ?>
                </div>

                <div id="partssales" class="container">
                <?php
                //sql query for selecting item attributes
                $cardquery1 = "SELECT item_id, item_image, item_name, price, item_description, 
                                rating_stars, date_modified
                                FROM item
                                WHERE item_type = 'parts' 
                                ORDER BY date_modified DESC";
                //running query on the database
                $cardresult = mysqli_query($connection, $cardquery1);
                $item_count = mysqli_num_rows($cardresult);
                $row_count = 0;
                while($row_count <= $item_count)
                {
                    ?>
                <div class="card-columns sales row mx-auto justify-content-center">
                    <?php
                //fetching resulting data from the database
                while($row = mysqli_fetch_assoc($cardresult))
                {
                                   
                echo '<div class="card col-sm-6 col-lg-3 col-md-4 col-12">
                        <div class="card-img-wrap">
                            <img class="card-img-top" src="uploads/item/'.$row['item_image'].'" class="card-img-top" alt="'.$row['item_name'].'">
                        </div>
                        <div class="card-body">
                            <a href="product.php?iid='.$row['item_id'].'"><h5 class="card-title">'.strtoupper($row['item_name']).'</h5></a>';
                            if(isset($_SESSION['session_user']))
                                echo  '<a href="addfavourite.php?iid='.$row['item_id'].'" class="btn btn-info text-light float-right"><i class="mr-1 fas fa-heart"></i>Favourite</a>';
                            
                            echo '<h5 class="price mr-2">RS. '.strtoupper($row['price']).'</h5>
                            <p class="card-text">'.substr($row['item_description'], 0, 60).'...
                            <a href="product.php?iid='.$row['item_id'].'">View Item</a></p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated on '.$row['date_modified'].'.</small>
                        </div>
                    </div>';
                }
                $row_count++;
                echo '</div>';
                 }
                ?>
                </div>
                
            <br /><br />
            <!-- About The Author -->
            <section class="container-fluid slant1 bike-bg-image-2" style="padding: 0px;">
                <div class="left" style="overflow:hidden;">
                    <div class="lskewed" style="">
                        <div class="slant-container" style="">
                            <h2 class="text-secondary">About The Developer!</h2>
                            <hr class="hr-1 " style="border:2px solid #1089ff;" /><br /><br />
                              <div class="container">
                                <div class="row text-center">
                                  <div class="col-md-12 mb-4">
                                    <div class="card-img-wrap rounded-circle">
                                        <img class="rounded-circle " alt="Deceloper: Amit Karn" src="uploads/user/amitimg.jpg" style="width:20vw; height:auto;">
                                      </div>
                                      <h2 class="mt-2 mx-auto text-secondary">Amit Karn</h2>
                                      <h6 class="text-muted"><i class="fa fa-envelope text-muted mr-1"></i>amit.karn98@gmail.com</h6>
                                      <h6 class="text-muted"><i class="fa fa-phone-square text-muted mr-1 "></i>+977-9816810976</h6>
                                      <div class="mx-auto">
                                          <a href="https://www.facebook.com/amit.karn.982"><i class="fab fa-facebook text-primary display-4"></i></a>
                                          <a href="https://www.instagram.com/theamittt/"><i class="fab fa-instagram text-danger display-4"></i></a>
                                          <a href="https://twitter.com/imamityk98"><i class="fab fa-twitter text-info display-4"></i></a>
                                          <a href="https://www.linkedin.com/in/amit-karn-488174162/"><i class="fab fa-linkedin text-primary display-4"></i></a>
                                      </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="rskewed"></div>
                </div>
            </section>
           <br /><br /> 
                    
            <!--RECOMMENDED BRANDS-->
            <h2 class="text-center">RECOMMENDED BRANDS</h2>
            <hr class="hr-1" />
                    
            <?php
                //query for displaying brands
                $brand_item_query = "SELECT i.brand_id, count(item_id) item_no, b.brand_name, b.brand_logo_image FROM item i, brand b
                                    GROUP BY b.brand_id
                                    HAVING b.brand_id = i.brand_id
                                    ORDER BY item_no DESC";
                
                $brandresult = mysqli_query($connection, $brand_item_query);
                $brand_count = mysqli_num_rows($brandresult);
                $count = 1;
                while($count <= $brand_count && $count <= 2)
                {
                echo '<div class="row brand-row">';
                    while($row = mysqli_fetch_assoc($brandresult))
                    {
                    echo '<div class="card mb-3 container justify-content-center col-sm-6 col-lg-3" style="max-width: 18rem;">
                        <div class="card-img-wrap mx-auto">
                            <img class="card-img-top" src="uploads/brand/'.$row['brand_logo_image'].'" alt="'.$row['brand_name'].'"/>
                        </div>
                        <div class="card-body">
                            <a href="brand.php?bid='.$row['brand_id'].'"><h5 class="card-title text-center text-muted">'.strtoupper($row['brand_name']).'</h5></a>
                            
                        </div>
                    </div>';
                        //<p class="card-text text-secondary">Items Availabel: '.$row['item_no'].'</p>
                    }
                echo '</div>';
                    $count++;
                }
                ?>
            <br /><br />
        
        </main> 
        
        <!-- Footer -->
       <footer class="page-footer font-small blue"> 
            <!--Subscribe Newsteller-->
            <div class="container-fluid newsteller">
                <h3>SUBSCRIBE US FOR LATEST UPDATES</h3>
                <hr class="hr-1 mx-auto" />
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
                //TOP DEALS BUTTOn GROUP SECTION
                $("#helmetssales").show();
                $("#partssales").hide();
                $("#helmetsbtn").css("color", "#1089ff");
                $("#helmetsbtn").css("border-bottom","1px solid #1089ff");
                $("#helmetsbtn").click(function(){
                    $("#helmetsbtn").css("color", "#1089ff");
                    $("#helmetsbtn").css("border-bottom","1px solid #1089ff");
                    $("#partsbtn").css("color", "#000");
                    $("#partsbtn").css("border-bottom","0");
                    $("#helmetssales").show();
                    $("#partssales").hide();
                });
                $("#partsbtn").click(function(){
                    $("#partsbtn").css("color", "#1089ff");
                    $("#partsbtn").css("border-bottom","1px solid #1089ff");
                    $("#helmetsbtn").css("color", "#000");
                    $("#helmetsbtn").css("border-bottom","0");
                    $("#helmetssales").hide();
                    $("#partssales").show();
                });            
            });     
        </script> 
    </body>
</html>
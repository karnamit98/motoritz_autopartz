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
                margin-top:5vh;
                margin-bottom: 5vh;
            }
            footer{
                /* overflow:hidden !important; */
                /* font-family: 'Titillium Web', sans-serif; */
                font-family: 'Nova Square', cursive;
            }
            .bike-bg-image{
                background-image: url('images/helmetbg1.jpg');
            }
            @media (max-width:500px){
                .bike-bg-image{
                background-image: url('images/helmetmobilebg1.jpg');
            }
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
            .card-title{
                color:#5d5b6a;
                font-size: 3.5vw;
            }
            .star, .price{
                font-size: 2.5vw;
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
                            <li class="nav-item dropdown" data-toggle="dropdown-menu">
                                <a href="brands.php" class="nav-link nav-link-main-custom"  >
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
                            <li class="nav-item dropdown"  data-toggle="dropdown-menu">
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
                                                        echo '<li><a href="category.php?cid='.$row["cat_id"].'" >'.strtoupper($row1["cat_name"]).'</a></li>';
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
                                                        echo '<li><a href="category.php?cid="'.$row["cat_id"].'" >'.strtoupper($row2["cat_name"]).'</a></li>';
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
<!--
            <div class="bike-bg-image">
                <div class=" bounce-in-top landing-page-content">
-->
                    <!--Search header-->
<!--
                    <h1 class="row">
                        Shop Your Riding Gear With Us!
                    </h1>
                    <h4 class="row">
                        Find The Best Deals Of Your Favourite Moto Parts
                     </h4>
                     <hr class="landing-line" /><br />
-->
                    
                    <!--Search Box-->
<!--
                        <div class="row input-group search-custom">
                            <input class="form-control  py-2 border-secondary" type="search" value="search">
                            <div class="input-group-append">
                                <button class="btn  btn-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
-->
                    <!--Trending Products-->
<!--
                    <br />
                    <div class="row">
                        <span>
                            <b>Trending: </b> 
                            Item1 Item2 Item3 Item4 Item5
                        </span>
                    </div>
                </div>
            </div>
-->
            
<!--
            <br /><br /><br />
            <img src="images/helmeticon1.png" alt="helmet icon" class="helmeticon mb-3" />
            <h1 class="text-center " >Helmets</h1>
            <hr class="hr-1 mb-5" style="width:4vw !important;"/>
            <div class = "container mx-auto">
-->
            <!-- PRODUCT HORIZONTAL CARD -->
             <?php 
                $item_id = $_GET['iid'];
             
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
                            <div class="text-muted card-header ">Category:<a  class="text-primary" href="category.php?cid='.$category_row['cat_id'].'">'.ucfirst($category_row['cat_name']).'</a>';
                            if(isset($_SESSION['session_user']))
                                  echo  '<a href="addfavourite.php?iid='.$row['item_id'].'" style="position:relative;left:30vw;" class="btn btn-info text-light "><i class="mr-1 fas fa-heart"></i>Favourite</a>';
                             
                           echo '</div>
                          <div class="card-body"><h5 class="card-title">'.strtoupper($row["item_name"]).'</h5>';
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
            
            //INCLUDING SIMILAR PRODUCTS
                $category_result1 = mysqli_query($connection, $category_query);
                $category_row1 = mysqli_fetch_assoc($category_result1);

                $brand_result1 = mysqli_query($connection, $brand_query);
                $brand_row1 = mysqli_fetch_assoc($brand_result1);
                
                $brandid = $brand_row1['brand_id'];
                $catid = $category_row1['cat_id'];
            
                echo '<h1 class="text-center text-info mt-2">Similar Items</h1>';
                include 'productcategory.php';
                include 'productbrand.php';
            ?>
            
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
        </script> 
    </body>
</html>
<?php
    //include 'check_session.php';
    include 'maconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
        <style>
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
        
            <?php
            if(isset($_GET['bid']))
                $brand_id = $_GET['bid'];
            else
                $brand_id = $brandid;
            $q1 = mysqli_query($connection, "SELECT brand_name, brand_logo_image FROM brand where brand_id = $brand_id");
            $brandn = mysqli_fetch_assoc($q1);
            echo '<div class="card mx-auto justify-content-center" style="max-width:21vw;"><div class="card-img-wrap p-4 justify-content-center" style="width:20vw;height:20vh;">
                    <img class="mx-auto" src="uploads/brand/'.$brandn['brand_logo_image'].'" style="width:15vw;height:15vh;" alt="'.$brandn['brand_name'].'" />
                </div>';
            echo '<h2 class="text-secondary card-header text-center" >Brand: '.strtoupper($brandn['brand_name']).'</h2></div>
            <hr class="hr-1" />
            <div class = "container mx-auto">';
                 $brand_item_query = "SELECT b.brand_id, brand_name, i.item_id, item_name, item_image, stock, price, item_description,                            rating_stars,  date_modified 
                                    FROM brand b
                                    INNER JOIN item i ON b.brand_id = i.brand_id
                                    AND b.brand_id = $brand_id"; 
                $brand_item_result = mysqli_query($connection, $brand_item_query);
                $brand_item_count = mysqli_num_rows($brand_item_result);
                $count = 1;
                if($brand_item_count == 0)
                {
                    echo '<div class="jumbotron jumbotron-fluid bg-primary rounded">
                          <div class="container p-4">
                            <h2 class="display-4 text-warning">No Items Available Currently!</h2>
                            <p class="lead text-light">You might want to check out other amazing brands and their products that are currently available.</p>
                          </div>
                        </div>';
                }
                while($count <= $brand_item_count)
                {
                echo '<div class="row no-gutters helmets card-columns justify-content-center">';
                    while($row = mysqli_fetch_assoc($brand_item_result))
                    {
                        $itemid = $row['item_id'];
                        $vendorn_query = "SELECT user_id, first_name, last_name FROM user, item WHERE item.vendor_id = user.user_id AND item_id = $itemid";
                        $vendorn_query_result = mysqli_query($connection, $vendorn_query);
                        $vendor_row = mysqli_fetch_assoc($vendorn_query_result);
                        
                    echo '<div class="card col-lg-4 col-sm-6 p-0" style="width: 18rem;">
                            <div class="card-img-wrap">
                          <img src="uploads/item/'.$row["item_image"].'" class="card-img-top" alt="'.$row["item_name"].'" />
                          </div>
                          <div class="card-body pl-3 pr-3">
                            <a href="product.php?iid='.$row['item_id'].'"><h5 class="card-title">'.strtoupper($row["item_name"]).'</h5></a>';
                            //if(isset($_SESSION['session_user']))
                                 // echo  '<a href="addfavourite.php?iid='.$row['item_id'].'" style="position:relative;left:37vw;" class="btn btn-info text-light text-right"><i class="mr-1 fas fa-heart"></i>Favourite</a>';
                             
                            $i = 1;
                            $stars_num = $row['rating_stars'];
                            while($i<=5)
                            {
                                if($i <= $stars_num)
                                    echo  '<i class="fas star-color-solid fa-star"></i>';
                                else
                                    echo  '<i class="fas star-color-blank fa-star"></i>';
                                $i++;
                            }
                         echo ' 
                         <h5 class="price mr-2">RS. '.strtoupper($row['price']).'</h5>
                         </div><hr class="mb-0" />
                          <ul class="list-group list-group-flush mt-0">
                            <li class="list-group-item text-muted  pl-3 pr-3">Brand: <a class="text-success" href="brands.php?bid='.$row['brand_id'].'">'.strtoupper($row['brand_name']).'</a>
                            <span class="float-right">'.$row['stock'].' left in stock.</span></li>
                            <li class="list-group-item  pl-3 pr-3"><p class="card-text">'.substr($row['item_description'],0, 150).'
                            <a href="product.php?iid='.$row['item_id'].'">View Item</a></p></li>
                          </ul>
                          <div class="card-footer pl-3 pr-3">
                            <small class="text-muted">Last updated on '.$row['date_modified'].' by <a class="text-dark" href="#">'.$vendor_row['first_name'].' '.$vendor_row['last_name'].'</a>!</small>
                            </div>
                        </div>';
                    }
                    $count++;
                    echo '</div>';
                }
                ?>
            <br /><br /> <br />
        
        <!--Footer Section-->
    </body>
</html>
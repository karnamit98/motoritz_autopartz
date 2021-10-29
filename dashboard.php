
<?php
    //include 'check_session.php';
    include 'maconnection.php';
    $aid = $_GET['aid'];

    $brandquery = "SELECT * FROM brand";
    $catquery = "SELECT * FROM category";
    $itequery = "SELECT * FROM item";
    $userquery = "SELECT * FROM user";

    $brandresult = mysqli_query($connection, $brandquery);
    $catresult = mysqli_query($connection, $catquery);
    $itemresult = mysqli_query($connection, $itequery);
    $userresult = mysqli_query($connection, $userquery);

    $brandcount = mysqli_num_rows($brandresult);
    $catcount = mysqli_num_rows($catresult);
    $itemcount = mysqli_num_rows($itemresult);
    $usercount = mysqli_num_rows($userresult);

    



?>


    <div class="container pt-2 pl-5">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="jumbotron jbrand">
                    <h2 class="text-light">Brands</h2>
                    <?php echo'<h3 class="text-warning">'.$brandcount.'</h3>'; ?>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="jumbotron jcat">
                    <h2 class="text-light">Categories</h2>
                    <?php echo'<h3 class="text-primary">'.$catcount.'</h3>'; ?>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="jumbotron jitem">
                    <h2 class="text-light">Items</h2>
                    <?php echo'<h3 class="text-primary">'.$itemcount.'</h3>'; ?>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="jumbotron juser">
                    <h2 class="text-light">Users</h2>
                    <?php echo'<h3 class="text-warning">'.$usercount.'</h3>'; ?>
                </div>
            </div>

        </div>
    </div>

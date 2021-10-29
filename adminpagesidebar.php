

<div class="container nav-container float-left text-light pt-5 pr-3 justify-content-center">
        <a class="navbar-brand" href="index.php">
            <img class="card-img-top mt-1" src="images/logopng.png" alt="motoritz autopartz logo" />
        </a>
        <hr class="hr-sb" />
        
        <a href="" class="dashboard active"><h5><i class="fas fa-tachometer-alt float-left text-light mr-2"></i>Dashboard</h5></a>
        <hr class="hr-sb" />
        <ul class="navbar-nav p-2 pb-0 pt-0">
            
            <li class="nav-link"><a id="muser" href="manageuser.php" class="menus"><i class="fas fa-users-cog mr-1"></i>Manage Users</a></li>
            <li class="nav-link"><a id="mitem" href="manageitem.php" class="menus"><i class="fas fa-align-justify mr-1"></i>Manage Items </a></li>
            <li class="nav-link"><a id="mbrand" href="#" class="menus"><i class="fas fa-align-justify mr-1"></i>Manage Brands </a></li>
            <li class="nav-link"><a id="mcat" href="#" class="menus"><i class="fas fa-align-justify mr-1"></i>Manage Categories </a></li>
            <li class="nav-link"><a id="mhome" href="index.php" class="menus"><i class="fas fa-home mr-1"></i>Home</a></li>
        </ul>
        <hr class="hr-sb" />
        <?php
        
            // $aid =  $_GET['aid'];
            $aid = $_SESSION['session_admin'];
            $admin_query = "SELECT * from admin, user WHERE admin.user_id = user.user_id AND admin.admin_id = $aid";
            $admin_result = mysqli_query($connection, $admin_query);
            $admin_row = mysqli_fetch_assoc($admin_result);
        
            echo '<img class="card-img-top rounded-circle ml-5" src="uploads/user/'.$admin_row['user_image'].'" style="width:10vw;" alt="admin image" />';
            ?>
            <!-- <div class="form-group">
                    <label for="FormControlFile1">Update</label>
                    <input type="file" class="form-control-file"  name="itemimage" id="FormControlFile1">
            </div> -->
            <?php
            echo '<h5 class="text-center m-0 p-0" style="color:#fff">'.ucfirst($admin_row['first_name']).' '.ucfirst($admin_row['last_name']).'</h5>';
        
        ?>
    </div>
    <button name="nav-toggle" id="toggle-btn" class="btn" >
        <h4 class="p pl-2 pr-2 rounded" alt="toggle"><i class="fas fa-angle-double-left text-light"></i></h4>
    </button>
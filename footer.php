nav class="navbar container-fluid static-top navbar-top py-1" style="color:white">

                 <form class=" row search-top col-3" action="search.php" enctype="multipart/form-data" method="post">
                    <div class="input-group md-form form-sm form-1 pl-0" >
                      <input type="text" class="form-control my-0 "name="search_text" placeholder="Search Item" required aria-label="Search" value="<?php if(isset($_POST['searchbtn'])){echo $_POST['search_text'];} ?>">
                     <div class="input-group-prepend">
                        <button type="submit" name="searchbtn" class="btn bg-light py-1 text-primary" ><i class="fas fa-search "></i></button>
                      </div>
                     </div>
                </form>
                <a class="col-2 nav-link nav-link-top-custom py-1" href="login.php">
                Log In/Sign Up <i class="fas fa-user-plus"></i> 
                </a>

            </nav>
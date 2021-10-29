<?php 

        if (isset($_SESSION['session_user']))
        {
            echo '<li class="nav-item ">
                <a class="nav-link nav-link-main-custom" href="getfavouritelist.php"><i class="fas fa-bookmark"></i> Favourites
                        
                    </a>
                </li>';
        }

?>
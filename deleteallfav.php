<?php
include 'check_session.php';
    if (isset($_COOKIE['myfav'])) {
    foreach ($_COOKIE['myfav'] as $name => $value) {

        
        //$id=$_GET['id'];
        $uservalid = $name - $value;

        if($_SESSION['session_user'] == $uservalid)
        {
        setcookie("myfav[$name]", $value, time()-(30* 24 * 60 * 60 *60), "/");
        echo "All Cookie Deleted $name , $value";

        echo "<a href=getfavlist.php>GET LIST of FAV</a>";
        }
    }
}
    header('Location: ' . $_SERVER['HTTP_REFERER']);
//header('Location: getfavouritelist.php');
?>
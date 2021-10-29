<?php
    include 'check_session.php';
    $itemid = $_GET['iid'];

    $userid = $_SESSION['session_user'];

    //array_push($_SESSION['favlist'], $itemid);
    //$itemlist = implode(',' $_SESSION['favlist']);
    $cookieid = $userid + $itemid;
    
    // if (isset($_COOKIE['myfav']) ) {
        
    //     //if cookie already exists
    //     foreach ($_COOKIE['myfav'] as $name => $value) 
    //         {
    //             if($name == $cookieid)                      
    //             header('Location: ' . $_SERVER['HTTP_REFERER']);        
    //         }
    //     }
    // else{

        setcookie("myfav[$cookieid]", $itemid, time()+(60*60*24*30), "/");
        echo "<script>alert('Cookie added');</script>";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    //}
        //echo 'NoT AddEd!!';
?>  
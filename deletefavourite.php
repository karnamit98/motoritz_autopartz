<?php
    include 'check_session.php';
    $id=$_GET['id'];
    $name=$_GET['name'];

    setcookie("myfav[$name]", $id, time()-(30* 24 * 60 * 60 *60), "/");
    echo "<br/>Cookie Deleted";
    //echo "<br/> id=$id, name=$name";

    echo "<a href=getfavlist.php>GET LIST of FAV</a>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
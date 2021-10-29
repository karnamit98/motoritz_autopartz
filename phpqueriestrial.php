<?php
    include 'maconnection.php';
    $query = "SELECT * FROM user";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result))
        echo 'Password: '.$row['md5(password)'].'  <br />Name:'.$row['first_name'];




?>
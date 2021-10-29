<?php
    //include 'check_session.php';
    include 'maconnection.php';
    $id = $_GET['id'];
    $val = $_GET['val'];

    $query = "UPDATE user SET status = $val WHERE user_id = $id";
    $result = mysqli_query($connection, $query);
    if($result)
        header('Location: manageuser.php');
    else
        echo "<script>alert('--!! UPDATE FAILED !!--');</script>";

?>
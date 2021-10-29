<?php
    include 'check_session.php';
    include 'maconnection.php';
    $id = $_GET['id'];

    $query = "DELETE FROM user WHERE user_id = $id";
    $result = mysqli_query($connection, $query);
    if($result)
        header('Location: manageuser.php');
    else
        echo "<script>alert('--!! UPDATE FAILED !!--');</script>";

?>
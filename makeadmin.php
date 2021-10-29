<?php
    include 'check_session.php';
    include 'maconnection.php';
    $id = $_GET['id'];
    $val = $_GET['val'];

    $query = "UPDATE user SET user_type = '$val' WHERE user_id = $id";
    $result = mysqli_query($connection, $query);
    if($val == "admin")
    {
        $date = date("Y-m-d");
        $aquery = "INSERT INTO admin (user_id, date_appointed) VALUES ($id, '$date')";
        $aresult = mysqli_query($connection, $aquery);
        if($aresult)
            header('Location: manageuser.php');
        else
            echo "<script>
                    alert(' --!! UPDATES FAILED !!--');
                    </ script >";

    }
    else if($val == "user")
    {
        $aquery1 = "DELETE FROM admin WHERE user_id = $id";
        $aresult1 = mysqli_query($connection, $aquery1);
        if($aresult1)
            header('Location: manageuser.php');
        else
            echo "<script>alert('--!! UPDATE FAILED !!--');</script>";
    }
    else{}
    
    if($result)
        header('Location: manageuser.php');
    else
        echo "<script>alert('--!! UPDATE FAILED !!--');</script>";

    
    

?>
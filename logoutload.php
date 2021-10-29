<?php
    session_start();
    session_unset();
    session_destroy();
    // include('checksession.php');
    // session_destroy();

    echo"<script>
            alert('----!! USER LOGED OUT !!---- ');
        </script>";
    header("location:index.php");
    exit();
?>
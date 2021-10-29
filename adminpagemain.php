<?php
    include 'check_session.php';
    include 'maconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Motoritz Autopartz</title>
        <!--Bootstrap Core CSS-->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" / >
        <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"-->
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="css/adminstyle.css" />
        <!--Bounce In css-->
        <link rel="stylesheet" type="text/css" href="css/bouncein.css" />
        <!-- jQuery Version 1.11.0 -->
        <script src="bootstrap/js/jquery-3.4.1.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="bootstrap/js/bootstrap.js"></script>
        
        <!--Font Awesome Kit Code-->
        <script src="https://kit.fontawesome.com/86641d4077.js" crossorigin="anonymous"></script>
        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nova+Square&display=swap" rel="stylesheet" />
        <style>
        </style>
        
</head>
<body>
    <header>
      <?php  include 'adminpagesidebar.php'; ?>
    </header>
    
    <main>
        <?php
         
            echo '<h2 class="text-right text-muted pt-3 mr-3"><i class="fas fa-portrait text-info"></i> '.ucfirst($admin_row['first_name']).' '.ucfirst($admin_row['last_name']).'</h2>';
        
            include 'dashboard.php';
        ?>
    </main>

    <script>

        $(document).ready(function(){
            $("#toggle-btn").click(function(){
                $(".nav-container").animate({
                width: "toggle"
                });
            });
        });
    </script>
</body>
</html>
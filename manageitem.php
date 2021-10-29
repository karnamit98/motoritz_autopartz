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
            body{
                padding-bottom:5vh;
            }
            #mitem{
                color:#e4f9ff;
            }
            .itemselect a{
                color:#484c7f;
                text-shadow:0 0 1px #1b262c !important;
            }
            a#mgitem {
                color: #ff6464;
                border-bottom:2px solid #3282b8;
                padding-bottom:3px;
            }
            .itemselect a:hover{
                color: #ff6464;
                text-shadow:0 0 2px #1b262c !important;
                border-bottom:2px solid #3282b8 !important;
            }
            table{
                border:1px solid #5d5b6a;
                
            }
            
            th{
                background-color:#3a3535;
                color:#e4f9ff;
            }
            table, th, td, th {
                border: 2px solid #4b8e8d;
                padding:10px 30px 10px 30px;
            }
        </style>
        
</head>
<body>
    <header>
      <?php  include 'adminpagesidebar.php'; ?>
    </header>
    
    <main>
        <?php
         
            echo '<h2 class="text-right text-muted pt-3 mr-3"><i class="fas fa-portrait text-info"></i> '.ucfirst($admin_row['first_name']).' '.ucfirst($admin_row['last_name']).'</h2>';
          
            $iquery = "SELECT * FROM item";
            $iquery_result = mysqli_query($connection, $iquery);

        ?>

        <!-- SELECT WHETHER TO VIEW OR ADD NEW ITEM -->
        <div class="btn-group itemselect ml-1" >
            <a id="mgitem"  href="manageitem.php" class="mr-2">Existing Items</a>
            <a  id="aitem" href="additem.php">Add New Item</a>
        </div>

        <div id="cruditem" class="container pt-3 mx-auto">
            <h3 class="text-center text-primary"> CRUD ITEM </h3>


            <table>
            <tr>
                <th>Item ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($iquery_result))
                {
                    echo '<tr>';
                    echo '<td>'.$row['item_id']. '</td>';
                    echo '<td>'.$row['item_name']. '</td>';
                    echo '<td>'.$row['price']. '</td>';
                    echo '<td><img style="width:12vw;height:12vh;" alt ="'.$row['item_name'].'" src="uploads/item/'.$row['item_image']. '" /> </td>';
                    echo '<td> <a class="text-success" href="updateitem.php?id= '. $row['item_id'].'">Update</a></td>';
                    echo '<td><a class="text-danger" href="deleteitemload.php?id= '. $row['item_id']. '">Delete</a></td>';
                    echo '</tr>';
                }
            ?> 
        </table> 
        </div>
    </main>

    <script>

        //Side Navbar Toggle
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
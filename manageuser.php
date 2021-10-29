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
            #muser{
                color:#e4f9ff;
            }
            /* .itemselect a{
                color:#484c7f;
                text-shadow:0 0 1px #1b262c !important;
            } */
            /* a#mgitem {
                color: #ff6464;
                border-bottom:2px solid #3282b8;
                padding-bottom:3px;
            } */
            /* .itemselect a:hover{
                color: #ff6464;
                text-shadow:0 0 2px #1b262c !important;
                border-bottom:2px solid #3282b8 !important;
            } */
            table{
                border:1px solid #5d5b6a;
            }
            
            th{
                background-color:#3a3535;
                color:#e4f9ff;
            }
            table, th, td, th {
                border: 2px solid #4b8e8d;
                /*padding:10px 30px 10px 30px;*/
                padding:3px 6px 3px 6px;
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
        
            $uquery = "SELECT * FROM user";
            $uquery_result = mysqli_query($connection, $uquery);

        ?>


        <div class="container-fluid pt-3 mx-auto">
            <h3 class="text-center text-primary"> REGISTERED USERS </h3>


            <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Authencity</th>
                <!-- <th>Image</th> -->
                <th>Status</th>
                <th>Remove User</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($uquery_result))
                {
                    echo '<tr>';
                    echo '<td>'.$row['user_id']. '</td>';
                    echo '<td>'.ucfirst($row['first_name']). ' '.ucfirst($row['last_name']).'</td>';
                    echo '<td>'.$row['username']. '</td>';
                    echo '<td>'.$row['email']. '</td>';
                    echo '<td>';
                            if($row['user_type'] == 'user')
                             echo '<a href="makeadmin.php?id='.$row['user_id'].'&val=admin" class="btn btn-warning bg-warning">' .strtoupper($row['user_type']). '<i class="fas fa-exchange-alt"></i></a>';  
                            else if($row['user_type'] == 'admin')
                                echo '<a href="makeadmin.php?id='.$row['user_id'].'&val=user" class="btn btn-primary bg-primary">' .strtoupper($row['user_type']). '<i class="fas fa-exchange-alt"></i></a>';
                            else{}
                    '</td>';
                    //echo '<td><img style="width:12vw;height:12vh;" alt ="'.$row['first_name'].'" src="uploads/user/'.$row['user_image']. '" /> </td>';
                    echo '<td> ';
                                
                    if( $row['status'] == 1)
                            echo '<a href="deactivateuser.php?id='.$row['user_id'].'&val=0" class="btn btn-success bg-success"> Active <i class="fas fa-exchange-alt"></i></a>'; 
                    else if($row['status'] == 2)
                         echo '<span class="btn btn-info bg-info"> Active</span>'; 
                    else if($row['status'] == 0)
                        echo '<a href="deactivateuser.php?id='.$row['user_id'].'&val=1" class="btn btn-danger bg-danger"> Deactivated<i class="fas fa-exchange-alt"></i></a>';
                    else{}
                
                    echo '</td>';
                    echo '<td><a href="removeuser.php?id='.$row['user_id'].'" class="btn btn-dark bg-dark"> Remove User<i class="fas fa-trash-alt"></i></a></td>';
                    echo '</tr>';
                }
            ?> 
        </table> 
        </div>
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
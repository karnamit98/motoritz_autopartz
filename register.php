<?php
     session_start();
     $_SESSION['register_status'] = 0;
    //include 'check_session.php';
    include 'maconnection.php';
    //session_start();
    


    // if(isset($_SESSION['inserterror']))
    // {
    //     $message = $_SESSION['inserterror'];
    //     echo '<div class="container-fluid justify-content-center bg-dark text-success py-1" 
    //     style="position:absolute;top:0px !important;z-index:999999;">'. $message .'</div>';
    // }

    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and
        media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via
        file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
        html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.
        min.js"></script>
        <![endif]-->
        <title>Motoritz Autopartz</title>
        <!--Bootstrap Core CSS-->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" / >
        <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"-->
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="css/customstyle.css" />
        <!--Bounce In css-->
        <link rel="stylesheet" type="text/css" href="css/bouncein.css" />
        <script src="topsalescarousel.js"></script>
        <!-- jQuery Version 1.11.0 -->
        <script src="bootstrap/js/jquery-3.4.1.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="bootstrap/js/bootstrap.js"></script>
        
        <!--Font Awesome Kit Code-->
        <script src="https://kit.fontawesome.com/86641d4077.js" crossorigin="anonymous"></script>
        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nova+Square&display=swap" rel="stylesheet" />
        <!--Titilium webs-->
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet" />
        <!--Lobster Webs-->
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet" />
        <script src="customjs.js"></script>
        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <style>
            html, body{
                margin:0;
                padding:0;
                overflow-x:hidden !important; 
            }
            body, header, .age-group{
                font-family: 'Nova Square', cursive;
                
            }
            main{
                overflow:hidden !important; 
            }
            footer{
                /* overflow:hidden !important; */
                /* font-family: 'Titillium Web', sans-serif; */
                font-family: 'Nova Square', cursive;
            }            
            /*FORM STYLE*/
            .register-form .input-group:hover, .register-form .input-group:focus{
                box-shadow: 0px 0px 5px #000;
                padding-left:0;
                padding-right:0;
                border-radius: 5px 5px 5px 5px;
            }
            .register-form .create-btn:hover{
                background-color: #1089ff;
                border-color: #1089ff;
            }
            .border-md {
                border-width: 2px;
            }

            .btn-facebook {
                background: #405D9D;
                border: none;
            }


            .btn-google {
                background: #DB4437;
                border: none;
            }
            .register-container .input-group input:focus{
                border-color: lightgray;
            }

            .login-btn:hover, .btn-google:hover,  .btn-facebook:hover, .btn-google:focus, .btn-facebook:focus {
                background-color: #40514e;
                border-color: #40514e;
            }
            
            .register-container .form-control:not(select) {
                padding: 1.5rem 0.5rem;
            }

            .register-container select.form-control {
                height: 52px;
                padding-left: 0.5rem;
            }

            .register-container .form-control::placeholder {
                color: #ccc;
                font-weight: bold;
                font-size: 0.9rem;
            }
            .register-container .form-control:focus {
                box-shadow: none;
            }
            h1{
                color:#207dff;
                margin-left: 4.5vw;
            }
            
            .active{
                color:#f9fd50;
                text-decoration: underline;
            }
            .already-registered{
                margin-left:2.5vw;
            }
            #erspan{
                margin-left:3vw;
                font-size: 0.6em;
            }
        </style>
        <script>
            // Changing input group text on focus
//            $(function () {
//                $('input, select').on('focus', function () {
//                    $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
//                });
//                $('input, select').on('blur', function () {
//                    $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
//                });
//            });
//            
            //Date Picker Plugin
            $(document).ready(function(){
              var date_input=$('input[name="date"]'); //our date input has the name "date"
              var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
              var options={
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
              };
              date_input.datepicker(options);
            })
            
            /*Tool Tip*/
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
        <!--Header Section-->
        <header>
            <!--Top Header-->
            <?php include 'topnav.php' ?>
            <!-- Navigation -->
            <nav role="navigation" class="navbar navbar-expand-lg navbar-default navbar-light bg-light static-top 
            navbar-main " >
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/logopng.png" alt="motoritz autopartz logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" data-hover="dropdown" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto mx-auto" >

                            <!-- HOME -->
                            <li class="nav-item">
                            <a class="nav-link nav-link-main-custom" href="index.php"><i class="fas fa-home"></i> Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <!-- FAVOURITES -->
                            <?php include 'favouritemenu.php'; ?>

                            <!-- BRANDS -->
                            <li class="nav-item dropdown"  data-toggle="dropdown-menu">
                                <a class="nav-link nav-link-main-custom" 
                                href="brands.php">Brands <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-2">
                                <?php 
                                    $brand_name_query = "select brand_id, brand_name from brand";
                                    $brand_qry1 = mysqli_query($connection, $brand_name_query);
                                    $brand_count = mysqli_num_rows($brand_qry1);            //count of rows number of result
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $count = 0;
                                                while($row = mysqli_fetch_assoc($brand_qry1))
                                                {
                                                    if($count <= ($brand_count/2)) 
                                                    {
                                                        echo '<li class="brand-custom"><a href="brand.php?bid='.$row['brand_id'].'">'.strtoupper($row["brand_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                } 
                                                ?>    
                                            </ul> 
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                 $brand_qry2 = mysqli_query($connection, $brand_name_query);
                                                $brand_count = mysqli_num_rows($brand_qry2);            //count of rows number of result
                                                 $count = 0;
                                                 while($row = mysqli_fetch_assoc($brand_qry2))
                                                {
                                                    if($count > ($brand_count/2))    
                                                    {
                                                        echo '<li class="brand-custom"><a href="brand.php?bid='.$row['brand_id'].'">'.strtoupper($row["brand_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>    
                                </ul>
                            </li>

                            <!-- HELMETS -->
                            <li class="nav-item dropdown" data-toggle="dropdown-menu" >
                                <a class="nav-link nav-link-main-custom"
                                href="helmets.php">Helmets <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-2">
                                    <?php 
                                    $helmet_qry = "SELECT c.cat_id, c.cat_name 
                                                    FROM category c 
                                                    INNER JOIN item_category ic ON c.cat_id = ic.cat_id 
                                                    INNER JOIN item i ON ic.item_id = i.item_id 
                                                    WHERE i.item_type = 'helmet'
                                                    GROUP BY c.cat_name
                                                    ORDER BY c.cat_name;
                                                    "; 
                                    
                                    $qry2 = mysqli_query($connection, $helmet_qry);
                                    $category_count = mysqli_num_rows($qry2);            //count of rows number of result
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $count = 0;
                                                while($row1 = mysqli_fetch_assoc($qry2))
                                                {
                                                    if($count <= ($category_count/2))
                                                    {
                                                        echo '<li><a href="category.php?cid='.$row1['cat_id'].'">'.strtoupper($row1["cat_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }   
                                                ?>    
                                            </ul> 
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                 $qry3 = mysqli_query($connection, $helmet_qry);
                                                 $category_count = mysqli_num_rows($qry3);            //count of rows number of result
                                                 $count = 0;
                                                 while($row2 = mysqli_fetch_assoc($qry3))
                                                {
                                                    if($count > ($category_count/2))    
                                                    {
                                                        echo '<li><a href="category.php?cid='.$row2['cat_id'].'">'.strtoupper($row2["cat_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }
                                                ?>
                                            </ul> 
                                        </div>
                                     </div> 

                                </ul>
                            </li>
                            
                            <!-- PARTS -->
                            <li class="nav-item dropdown " data-toggle="dropdown-menu" >
                                <a class="nav-link nav-link-main-custom"
                                href="parts.php">Parts <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-2">
                                <?php 
                                    $helmet_qry = "SELECT c.cat_id, c.cat_name 
                                                    FROM category c 
                                                    INNER JOIN item_category ic ON c.cat_id = ic.cat_id 
                                                    INNER JOIN item i ON ic.item_id = i.item_id 
                                                    WHERE i.item_type = 'parts'
                                                    GROUP BY c.cat_name
                                                    ORDER BY c.cat_name;
                                                    "; 
                                    
                                    $qry2 = mysqli_query($connection, $helmet_qry);
                                    $category_count = mysqli_num_rows($qry2);            //count of rows number of result
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $count = 0;
                                                while($row1 = mysqli_fetch_assoc($qry2))
                                                {
                                                    if($count <= ($category_count/2))
                                                    {
                                                        echo '<li><a href="category.php?cid='.$row1['cat_id'].'">'.strtoupper($row1["cat_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }   
                                                ?>    
                                            </ul> 
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                 $qry3 = mysqli_query($connection, $helmet_qry);
                                                 $category_count = mysqli_num_rows($qry3);            //count of rows number of result
                                                 $count = 0;
                                                 while($row2 = mysqli_fetch_assoc($qry3))
                                                {
                                                    if($count > ($category_count/2))    
                                                    {
                                                        echo '<li><a href="category.php?cid='.$row2['cat_id'].'">'.strtoupper($row2["cat_name"]).'</a></li>';
                                                    }
                                                    $count++;
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>    
                                </ul>
                            </li>

                            <!-- PORTFOLIO -->
                            <li class="nav-item">
                                <a class="nav-link nav-link-main-custom" href="portfolio.php">Portfolio</a>
                            </li>
                        </ul>
                    </div>
                </div> 
            </nav>
        </header>
        <!--Main Body Section-->
        <main>
            
            <div class="container register-container">
                <div class="row py-5 mt-1 align-items-center">
                    <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                        <h1>Sign Up</h1>
                        <!-- Already Registered -->
                        <div class=" w-100">
                            <p class="text-muted already-registered font-weight-bold">Already Registered? <a href="login.php" class="text-primary ml-2"   data-toggle="tooltip" title="Login to your Account!" >Login</a></p>
                        </div>
                        <img src="images/h2rmobile.png" alt="Bike Image" class="img-fluid mb-3 d-none d-md-block" />
                        <p class="font-italic text-muted mb-0">Create an account for better experience of this website!</p>
                    </div>

                    <?php include 'registerload.php' ;
                            
                    ?>

                    <!-- Registeration Form -->
                    <div class="col-md-7 col-lg-6 ml-auto">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="register-form">
                        <!-- <form action="registerload.php" method="POST" enctype="multipart/form-data" class="register-form"> -->
                            <div class="row">
                                
                                <!-- First Name -->
                                <div class="input-group col-lg-6 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-user text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="firstName" type="text" name="firstname" 
                                    value="<?php if(isset($_POST['registersubmit'])){ echo $_POST['firstname'];} ?>" placeholder="First Name" class="form-control bg-white border-left-0 border-md" data-toggle="tooltip" title="Enter Your First Name (Only Alphabets)!" />
                                </div>
                                

                                <!-- Last Name -->
                                <div class="input-group col-lg-6 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-user text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="lastName" type="text" name="lastname"
                                    value="<?php if(isset($_POST['registersubmit'])){ echo $_POST['lastname'];} ?>" placeholder="Last Name" class="form-control bg-white border-left-0 border-md"  data-toggle="tooltip" title="Enter Your Last Name (Only Alphabets)!" />
                                </div>
                                <span id="erspan" class="text-danger" ><?php echo $fnameemptyerror; ?></span>
                                <span id="erspan" class="text-danger" style="margin-left:15vw;" ><?php echo $lnameemptyerror; ?></span>

                                <!-- Email Address -->
                                <div class="input-group col-lg-12 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" name="email" 
                                    value="<?php if(isset($_POST['registersubmit'])){ echo $_POST['email'];} ?>" placeholder="Email Address" class="form-control bg-white border-left-0 border-md"  data-toggle="tooltip" title="Enter a valid Email Address!" />
                                </div>
                                <?php
                                    //if(!empty($_SESSION['email_error']))
                                      //  echo $_SESSION['email_error'];  
                                ?>
                                 <span id="erspan" class="text-danger" ><?php echo $emailemptyerror; ?></span>
                                <span id="erspan" class="text-danger" ><?php echo $emailerror; ?></span>
                                <span id="erspan" class="text-danger"><?php echo $duplicateusererror; ?></span>
                                
                                <!-- Username -->
                                <div class="input-group col-lg-12 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="username" type="text" name="username" 
                                    value="<?php if(isset($_POST['registersubmit'])){ echo $_POST['username'];} ?>" placeholder="Username" class="form-control bg-white border-left-0 border-md"  data-toggle="tooltip" title="Enter a unique Username!" />
                                </div>
                                <?php
                                    // if(!empty($_SESSION['duplicateusererror'])){
                                    //     echo $_SESSION['duplicateusererror'];}
                                ?>
                                 <span id="erspan" class="text-danger" ><?php echo $usernameemptyerror; ?></span>
                                <span id="erspan" class="text-danger" ><?php echo $usernameerror; ?></span>
                                <span id="erspan" class="text-danger"><?php echo $duplicateusererror; ?></span>
                                

                                <!-- Phone Number -->
                                <div class="input-group col-lg-12 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-phone-square text-muted"></i>
                                        </span>
                                    </div>
                                    <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted"  data-toggle="tooltip" title="Enter your Country Phone Code!" >
                                        <option value="">+977</option>
                                        <option value="">+91</option>
                                        <option value="">+44</option>
                                        <option value="">+1</option>
                                    </select>
                                    <input id="phoneNumber" type="tel" name="phone" 
                                    value="<?php if(isset($_POST['registersubmit'])){ echo $_POST['phone'];} ?>" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3"  data-toggle="tooltip" title="Enter your Contact Number!" />
                                </div>
                                <?php
                                    //if(!empty($_SESSION['phone_error']))
                                      //  echo $_SESSION['phone_error'];
                                ?>
                                 <span id="erspan" class="text-danger" ><?php echo $phoneemptyerror; ?></span>
                                
                                <!-- Address -->
                                <div class="input-group col-lg-12 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fas fa-map-marker-alt text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="address" type="text" name="address"
                                    value="<?php if(isset($_POST['address'])){ echo $_POST['address'];} ?>" placeholder="Residential Address" class="form-control bg-white border-left-0 border-md"  data-toggle="tooltip" title="Enter Your Address!" />
                                </div>
                                <span id="erspan" class="text-danger" ><?php echo $addressemptyerror; ?></span>


                                <!-- AGE GROUP -->
                                <div class="input-group col-lg-12 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fas fa-child text-muted"></i>
                                        </span>
                                    </div>
                                    <select id="age" name="age" class="form-control custom-select bg-white border-left-0 border-md age-group"  data-toggle="tooltip" title="Enter Your Age Group!" >
                                    
                                    <?php
                                    if(isset($_POST['age']))
                                    {
                                        $to=$_POST['age'];
                                        if($to=="Below 11")
                                            $selected="Below 11";
                                        else if($to=="11 - 15")
                                            $selected="11 - 15";
                                        else if($to=="16 - 20")
                                            $selected="16 - 20";
                                        else if($to=="21 - 25")
                                            $selected="21 - 25";
                                        else if($to=="26 - 30")
                                            $selected="26 - 30";
                                        else if($to=="31 - 35")
                                            $selected="31 - 35";
                                        else if($to=="36 - 40")
                                            $selected="36 - 40";
                                        else if($to=="Above 40")
                                            $selected="Above 40";
                                        else
                                            $selected="Age Group";
                                    }
                                    else
                                        $selected="Age Group";
                                    ?>                        
                                        <option value="<?php if($selected != 'Age Group') echo @$selected; ?>">
                                                    <?php echo @$selected; ?></option>
                                        <option value="Below 11">Below 11</option>
                                        <option value="11 - 15">11 - 15</option>
                                        <option value="16 - 20">16 - 20</option>
                                        <option value="21 - 25">21 - 25</option>
                                        <option value="26 - 30">26 - 30</option>
                                        <option value="31 - 35">31 - 35</option>
                                        <option value="36 - 40">36 - 40</option>
                                        <option value="Above 40">Above 40</option>
                                    </select>
                                </div>
                                <span id="erspan" class="text-danger" ><?php echo $ageemptyerror; ?></span>
                                
                                <!-- Birth Date -->
                                <!-- <div class="input-group col-lg-6 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fas fa-baby text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="date" type="text" required name="date" placeholder="MM/DD/YYYY"
                                    value = "<?php //if(!empty($_POST['registersubmit'])){ echo $_POST['date']; } ?>" class="form-control bg-white border-left-0 border-md" data-toggle="tooltip" title="Enter Your Birthdate!" />
                                </div>
                                <?php
                                   // if(isset($_SESSION['date_error']))
                                     //   echo $_SESSION['date_error'];
                                ?> -->
                                <!--
                                <div class="form-group">  Submit button 
                                 <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                                </div>
                                -->
                                
                                <!-- Password --><div class="row">
                                <div class="input-group col-lg-6 mt-2"  style="position:relative;left:1vw;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-lock text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="password" type="password" name="password" value="<?php if(isset($_POST['registersubmit'])){ echo $_POST['password']; } ?>"  placeholder="Password" 
                                    class="form-control bg-white border-left-0 border-md" data-toggle="tooltip" title="Password must be of minimum SIX CHARACTERS and includes at least ONE CAPITAL LETTER, A NUMBER and A SYMBOL! " />
                                    
                                </div>
                                <!-- Password Confirmation -->
                                <div class="input-group col-lg-6 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-lock text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="passwordConfirmation" type="password" name="confirmpassword" 
                                    value="<?php if(isset($_POST['registersubmit'])){ echo $_POST['confirmpassword']; } ?>" placeholder="Confirm Password" 
                                    class="form-control bg-white border-left-0 border-md"  data-toggle="tooltip" title="Password must be of minimum SIX 
                                    CHARACTERS and includes at least ONE CAPITAL LETTER, A NUMBER and A SYMBOL! " />
                                </div></div>
                                <?php
                                    // if(!empty($_SESSION['password_length_error']))
                                    //     echo $_SESSION['password_length_error'];
                                
                                    // if(!empty($_SESSION['password_error']))
                                    //     echo $_SESSION['password_error'];
                               
                                    // if(!empty($_SESSION['cpassword_error']))
                                    //     echo $_SESSION['cpassword_error'];
                                ?>
                                <span id="erspan" class="text-danger" ><?php echo $passwordemptyerror; ?></span>
                                <span id="erspan" class="text-danger"  style="margin-left:15vw;" ><?php echo $confirmpasswordemptyerror; ?></span>
                                <span id="erspan" class="text-danger" ><?php echo $passwordlenerror; ?></span>
                                <span id="erspan" class="text-danger" ><?php echo $passwordvalerror; ?></span>
                                <span id="erspan" class="text-danger" ><?php echo $confirmpassworderror; ?></span>

                                <!-- Terms and Conditions -->
                                <div class="custom-control custom-checkbox" style="position:relative;">
                                    <input type="checkbox" class="custom-control-input" id="terms" name="terms">
                                    <label class="custom-control-label" for="terms">I agree to all the terms and conditions of motoritz autopartz.</label>
                                </div>
                                <span id="erspan" class="text-danger" ><?php echo $termsemptyerror; ?></span>

                                <!-- Submit Button -->
                                <div class="form-group col-lg-12 mx-auto mb-0 mt-3"   data-toggle="tooltip" title="Sign Up!" >
                                    <input class="btn btn-success btn-block py-2" type="submit" value="Create Account" name="registersubmit" >
                                </div>

                                <!-- Divider Text -->
                                <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                                    <div class="border-bottom w-100 ml-5"></div>
                                    <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                                    <div class="border-bottom w-100 mr-5"></div>
                                </div>

                                <!-- Social Login -->
                                <div class="form-group col-lg-12 mx-auto">
                                    <a href="#" class="btn btn-primary btn-block py-2 btn-facebook"  data-toggle="tooltip" title="Sign Up with Facebook!" >
                                        <i class="fab fa-facebook-f mr-2"></i>
                                        <span class="font-weight-bold">Continue with Facebook</span>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-block py-2 btn-google"  data-toggle="tooltip" title="Sign Up with Google!" >
                                        <i class="fab fa-google mr-2"></i>
                                        <span class="font-weight-bold">Continue with Google</span>
                                    </a>
                                </div>

                                

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main> 
        
        <!--Footer Section-->
        
        <!-- Footer -->
       <footer class="page-footer font-small blue"> 
            <!--Subscribe Newsteller-->
            <div class="container-fluid newsteller">
                <h3>SUBSCRIBE US FOR LATEST UPDATES</h3>
                <hr class="hr-1 mx-auto">
                <form class="mc-trial row text-center">
                    <div class="form-group col-md-4 col-md-offset-2 col-sm-4">
                        <div class="controls">
                            <input name="name" placeholder="Enter Your Name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <div class="controls">
                            <input name="email" placeholder="Enter Your Email" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-md-4">
                        <p>
                            <button name="submit" class="btn btn-block btn-outline-light btn-submit"  style="padding:1.6vh;">Submit<i class="fa fa-arrow-right"></i></button>
                        </p>
                    </div>
                </form>
            </div> 
            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left"> 
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">
                        <!-- Content -->
                        <a href="index.html" class="nav-link">
                            <h4 class="text-uppercase .foot-logo" style="font-family: 'Lobster', cursive;overflow:hidden;">
                                <span style="color:#5bd1d7">Motoritz</span>
                                <span style="color:#ff502f"> Autopartz</span>
                            </h4>
                        </a>
                        <p>Motoritz website is an ecommerce website designed for selling motorcycle accessories, 
                            parts as well as its riding gears. This website was created by Amit Karn who studies
                            at The British College located at Thapathali, Kathmandu, Nepal as an assignment project of
                            the module Web Applications and Design. This website was created on 6th January, 2020!
                        </p>
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3"> 
                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">
                        <!-- Links -->
                        <h5 class="text-uppercase   text-center" style="color:#ffe26f;overflow:hidden;">Navigation</h5>
                        <ul class="list-unstyled  text-center">
                            <li>
                                <a href="index.php" class="foot-link">Home</a>
                            </li>
                            <li>
                                <a href="brands.php" class="foot-link">Brands</a>
                            </li>
                            <li>
                                <a href="helmets.php" class="foot-link">Helmets</a>
                            </li>
                            <li>
                                <a href="parts.php" class="foot-link">Parts</a>
                            </li>
                            <li>
                                <a href="portfolio.php" class="foot-link">Portfolio</a>
                            </li>
                            <li>
                                <a href="#!" class="foot-link">Account</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">
                        <!-- Links -->
                        <h5 class="text-uppercase  text-center" style="color:#ffe26f;overflow:hidden;">Social Links</h5>
                        <ul class="list-unstyled  text-center">
                            <li>
                                <a href="https://www.linkedin.com/in/amit-karn-488174162/" style="font-family: 'Titillium Web', sans-serif;color:#0075f6;" target="blank" class="foot-link">
                                    <i class="fab fa-linkedin" style="font-size:14pt;"></i><span style="-size:12pt;"> Linked In</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/imamityk98" style="font-family: 'Titillium Web', sans-serif;color:#00acee;" target="blank" class="foot-link">
                                    <i class="fab fa-twitter-square" style="font-size:14pt;"></i><span style="font-size:12pt;"> Twitter</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/amit.karn.982" style="font-family: 'Titillium Web', sans-serif;color:#51eaea;" target="blank" class="foot-link">
                                    <i class="fab fa-facebook-square" style="font-size:14pt;"></i><span style="font-size:12pt;"> Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/theamittt/" style="font-family: 'Titillium Web', sans-serif;color:#f857b5;" target="blank" class="foot-link">
                                    <i class="fab fa-instagram" style="font-size:14pt;"></i><span style=" font-size:12pt;"> Instagram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 "> © 2020 Copyright &nbsp;&nbsp; | &nbsp;&nbsp; 
                <a href="index.php"> Motoritz Autopartz</a> &nbsp;&nbsp; | &nbsp;&nbsp; Amit Karn 
            </div>
        </footer>
        <!-- Footer--> 

      <script>
            $(document).ready(function(){
                //z-indeces of navbar and search-box when they roll over each other
                $(".navbar-main").css("z-index", "10");
                $(".landing-page-content").css("z-index", "9");
                $(".navbar-main").css("top", "40px");

                //when page reloads, the navbar goes on top even if the scroll bar is slided down
                if($("body").scrollTop() > 20 || $("html").scrollTop() > 20) {
                    $(".navbar-main").css("top", "-5px");
                }
                $(window).scroll(function(){
                    if($("body").scrollTop() > 20 || $("html").scrollTop() > 20) {
                    $(".navbar-main").css("top", "-5px");
                    $(".container").css("background-color","#ffffff");
                    $(".navbar-main").children().css("box-shadow","0px 0px 4px #5d5b6a");
                    } else {
                        $(".navbar-main").css("top", "40px");
                        $(".container").css("background-color","transparent");
                        $(".navbar-main").children().css("box-shadow","0 0 0");
                    }
                });          
            });     
        </script> 
    </body>
</html>
<?php
    include 'registerload.php';
?>


<?php

    include 'maconnection.php';
    $firstname = $lastname = $email = $username = $password = $address = $age = $phone =$confirmpassword = "";
    $fnnameerror = $lnameerror = $emailerror = $usernameerror = $passwordlenerror = $passwordvalerror = $addresserror = $ageerror = $confirmpassworderror = $duplicateusererror = "";
    $fnameemptyerror = $lnameemptyerror = $usernameemptyerror = $emailemptyerror = $passwordemptyerror = $confirmpasswordemptyerror = $ageemptyerror = $addressemptyerror = $termsemptyerror = $phoneemptyerror = "";
    $boolean = false;

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['registersubmit'])){

            if(empty($_POST['email']))
            {
                $emailemptyerror = "Empty email!!";
                $boolean = false;
            }
            else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $emailerror = "Invalid Email";
                $boolean = false;
            }
            else{
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $boolen = true;
            }

            if(empty($_POST['password']))
            {
                $passwordemptyerror = "Please enter a password!";
                $boolean = false;
            }
            else{
                $plength = strlen($_POST['password']);
                    if($plength > 20){
                        $passwordlenerror = "Password should be less than 20 characters!";
                        $boolean = false;
                    }
                    else if($plength < 6){
                        $passwordlenerror = "Password should be greater than 6 characters!";
                        $boolean = false;
                    }
                $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[A-Z])(?=.*[A-Z]).{6,}$/';
                if (!preg_match($pattern, $_POST['password'])) {
                $passwordvalerror = "Password must contain at least one capital letter, one number and one special character!";
                    $boolean = false;
                }
                else{
                // $password = filter_var(($_POST['password']), FILTER_SANITIZE_STRING);
                $password = $_POST['password'];
                    $confirmpassword = $_POST['confirmpassword'];
                    $boolean = true;
                }
            }
            if(empty($_POST['confirmpassword']))
            {
                $confirmpasswordemptyerror = "Please enter password confirmation!";
                $boolean = false;
            }
            else if($_POST['password'] != $_POST['confirmpassword']){
                $confirmpassworderror = "Passwords Do Not Match..!";
                $boolean = false;
            }
            else{}

            
            if(empty($_POST['firstname']))
            {
                $fnameemptyerror = "Empty first name!";
                $boolean = false;
            }
            if(empty($_POST['lastname']))
            {
                $lnameemptyerror = "Empty last name!";
                $boolean = false;
            }
            if(empty($_POST['username']))
            {
                $usernameemptyerror = "Empty username!";
                $boolean = false;
            }
            if(empty($_POST['address']))
            {
                $addressemptyerror = "Empty address!";
                $boolean = false;
            }
            if(empty($_POST['phone']))
            {
                $phoneemptyerror = "Enter contact number!";
                $boolean = false;
            }
            if(empty($_POST['terms']))
            {
                $termsemptyerror = "Please agree to our terms and conditions to signup!";
                $boolean = false;
            }
            if(empty($_POST['age']))
            {
                $ageemptyerror = "Enter age!";
                $boolean = false;
            }


            $fname = filter_var(($_POST['firstname']), FILTER_SANITIZE_STRING);
            $lname = filter_var(($_POST['lastname']), FILTER_SANITIZE_STRING);
            $phone = filter_var(($_POST['phone']), FILTER_SANITIZE_STRING);
            $age = filter_var(($_POST['age']), FILTER_SANITIZE_STRING);
            $address = filter_var(($_POST['address']), FILTER_SANITIZE_STRING);
            if($boolean) {

                $sql = "SELECT * FROM user WHERE username = '".$_POST['username']."' AND email = '".$_POST['email']."' ";
                $result = mysqli_query($connection, $sql);
                
                if(mysqli_num_rows($result) > 0)
                {
                    $boolean = false;
                    $duplicateusererror = "Username or Email already exists..! ";
                    echo"<script>
                    alert('Username or Email already exists..! ');
                    </script>";
                    
                }
                else if(mysqli_num_rows($result) == 0 && $boolean)
                {
                    //$date = date("Y-m-d", strtotime($_POST['date']));
                    $insertquery = "INSERT INTO user (first_name, last_name, age_range, contact_number, 
                    address,  email, user_type, username, password, status)
                    VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['age']."', '".$_POST['phone']."','".$_POST['address']."','". $_POST['email']."',
                    'user', '".$_POST['username']."','". md5($password)."', 1)";
                    $insertresult = mysqli_query($connection, $insertquery);            //VALUES ('".$_POST['value1']."', '".$_POST['value2']."')");
                    if($insertresult){
                        $boolean = false;
                        echo "<script>
                            alert(' ---!!!---USER REGISTRATION SUCCESSFUL---!!!---');
                            window.location.href = 'index.php';
                            </script>";
                        // $_SESSION['register_status'] == 1;
                        // if($_SESSION['register_status'] == 1)
                        //     {
                        //         echo ' </script>';
                        //     }
                    }
                }
                else{
                        
                }
            }
            
            
        }
    }

?> 


































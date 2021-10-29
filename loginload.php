<?php  
   include 'maconnection.php';
    $loginerror = "";
	$loginempty = "";
    $userdeactivated = "";
    if(isset($_POST["loginsubmit"]))
    {  
        if(!empty($_POST['user']) && !empty($_POST['password'])) 
        {  
            $user = $_POST['user'];  
            $email = trim($_POST['user']);
            $password = md5 ($_POST['password']);  
        
            $userquery = "SELECT * FROM user WHERE username='$user' AND password='$password'";
            $useremailquery = "SELECT * FROM user WHERE email='$email' AND password='$password'";
            //$adminquery = "SELECT * FROM user, admin WHERE admin.user_id = user.user_id AND user.username='".$user."' AND user.password='".MD5($pass)."'";
            $userresult = mysqli_query($connection, $userquery);
            $useremailresult = mysqli_query($connection, $useremailquery);
            //$adminresult = mysql_query($connection, $adminquery);  
            $numrows = mysqli_num_rows($userresult);  
            $numemailrows = mysqli_num_rows($useremailresult);
            if($numrows != 0 || $numemailrows != 0)  
            {  echo "ENTERED 1";
                while($row=mysqli_fetch_assoc($userresult))  
                {  $_POST['user'] = "ENTERED 2";
                    $dbuserid = $row['user_id'];
                    $dbusername = $row['username'];  
                    $dbemail = trim($row['email']);
                    $dbpassword = $row['password']; 
                    $dbfirstname = $row['first_name'];
                    $dblastname = $row['last_name'];
                    $dbuserstatus = $row['status'];
	//$_POST['user'] = "ENTERED";
                    if((($user == $dbusername) || ($email == $dbemail)) && ($password == $dbpassword) && ($dbuserstatus != 0))  
                    {  echo "ENTERED 3";
                        //session_start();  
                        $_SESSION['session_user'] = $dbuserid; 
                        $temp = "$dbfirstname $dblastname";
                        $_SESSION['session_fullname'] =  $temp;
                        
                        echo"<script>
                            alert('----!! USER LOGED IN SUCCESSFULLY !!---- ');
                            
                        </script>";
                        //header('Location:index.php');
                       // session_start();
                        //$secondsWait = 1;
                        //header("Refresh:$secondsWait");
                        /* Redirect browser */  
                        //include 'check_session.php';
                        //header('Location: index.php');
                       
                    }  
                    else{ echo "ENTERED 4";
                        $userdeactivated = "USER DEACTIVATED BY THE ADMIN";
                        echo"<script>
                            alert('----!! USER CURRENTLY DEACTIVATED !!---- ');
                            
                        </script>";
                    }
                    
                    
                }  
                // while($row = mysqli_fetch_assoc($adminresult)){
                //     $dbadminusername = $row['username'];
                //     $dbadminpassword = $row['password'];
                // }
                
            }
            else {  echo "ENTERED 5";
                echo"<script>
                alert('--!! INCORRECT Username or Password !!-- ');
                </script>";
                $loginerror = "Invalid username or password!";  
            } 
                 
        
        } 
        else echo "ENTERED 6";
        {  
			$loginempty = "All fields are required!";
            // "All fields are required!";  
        }  
        
    }
?> 
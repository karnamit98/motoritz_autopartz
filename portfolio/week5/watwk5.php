<?php error_reporting(E_ALL);?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Week5Task2</title>
        <style>
            a:link, a:visited {
                background-color: #f44336;
                background-color: green;
                color: white;
                padding: 14px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-weight:bolder;
                font-size:11pt;
            }

            a:hover, a:active {
                background-color: red;
                font-weight:border;
                font-size:11pt;
            }
            body{
                margin-left:15%;
                margin-right:15%;
                border-left:2px solid grey;
                border-right:2px solid grey;
                padding-left:20px;
                padding-right:15px;
                margin-top:2%;
                border-bottom:2px solid grey;
                background-color:#fcf5b0;
            }
            hr{margin-left:0px;width:97%;}
        </style>
    </head>
    <body>
        <small style="float:right;margin-right:25px"> <a href="../../watIndex.php">Back to Home</a></small> 
        <br /><b>Student ID:</b> c7202634 <br /> 
                <b>Name:</b> Amit Kumar Karn
        <hr />
        <h1>Processing Input from HTML Forms</h1> 
        <h2>Login Form using GET</h2> 
        <form method="POST" action="watwk5.php" enctype="multipart/form-data"> 
            <fieldset> 
                <legend> 
                Login 
                </legend> 
                <label for="email">Email: </label> 
                <input type="text" name="txtEmail" value="<?php if(isset($_POST['txtEmail'])){
                                                            echo $_POST['txtEmail'];    
                                                            } ?>"/><br /> 
                <label for="passwd">Password: </label> 
                <input type="password" name="txtPass" /><br /> 
                <input type="submit" value="Submit" name="loginSubmit"  /> 
                <input type="reset" value="Clear" /> 
            </fieldset> 
        </form>
        
        <br /><hr /><br />

        <form method="POST" action="watwk5.php"> 
            <fieldset> 
                <legend>Comments</legend> 
                <label for="email">Email: </label> 
                <input type="text" name="email" value="<?php if(isset($_POST['email'])){
                                                                echo $_POST['email'];
                                                                } ?>" /><br /> 
                <textarea rows="4" cols="50" name="comment">Comment</textarea><br /> 
                <label for="">Click to Confirm: </label> 
                <input type="checkbox" name="chkConfirm" value="agree"><br /> 
                <input type="submit" value="Submit" name="btnsubmit"/> 
                <input type="reset" value="Clear" name="btnclear"/> 
            </fieldset> 
        </form>

        <br /><hr />

        <h3>Tax Calculator</h3>
        <form method="POST" action="watwk5.php" >
            <fieldset>
                <legend>Without TAX Calculator</legend>
                <label for="taxprice">After Tax Price: </label>
                <input type="text" name="taxprice" value="<?php if(isset($_POST['taxprice'])){
                                                                    echo $_POST['taxprice'];
                                                                } ?>" />
                <label for="taxrate">Tax Rate: </label>
                <input type="text" name="taxrate" value="<?php if(isset($_POST['taxrate'])){
                                                                    echo $_POST['taxrate'];
                                                                } ?> " />
                <input type="submit" value="Submit" name="taxsubmit" />
                <input type="reset" value="Clear" name="taxclear" />
            </fieldset>
        </form>
        
        <br /><hr />
        <h1>Passing Data Appended to an URL</h1> 
        <h2>Pick a category</h2> 
        <a href="watWk5.php?cat=Films">Films</a> 
        <a href=" watWk5.php?cat=Books">Books</a> 
        <a href=" watWk5.php?cat=Music">Music</a> 
        <br /><br />
    </body>
</html>
<?php
    if(isset($_GET['cat']))
    {
        echo '<br /><hr />';
        echo '<b style="color:green">You selected ' .$_GET['cat']. ' category!</b><br />';
    }
    //if($_SERVER['REQUEST_METHOD'] == 'GET')   //retrieving form data via get method
    //if($_SERVER['REQUEST_METHOD'] == 'POST')    //retrieving form data via post method
    //ensures if submit button is clicked before gathering the form data
    if(isset($_POST['loginSubmit']))
    {
        //$email = $_GET['txtEmail'];
        //$pass = $_GET['txtPass'];
        $email = filter_var($_POST['txtEmail'], FILTER_SANITIZE_EMAIL);    //storing sanitized email value
        $pass = $_POST['txtPass'];      //storing password value
            
        if(!empty($pass) && !empty($email))     //if both email and password is set
        {
            
            echo '<hr />';
            echo "<b>Output from Login Form</b> <br />";
            if(filter_var($email, FILTER_VALIDATE_EMAIL))   //using filter function to validate email
                echo "Email: $email  Password: $pass";
            else
            echo '<span style="color:red">Email \''.$email.'\' is not a valid email address!</span>';
            echo '<br /><br />';
        }
        else{
            if(empty($email) && empty($pass))   //if both email and password are empty
            {
                echo '<hr />';
                echo '<b style="color:red">Output from Login Form<br />';
                echo "Email must not be empty!!<br />";
                echo "Password must not be empty!!</b><br />";
            }
            else if(empty($pass))   //if only password is empty
            {
                echo '<hr />';
                echo '<b style="color:red">Output from Login Form <br />';
                echo "Password must not be empty!!</b><br />";
            }
            else    //else if only email is empty
            {
                echo '<hr />';
                echo '<b style="color:red">Output from Login Form <br />';
                echo "Email must not be empty!!</b><br />";
            }
        }
    }
    else{

    }

    //for comment form
    if(isset($_POST['btnsubmit']))  //checks if submit button is clicked
    {
        $email2 = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);  //storing sanitized email
        $comment = $_POST['comment'];   //storing comment
        if(isset($_POST['chkConfirm'])) //if confirm is clicked or set
            $confirm = 'Agreed <br />';
        else    
            $confirm = 'Not Agreed <br />';
        
        if(!empty($email2) && !empty($comment)) //if both email and comment has values set
        {
            echo '<hr />';
            echo '<b>Output from Comments Form</b><br />';
            if(filter_var($email2, FILTER_VALIDATE_EMAIL))  //using filter function to validate email
                echo 'Email: ' .$email2;
            else
                echo '<span style="color:red">Email \''.$email2.'\' is not a valid email address!</span>';
            echo '<br />Comment: ' .$comment;
            echo '<br />Confirm: '.$confirm;
            echo '<br />';
        }
        else{
            if(empty($email2) && empty($comment))   //if both email and comment are empty
            {
                echo '<hr />';
                echo '<b style="color:red">Output from Comments Form<br />';
                echo 'Email must not be empty!!<br />';
                echo 'Comment section can\'t be empty!!</b><br />';
            }
            else if(empty($email))  //if only email is empty
            {
                echo '<hr />';
                echo '<b style="color:red">Output from Comments Form<br />';
                echo 'Email must not be empty!!</b><br />';
            }
            else        //if only comment is empty
            {
                echo '<hr />';
                echo '<b style="color:red">Output from Comments Form<br />';
                echo 'Comment must not be empty!!</b><br />';
            }
        }
    }

    //for tax calculator
    if(isset($_POST['taxsubmit']))  //checking if submit button of tax calculator form is clicked
    {
        $taxprice = $_POST['taxprice']; //storing taxprice value
        $taxrate = $_POST['taxrate'];  //storing taxrate value

        if(!empty($taxprice) && !empty($taxrate))   //if both tax rate and tax price has values initialized
        {
            //validating taxprice and taxrate as floats
            if(preg_match("/^[0-9]+\.[0-9]{2}/", $taxprice) && filter_var($taxrate, FILTER_VALIDATE_INT))
            {
                echo '<hr />';
                echo '<b>Output from Tax Calculator Form</b><br />';
                echo 'Before Tax Price: ' .$taxprice. '<br />';
                echo 'Tax Rate: ' .$taxrate. '<br />';
                $btaxprice = (100 * $taxprice)/(100 + $taxrate);        //before tax price calculation
                echo '<b>Before Tax Price: ' .number_format($btaxprice, 2). '</b></br>';
            }
            else if(!preg_match("/^[0-9]+\.[0-9]{2}/", $taxprice) && !filter_var($taxrate, FILTER_VALIDATE_INT)){
                echo '<hr />';
                echo '<b style="color:red">Output from Tax Calculator Form<br />';
                echo 'Please enter the price in the format 9.99<br />';
                echo 'Please enter the tax rate in whole number</b><br />';
            }
            else if(!preg_match("/^[0-9]+\.[0-9]{2}/", $taxprice))
            {
                echo '<hr />';
                echo '<b style="color:red">Output from Tax Calculator Form<br />';
                echo 'Please enter the price in the format 9.99</b><br />';
            }
            else if(!filter_var($taxrate, FILTER_VALIDATE_INT))
            {
                echo '<hr />';
                echo '<b style="color:red">Output from Tax Calculator Form<br />';
                echo 'Please enter the tax rate in whole number</b><br />';
            }
            else {}
        }
        else 
        {
            echo '<b style="color:red">Output from the Tax Calculator Form!<br />';
            echo 'Both tax rate and tax price values must be entered!</b><br />';
        }

    }
    echo '<br />';

?>
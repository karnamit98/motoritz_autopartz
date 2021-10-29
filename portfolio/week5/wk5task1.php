<!DOCTYPE html> 
<html>  
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>WAT Week 5 Progress Check</title>
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
        <h1>WAT Week 5 Progress Check</h1>   
        <h1>Generate Statements</h1>   
        <?php   
            //produce code that will display your name and ID on separate lines      
            //produce code to output the string "It's not more than £3" including all   
            //speech marks.  
            echo 'Name: Amit Karn <br />ID: c7202634';
            echo '<br />It\'s not more than &pound;3';  //using escape character \ for '  and &pound; to print pound sign   
        ?>   
        <hr />
        <h1>Use Arithmetic Operators </h1>   
        <?php   
            /*Calculate annual interest paid for a loan. Declare two variables one to    
            *hold the value of loan and one the interest rate. Set these to 500 and 3.5   
            *respectively. Calculate the annual interest payable based on the formula   
            *interest paid = (loan amount / 100) x rate of interest   
            *Display the following statement using your variables:   
            * Loan: 500   
            * Rate: 3.5%   
            * Payable: £17.50   
            */   
            
            //declaring variables
            $loan = 500;
            $interest_rate = 3.5;
            $annual_interest = ($loan/100) * $interest_rate;    //calculationg interest
            //displaying data
            echo 'Loan: ' .$loan;
            echo '<br />Rate: ' .$interest_rate. '%';
            echo '<br />Payable: &pound;' .number_format($annual_interest, 2);  //number_format function to display 2 decimal numbers
        ?> 
        <hr />  
        <h1>Use Conditional Statements</h1>   
        <?php   
            /*Declare variables to hold username and password, assign the values    
            * "user01" and "pass".  Write code that will test the value    
            * of your two variables and display the word "success" if    
            * user is "user01" and password is "passwd", or "fail" if not.    
            */      
            /*Use the same variables but this time write code to first test if    
            * the password is at least 6 characters in length, if not    
            * display a message "Please use at least 6 characters", if this test     
            * is passed then test as before.     */   
            //initializing username and password  
            $username = "user01";
            $password = "pass";
            if($username == "user01" && $password == "passwd")  //if condition check for username and password
                echo 'Success!';
            else
                echo 'Fail!';   
            
            if(strlen($password) >= 6)      //checking to see if the passord is at least 6 character lengthy
            {
                if($username == "user01" && $password == "passwd")  //if condition check for username and password
                    echo '<br />Success!';
                else
                    echo '<br />Fail!';  
            }
            else    
                echo '<br />Please use at least 6 characters!';

            echo '<br /><br />';
        ?>  
        </body> 
        </html> 
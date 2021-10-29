<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel='stylesheet' type='text/css' href="../style.css" />
        <title>Login</title>
        <style>
            fieldset{
                border: 2px solid #4b8e8d;
                padding:0px 0px 20px 50px;
            }
        </style>
    </head>
    <body>
        <!--h3>Login</h3--> 
        <form method="post" action="./login.php"> 
            <fieldset>
                <legend style="color:#e25822"><h2>Login</h2></legend>
                <input type="text" name="txtUser" placeholder="Username" value=''/> <br />
                <input type="password" name="txtPass" placeholder="Password" />  <br /><br />
                <input type="submit" name="subLogin" value="submit" /> 
            </fieldset>
        </form>
    </body>
</html>
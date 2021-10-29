<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My web document</title>
    <link href="test.css" rel="stylesheet" type="text/css" />
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
            html{background-color: #00909e;}
            body{
                margin-left:15%;
                margin-right:15%;
                border-left:2px solid grey;
                border-right:2px solid grey;
                padding-left:20px;
                border-color:brown;
                border-bottom:2px solid grey;
                background-color: #00909e;
            }
            hr{margin-left:0px;width:97%;border-color:brown;}  
    </style>
  </head>
  <body>
    <small style="float:right;margin-right:25px"> <a href="../../watIndex.php">Back to Home</a></small> 
    <section id="container">
      <!--p>Below is a PHP generated message:-</p-->
      <?php    
        echo "<br /><br /><b>Student ID:</b> c7202634 <br /> 
        <b>Name:</b> Amit Kumar Karn";
        echo "<hr /><br />";
        echo '<p>Below is a PHP generated message:-</p><br />';
        include "message.php";  
        echo '<br /><br />'  
      ?>
    </section>
  </body>
</html>

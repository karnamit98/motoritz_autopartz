<!DOCTYPE html>
<html lang="en">    
    <head>       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHP Further Fundamentals</title>       
        <link type="text/css" rel="stylesheet" href="main.css" />    
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
                border-bottom:2px solid grey;
                background-color:#fcf5b0;
            }
            hr{margin-left:0px;width:97%;}
        </style>
    </head>    
    <body>      
        <small style="float:right;margin-right:25px"> <a href="../../watIndex.php">Back to Home</a></small> 
           
    </body> 
</html> 
<?php 
    echo " <h1>Further Fundamentals of PHP</h1>";
    echo "<b>Student ID:</b> c7202634 <br /> 
            <b>Name:</b> Amit Kumar Karn";
    echo "<hr />";
    echo "<h2>Arrays</h2> <h3>Simple Arrays</h3>";
    $products = array("t-shirt", "cap", "mug");     //initializing array products
    print_r($products);                         //displaying the array products
    $products[1] = "shirt";                    //replacing the 2nd element of the product array
    echo "<br />";
    print_r($products);         //displaying product
    array_push($products, "skirt");      //adding skirt at the last of product array
    echo "<br />";
    print_r($products);              

    echo "<br /><br /><b>Items in my products array</b>";     //displaying product
    echo "<br />The item at index[2] is: <i>" . $products[2] ."</i>";       //diplaying the 3rd element of products
    echo "<br />The item at index[3] is: <i>" . $products[3] ."</i>";       //displaying the 4th element of products

    echo "<hr />";

    echo "<h3>Associative Arrays</h3>";         //Associative arrays
    //declaring associative array called customer
    $customer = array('CustID'=>12, 'CustName'=>'Sarah', 'CustAge'=>23, 'CustGender'=>'F');     //'key' => 'value'
    print_r($customer);                                                                     //printing the customer array
    echo "<br />";

    $customer['CustAge'] = 32;      //altering the value of 'CustAge' index of customer array
    //$temp =array('CustEmail'=>'sarah@gmail.com');
    //array_push($customer['CustEmail'], 'sarah@gmail.com');
    //array_push($customer, $temp);
    $customer += ['CustEmail' => 'sarah@gmail.com'];     //pushing custemail at the end of the array
    print_r($customer);                     //printing the customer array

    echo "<br />";
    echo "<b>Items in my customer array</b>";  
    echo "<br />The item at index [CustName] is: ".$customer['CustName'];   //displaying customer name
    echo "<br />The item at index [CustEmail] is: ".$customer['CustEmail']; //displaying customer email

    echo "<hr />";

    echo '<h3>Multi-Dimensional Arrays</h3>';       //multidimensional arrays
    //declaring stock multidimensional associative array   $a = array('key' => array('key' => 'value' and so on...));
    $stock = array('id1' => array('description' => 't-shirt',   
                                    'price' => '9.99', 
                                    'stock' => '100', 
                                    'color' => array('blue','green', 'red')),
                   'id2' => array('description' => 'cap', 
                                    'price' => '4.99', 
                                    'stock' => '50', 
                                    'color' => array('blue', 'black', 'grey')),
                   'id3' => array('description' => 'mug', 
                                    'price' => '6.99', 
                                    'stock' => '30', 
                                    'color' => array('yellow', 'green', 'pink')));

    echo "This is my order <br />";
    echo $stock['id1']['color'][1] ." ". $stock['id1']['description'];      //displaying green t-shirt
    echo "<br />Price: £". $stock['id1']['price'];                          //Price: 9.99
    echo "<br />". $stock['id2']['color'][2] ." ". $stock['id2']['description'];    //displaying grey cap
    echo "<br />Price: £". $stock['id2']['price'];                          //Price: 4.99


    echo "<hr />";
    //LOOPS
    echo "<h3>LOOPS</h3>";
    echo "<h4>WHILE Loops</h4>";        //While Loops

    $counter = 1;           //declaring counter variable

    //declaring while loop
    while($counter<6)   //runs while counter is less than 6
    {
        echo 'Count: '. $counter .'<br />';   //displaying counter value
        $counter++;         //increment operator on counter
    }

    $shirt_price = 9.99;        //declaring new variables for new while operation
    $counter = 1;
    //echo "<br /><b>Number of t-shirts and their prices.</b>";
    echo "<br /><b>Quantity and prices of a shirt</b>";
    echo "<br /><table border='1'>";        //creating table
    echo  "<tr><th> Quantity </th><th> Price </th></tr>";       //table heading
    while($counter<=10)            //while loops runs 10 times
    {
        $total = $counter * $shirt_price;
        $counter++;
        //echo '1 - '. $total .'<br />';        //displaying number and prices of shirts
         echo '<tr><td> 1 </td><td> £'. number_format($total, 2) .' </td></tr>';  //quantity and tshirt in tabular form
    }
    echo '</table>';        //closing table

    //For and for each loops
    echo "<h4>FOR Loops</h4>";
    $name = array('Guts', 'Naruto', 'Aang', 'Luffy', 'Levi');   //initializing names array
    for( $i=0 ; $i<5 ; $i++)     //for loop  runs until i is less than 5
    {
        echo $name[$i] .'<br />';       //displaying name array's contents
    }

    echo "<hr />";
    //foreach loops
    echo "<h4>FOREACH Loops</h4>";
    //declaring associative array names
    $names = array('Guts' => 'c123456',     //'name' => 'student id' 
                    'Naruto' => 'c654321', 
                    'Aang' => 'c987654', 
                    'Luffy' => 'c654987', 
                    'Levi' => '765984');
    //foreach array to display associative array
    foreach($names as $student_name => $student_id)     //student name as key and id as value
    {
        echo 'Name: '. $student_name .'   ID: '. $student_id .'<br />';   //displaying student data
    }

    echo "<hr />";
    //CITY ARRAY
    echo "<h4>City Array</h4>";
    $city = array('Peter' => 'LEEDS', 'Kat' => 'bradford', 'Laura' => 'wakeFIeld');
    print_r($city); //displaying city array
    foreach($city as $key => $value)    //for each loop with name => city
    {
        $city[$key] = strtolower($value);
        $city[$key] = ucfirst($city[$key]);
        //$value = ucfirst(strtolower($value));
    }
    echo '<br />';
    print_r($city);
    echo '<br /><br />';
    //echo "<hr />";


?>
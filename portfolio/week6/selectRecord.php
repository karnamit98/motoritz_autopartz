
<?php 
    //Make connection to database 
    include 'connection.php'; 
    //Display heading 1
    echo '<h2>Select ALL from the Customer Table</h2>'; 
    //run query to select all records from customer table 
    $query="SELECT * FROM Customer"; 
    //store the result of the query in a variable called $result 
    $result=mysqli_query($connection, $query); 
    //Use a while loop to iterate through your $result array and display 
    //the first name, last name and email for each record 
    while ($row=mysqli_fetch_assoc($result))
    { 
        echo $row['firstname'].' '.$row['lastname'].' '.$row['email'].'<br />'; 
    }
    echo '<br /><hr />';

    //heading 2
    echo '<h2>Select ALL from the Customer Table with Age > 22</h2>';
    //run query to select all records from customer with age > 22
    $query1 = "SELECT * from customer where age > 22";
    //store the result of the query in a variable called result 1
    $result1 = mysqli_query($connection, $query1);
    //Use a while loop to iterate through $result1 array and display 
    //the first name, last name, email and age for each record 
    while ($row=mysqli_fetch_assoc($result1))
    { 
        echo $row['firstname'].' '.$row['lastname'].' '.$row['email'].' '.$row['age'].'<br />'; 
    }
    echo '<br /><hr />';

    //heading 3
    echo '<h2>Select Females from the Customer Table with Age >= 22</h2>';
    //run query to select all female records from customer with age >= 22
    $query2 = "SELECT * from customer where age >= 22 and gender = 'F'";
    //store the result of the query in a variable called result 2
    $result2 = mysqli_query($connection, $query2);
    //Use a while loop to iterate through $result1 array and display 
    //the first name, last name, email and age for each record 
    while ($row=mysqli_fetch_assoc($result2))
    { 
        echo $row['firstname'].' '.$row['lastname'].' '.$row['email'].' '.$row['age'].'<br />'; 
    }
    echo '<br /><hr />';

    //heading 4
    echo '<h2>Select Males from the Customer Table list by age descending</h2>';
    //run query to select all male records from customer with age descending
    $query3 = "SELECT * from customer where gender = 'M' order by age desc";
    //store the result of the query in a variable called result 3
    $result3 = mysqli_query($connection, $query3);
    //Use a while loop to iterate through $result1 array and display 
    //the first name, last name, email and age for each record 
    while ($row=mysqli_fetch_assoc($result3))
    { 
        echo $row['firstname'].' '.$row['lastname'].' '.$row['email'].' '.$row['age'].'<br />'; 
    }
    echo '<br /><hr />';

    //heading 5
    echo '<h2>Select all with "a" in first name</h2>';
    //run query to select all  records from customer with 'a' in first name
    $query4 = 'SELECT * from customer where firstname LIKE "%a%" ';
    //store the result of the query in a variable called result 4
    $result4 = mysqli_query($connection, $query4);
    //Use a while loop to iterate through $result1 array and display 
    //the first name, last name, email and age for each record 
    while ($row=mysqli_fetch_assoc($result4))
    { 
        echo $row['firstname'].' '.$row['lastname'].' '.$row['email'].' '.$row['age'].'<br />'; 
    }
    echo '<br /><hr />';

    
?> 
 
<?php
include 'dbconnect.php';





    $crop = $_POST['cropname'];
    $desc = $_POST['description'];
    $qty = $_POST['quantity'];
    $price = $_POST['price'];
    $location = $_POST['location'];
   
    

    $sql2 = "INSERT INTO products (product_id, user_id, productname, description, `unit price`, quantity, location) 
    VALUES ('','','$crop', '$desc', '$price', '$qty', '$location')";


    if ($conn->query($sql2) === TRUE) {
        echo"Your product has been posted ";
        //header("Location: http://localhost/tests/create_use.php");

    } else {

        echo "Error: " . $sql2 . "<br>" . $conn->error;
        //echo "Error: " . $sql . "<br>" . $conn->error;
        

    }



    $conn->close();

    header("Location: http://localhost/tests/dashboard.php");

    

    exit();





?>
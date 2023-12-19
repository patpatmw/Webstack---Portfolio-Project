
<?php
session_start();

include 'dbconnect.php';

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $product = $_POST['product'];
    $address = $_POST['address'];
    $chief = $_POST['chief'];
    $phone = $_POST['phone'];

    $sql3 = "insert into farmers (firstname,surname,product,address,chief,phone) values('$firstname','$surname','$product','$address','$chief','$phone')";

    if ($conn->query($sql3) === TRUE) {
        echo"Farmer has been registered";
        header("Location: http://localhost/tests/admin//farmer.php");
    } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error;
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    exit();

?>
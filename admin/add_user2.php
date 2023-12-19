<?php



include '../dbconnect.php';





    $firstname = $_POST['firstname'];
    $surname = $_POST['Surname'];
    $product = $_POST['product'];
    $address = $_POST['address'];
    $chief = $_POST['chief'];
    $phone = $_POST['phone'];
    

    $sql3 = "insert into farmers (firstname,surname,product,address,chief,phone) values('$firstname','$surname','$product','$address','$chief','$phone')";

    if ($conn->query($sql3) === TRUE) {
        echo"Your Registration has been submitted and is being reviewed.<br> You wil be notified through email. ";
        //header("Location: http://localhost/tests/create_use.php");
    } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error;
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("Location:add_user.php");
    exit();
?>


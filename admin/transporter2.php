<?php
session_start();

include 'dbconnect.php';

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $district = $_POST['district'];
    $truck = $_POST['truck_model'];

    $sql4 = "insert into transporters (firstname,surname,Phonenumber,district,truck_model) values('$firstname','$surname','$phone','$district','$truck')";

    if ($conn->query($sql4) === TRUE) {
        echo"Transporter has been registered";
        //header("Location: http://localhost/tests/admin/transporter.php");
    } else {
        echo "Error: " . $sql4 . "<br>" . $conn->error;
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    exit();
?>
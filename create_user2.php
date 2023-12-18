<?php



include 'dbconnect.php';





    $firstname = $_POST['Firstname'];
    $surname = $_POST['Surname'];
    $email = $_POST['Email'];
    $district = $_POST['District'];
    $user_role = $_POST['user_role'];
    $password = $_POST['Password'];
    $phone=$_POST['phone'];
    

   



    $password = password_hash($password, PASSWORD_DEFAULT);



    //echo $username."<br>";

    //echo $password."<br>";

    //echo $email."<br>";

    //echo $user_role."<br>";

    



    $sql = "insert into users(Firstname,Surname,Email,District,Role, Password, Regdate, PhoneNumber) values('$firstname','$surname','$email','$district','$user_role','$password','','$phone')";



    if ($conn->query($sql) === TRUE) {
        echo"Your Registration has been submitted and is being reviewed.<br> You wil be notified through email. ";
        //header("Location: http://localhost/tests/create_use.php");

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
        //echo "Error: " . $sql . "<br>" . $conn->error;
        

    }



    $conn->close();

    header("Location: http://localhost/tests/login.php");

    

    exit();





?>


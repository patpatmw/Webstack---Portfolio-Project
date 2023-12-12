<?php

session_start();

// Change this to your connection info.

$DATABASE_HOST = 'localhost';

$DATABASE_USER = 'root';

$DATABASE_PASS = '';

$DATABASE_NAME = 'agri';


// Try and connect using the info above.

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {

	// If there is an error with the connection, stop the script and display the error.

	exit('Failed to connect to MySQL: ' . mysqli_connect_error());

}


// Now we check if the data from the login form was submitted, isset() will check if the data exists.

if ( !isset($_POST['email'], $_POST['password']) ) {

	// Could not get the data that should have been sent.

	exit('Please fill both the email and password fields!');

}


// Prepare our SQL, preparing the SQL statement will prevent SQL injection.

if ($stmt = $con->prepare('SELECT user_id, Email, Password, Role FROM users WHERE Email = ?')) {

	// Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"

	$stmt->bind_param('s', $_POST['email']);

	$stmt->execute();

	// Store the result so we can check if the account exists in the database.

	$stmt->store_result();
    //echo 'Password';
    
   // jason_encode($stm); 
    //$stmt->close();

    if ($stmt->num_rows > 0) {

        $stmt->bind_result($id,$Email, $password, $Role,);

        $stmt->fetch();
        //echo password_hash($_POST['password'], PASSWORD_DEFAULT);
       // echo 'id----'.$id;
        //echo 'email'.$Email;
        //echo 'paas'.$password;
        //echo 'role'.$Role;
        //echo 'maiiil'.$Email;

        // Account exists, now we verify the password.

        // Note: remember to use password_hash in your registration file to store the hashed passwords.


        if (password_verify($_POST['password'], $password)) {

            // Verification success! User has loggedin!

            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.

            session_regenerate_id();

            $_SESSION['loggedin'] = TRUE;

	    $_SESSION['name'] = $_POST['email'];

           

            $_SESSION['user_id'] = $id;

            $_SESSION['user_role'] = $Role;


            header('Location: foodCrop.php');
          // echo $password.' is corect';

        } else {

            $error = 'invalid email/password!';

                        // Log email and password values
           
           // echo '----email is:'.$_POST['email'];
            //echo'db password is:'. $password;
            //echo '----form password is:'.$_POST['password'];
           
           // header('Location: login.php?error='.$error);
           //echo ($_POST['password'].'From form does not match to the database password'.$password);


        }

    } 
    else {

        echo 'Incorrect email!';
        //header('Location: http://localhost/tests/dashboard.php');

    }

}



?>
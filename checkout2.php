<?php


session_start();
include 'dbconnect.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Add products to the cart
if (isset($_POST['submit'])) {
    $id = $_SESSION['user_id'];
$oid=$_POST['oid'];
    // Prepare the SQL statement
    $sqll = "INSERT INTO orders (`oid`,user_id, product_id, `unit price`, productname, quantity, `description`, order_date, `status`)
             VALUES ($oid,?,?, ?, ?, ?, '', CURRENT_TIMESTAMP, 'submitted')";

 

    // Prepare the statement
    $stmt = $conn->prepare($sqll);

    if (!$stmt) {
        echo "Error in preparing the statement: " . $conn->error;
        exit();
    }

    foreach ($_SESSION["cart"] as $order) {
      
        $product_id = $order['id'];
        $product_price = $order['price'];
        $product_name = $order['name'];
        $quantity = $order['quantity'];

        // Bind parameters and execute the query for each item
        $stmt->bind_param("iidsi", $id, $product_id, $product_price, $product_name, $quantity);

        if ($stmt->execute()) {
            echo "Your Order has been submitted successfully";
            unset($_SESSION["cart"]);
            //break; // You can choose to break the loop after inserting the first item, or remove this line to insert all items in the cart.
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the statement
    $stmt->close();

   
    exit();
}
?>

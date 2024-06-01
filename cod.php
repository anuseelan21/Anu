<?php
  // Include the database connection and the session files
  include 'includes/conn.php';
  include 'includes/session.php';

  // Check if the user is logged in and the order details are posted
  if(isset($_SESSION['user']) && isset($_POST['order_id']) && isset($_POST['order_total'])){
    // Get the user id, the order id, and the order total from the session and the post variables
    $user_id = $_SESSION['user'];
    $order_id = $_POST['order_id'];
    $order_total = $_POST['order_total']; 
    // Open the database connection
    $conn = $pdo->open();

    try{
      // Insert the order details into the orders table with the status 'COD'
      $stmt = $conn->prepare("INSERT INTO sales(user_id,pay_id,order_total,status) VALUES (:user_id, :order_id, :order_total, 'COD')");
      $stmt->execute(['user_id'=>$user_id, 'order_id'=>$order_id, 'order_total'=>$order_total]);

      // Get the last inserted id from the orders table
      $order_id = $conn->lastInsertId();

      // Loop through the cart items in the session
      foreach($_SESSION as $name => $value){
        // Check if the cart item has a positive quantity
        if($value > 0){
          // Check if the cart item name starts with 'product_'
          if(substr($name, 0, 8) == 'product_'){
            // Get the product id from the cart item name
            $length = strlen($name - 8);
            $product_id = substr($name, 8, $length);

            // Get the product details from the products table
            $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :product_id");
            $stmt->execute(['product_id'=>$product_id]);
            $row = $stmt->fetch();

            // Get the product price and quantity from the product details and the cart item value
            $product_price = $row['product_price'];
            $product_quantity = $value;

            // Insert the product details into the order_details table with the order id
            $stmt = $conn->prepare("INSERT INTO order_details (order_id, product_id, product_price, product_quantity) VALUES (:order_id, :product_id, :product_price, :product_quantity)");
            $stmt->execute(['order_id'=>$order_id, 'product_id'=>$product_id, 'product_price'=>$product_price, 'product_quantity'=>$product_quantity]);

            // Update the product quantity in the products table by subtracting the cart item value
            $stmt = $conn->prepare("UPDATE products SET product_quantity = product_quantity - :product_quantity WHERE product_id = :product_id");
            $stmt->execute(['product_quantity'=>$value, 'product_id'=>$product_id]);
          }
        }
      }

      // Send a confirmation email to the user with the order details
      // You can use the PHPMailer library or the mail() function to send emails
      // You can find more information and examples on how to send emails with PHP from the web search results that I have provided for you[^1^][1] [^2^][2] [^3^][3]

      // Clear the cart items from the session
      unset($_SESSION['item_total']);
      unset($_SESSION['item_quantity']);

      // Redirect the user to the thank you page with the order id
      header('location: thank_you.php?order='.$order_id);
    }
    catch(PDOException $e){
      // Display an error message if there is a problem with the database connection or the query execution
      echo "There is some problem in connection: " . $e->getMessage();
    }

    // Close the database connection
    $pdo->close();
  }
  else{
    // Redirect the user to the index page if they are not logged in or the order details are not posted
    header('location: index.php');
  }
?>

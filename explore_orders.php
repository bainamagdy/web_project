<?php
session_start();

// Function to calculate the total price of the order
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
function calculateTotalPrice($selected_items)
{
    $total_price = 0;
    $total_amount=0;
    foreach ($selected_items as $item) {
        $total_price += $item['price'] * $item['quantity'];
        $total_amount += $item['quantity'];
    }
   // session_start();
    $_SESSION['total_price']=$total_price;
    $_SESSION['total_amount']=$total_amount;
    return $total_price;
   
   


    header("location:confirm.php");
    exit;
}


// Check if selected items are set in session
if (!isset($_SESSION['selected_items']) || empty($_SESSION['selected_items'])) {
    // Redirect to menu page if no items are selected
    header("Location: menu.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Orders</title>
    <link rel="stylesheet" href="explore.css"> 
</head>

</head>

<body>
    <h2>Your Selected Items</h2>
    <?php
    // Display selected items
    foreach ($_SESSION['selected_items'] as $item) {
        if($item["quantity"]==0)
        {
            continue;
        }
        else{
        echo '<div class="item">';
        echo '<img src="' . $item["picture"] . '" alt="' . $item["name"] . '">';
        echo '<div class="item-details">';
        echo '<h3>' . $item['name'] . '</h3>'; // Fix: Use "Item_Name" instead of 'name'
        echo '<p>Price: $' . number_format($item['price'], 2) . '</p>'; // Fix: Use "Item_Price" instead of 'price'
        echo '<p>Quantity: ' . $item['quantity'] . '</p>';
        echo '</div>';
        echo '</div>';
    
        
    }
}

    // Calculate and display total price
    $total_price = calculateTotalPrice($_SESSION['selected_items']);
    echo '<p>Total Price: $' . number_format($total_price, 2) . '</p>';

    ?>
<form action="confirm.php">
  <input type="submit" value="Confirm your order">
</form>
 </body>

</html>

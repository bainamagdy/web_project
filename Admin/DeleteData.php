<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Items</title>
    <link rel="stylesheet" href="del.css">
</head>
<body>
    <header id="home">
        <div id="navbar">
        <img src="./img/logo.png" alt="BESTO Resturant Logo" style="width: 125px; padding-top:20px ;">
        <nav role="navigation">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="menu.html" target="_blank">Menu</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="Registration.html">Registration</a></li>
                
            </ul>
        </nav>
        </div>
       
    </header>
    <div class="content">
        <form action="" method="post">
            <h2>Delete Item</h2>
            <p class="del">Item Name</p>
                 <div class="inputbox">
                    <input type="text" name="Item_ID" placeholder="Enter Item ID" required>
                 </div>
           
                 <p class="del">Are you sure you want to delete this item?</p>
                 <div class="sub">
                    <input type="submit" name="delete_item" value="Yes">
                 </div>
                
                
            </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['delete_item'])) {
    include 'connect.php'; // Include your database connection file
    
    $item_id = $_POST['Item_ID']; // Get the item ID from the form
    
    // Delete the item from the menu_item table
    $delete_query = "DELETE FROM menu_item WHERE Item_ID = $item_id";

    if(mysqli_query($con, $delete_query)) {
        echo "Item deleted successfully!";
    } else {
        echo "Error deleting item: " . mysqli_error($con);
    }

    mysqli_close($con); // Close database connection
}
?>

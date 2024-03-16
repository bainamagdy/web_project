<!-- HTML form to confirm item deletion -->
<form method="post" >
<p>Item Name</p>
            <input type="text" name="Item_ID" placeholder="Enter Item ID">
    <p>Are you sure you want to delete this item?</p>
    <input type="submit" name="delete_item" value="Yes">
    
</form>
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

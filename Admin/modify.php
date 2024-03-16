
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Item</title>
</head>

<body>
    <div class="content-reg">
        <div class="Add">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="Item_ID" >
                <div class="icon"><i class="fa-solid fa-circle-plus"></i></div>
                <h2>Modify Item</h2><br>
                <p>Item Name</p>
                <input type="text" name="Item_Name" placeholder="Enter Item Name" >
                <p>Item Price</p>
                <input type="text" name="Item_Price" placeholder="Enter Item Price" >
                <p>Item Description</p>
                <input type="text" name="Item_Description" placeholder="Enter Item Description" >
                <p>Current Picture:</p>
                <img src="uploads/" alt="Current Picture" style="max-width: 100px;"><br>
                <p>Upload New Picture</p>
                <input type="file" name="upload">
                <input type="submit" name="submit" value="Modify">
            </form>
        </div>
    </div>
</body>

</html>

<?php
include 'connect.php'; // Include your database connection file

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $Item_ID = $_POST['Item_ID'];
    $Item_Name = $_POST['Item_Name'];
    $Item_Price = $_POST['Item_Price'];
    $Item_Description = $_POST['Item_Description'];

    // File upload handling
    $file_name = $_FILES['upload']['name'];
    $file_tmp = $_FILES['upload']['tmp_name'];

    // If file is uploaded, move it to desired directory
    if(!empty($file_name)) {
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
        $update_picture = ", Item_picture = '$file_name'";
    } else {
        $update_picture = "";
    }

    // Update data in menu_item table
    $query = "UPDATE menu_item SET Item_Name = '$Item_Name', Item_Price = '$Item_Price', Item_Descreption = '$Item_Description' $update_picture WHERE Item_ID = '$Item_ID'";
    
    if (mysqli_query($con, $query)) {
        echo "Data modified successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

// Check if item_id is set in the URL
if(isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    // Fetch item data from the database
    $query = "SELECT * FROM menu_item WHERE Item_ID = '$item_id'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Assign fetched data to variables
        $_POST['Item_ID'] = $row['Item_ID'];
        $_POST['Item_Name'] = $row['Item_Name'];
        $_POST['Item_Price'] = $row['Item_Price'];
        $_POST['Item_Description'] = $row['Item_Descreption'];
        $_POST['Item_picture'] = $row['Item_picture'];
    } else {
        // Handle case where item is not found
        echo "Item not found!";
    }
}

mysqli_close($con); // Close database connection
?>

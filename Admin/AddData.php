<div class="content-reg">
    <div class="Add">
        <form method="post" enctype="multipart/form-data">
            <div class="icon"><i class="fa-solid fa-circle-plus"></i></div>
            <h2>Add Data Now</h2><br>
            <p>Item Name</p>
            <input type="text" name="Item_Name" placeholder="Enter Item Name">
            <p>Item Price</p>
            <input type="text" name="Item_Price" placeholder="Enter Item Price">
            <p>Item Description</p>
            <input type="text" name="Item_Description" placeholder="Enter Item Description">
            <p>Upload Picture</p>
            <input type="file" name="upload">
            <input type="submit" name="submit" value="Add">
        </form>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    include 'connect.php'; // Include your database connection file

    $Item_Name = $_POST['Item_Name'];
    $Item_Price = $_POST['Item_Price'];
    $Item_Description = $_POST['Item_Description'];

    // File upload handling
    $file_name = $_FILES['upload']['name'];
    $file_tmp = $_FILES['upload']['tmp_name'];

    // Move uploaded file to desired directory
    move_uploaded_file($file_tmp, "uploads/" . $file_name);

    // Insert data into MENUE_ITEM table
    $query = "INSERT INTO menu_item (Item_Name, Item_Price, Item_Descreption, Item_picture) VALUES ('$Item_Name', '$Item_Price', '$Item_Description', '$file_name')";
    
    if (mysqli_query($con, $query)) {
        echo "Data added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con); // Close database connection
}
?>

     
    

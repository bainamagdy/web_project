<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Item</title>
    <link rel="stylesheet" href="Update.css">
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
        <div class="ADD">
            <form action="" method="post">
                <h2>Modify Item</h2><br>
                <p class="mo">Item Name</p>
                <div class="inputbox">
                    <input type="text" name="Item_Name" placeholder="Enter Item Name" required>
                </div>

                <p class="mo">Item Price</p>
                <div class="inputbox">
                    <input type="text" name="Item_Price" placeholder="Enter Item Price" required>
                </div>

                <p class="mo">Item Description</p>
                <div class="inputbox">
                    <input type="text" name="Item_Description" placeholder="Enter Item Description" required>
                </div>

                <p class="mo">Current Picture:</p>
                <div class="aa">
                    <img src="uploads/" alt="Current Picture" style="max-width: 100px;">
                </div>
                
                <p class="mo">Upload New Picture</p>
                <div class="inputboxx">
                    <input type="file" name="upload">
                </div>
               <div class="sub">
                <input type="submit" name="submit" value="Modify">
               </div>
                
            </form>
        </div>
    </div>
</body>

</html>

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
    $query = "UPDATE menu_item SET Item_Name = '$Item_Name', Item_Price = '$Item_Price', Item_Description = '$Item_Description' $update_picture WHERE Item_ID = '$Item_ID'";
    
    if (mysqli_query($con, $query)) {
        echo "Data modified successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con); // Close database connection
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add data</title>
    <link rel="stylesheet" href="ADD.css" >
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
        
            <form action="" method="post" enctype="multipart/form-data">

                
                <h2>Add Data Now</h2><br>
                <p class="AD">Item Name</p>
                <div class="input-box">
                    <input type="text" name="Item_Name" placeholder="Enter Item Name">
                </div>

                <p class="AD">Item Price</p>
                <div class="input-box">
                    <input type="text" name="Item_Price" placeholder="Enter Item Price">
                </div>
                <p class="AD">Item Description</p>
                <div class="input-box">
                    <input type="text" name="Item_Description" placeholder="Enter Item Description">
                </div>

                
                
                <p class="AD">Item Picture URL</p>
                <div class="input-box">
                     <input type="file" name="Image" placeholder="choose your file">
                </div>

                <div class="sub">
                    <input type="submit" name="submit" >
                </div>
                
            </form>
       
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    include 'connect.php'; // Include your database connection file

    $Item_Name = $_POST['Item_Name'];
    $Item_Price = $_POST['Item_Price'];
    $Item_Description = $_POST['Item_Description'];
    $Item_picture=$_FILES['Image'];
    $fil_p="uploads/".$Item_picture['name'];
    move_uploaded_file($Item_picture['tmp_name'],$fil_p);
    $Item_Picture_URL ="Admin/uploads/".$Item_picture['name'];; // Retrieve URL input

    // Insert data into MENU_ITEM table
    $query = "INSERT INTO menu_item (Item_Name, Item_Price, Item_Description, Item_picture) VALUES ('$Item_Name', '$Item_Price', '$Item_Description', '$Item_Picture_URL')";
    
    if (mysqli_query($con, $query)) {
        echo "Data added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con); // Close database connection
}
?>

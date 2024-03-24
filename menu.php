<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="menu.css">
   <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="addtocart.css">
    <script src="http://kit.fontawesome.com/92d70a2fd8.js" crossorigin="anonymous"></script>
    <input type="hidden" id="cart-items" value="">-->
</head>

<body>
    <header>
        <div id="navbar">
            <img src="./img/logo.png" alt="BESTO Resturant Logo" style="width: 125px; padding-top:20px ;">
            <nav role="navigation">
                <ul>
                    <li><a href="index.html#home">Home</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="Registration.html">Registration</a></li>
                </ul>
            </nav>
            <div class="cart">
            </div>
        </div>
    </header>

    <!-- Menu Start -->
    <?php
    // Establish a database connection
    include 'connect.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialize an empty array to store selected items
        $selected_items = array();

        // Loop through the POST data to extract selected items
        foreach ($_POST['item'] as $item_id => $quantity) {
            // Get item details from the database
            $sql = "SELECT * FROM menu_item WHERE Item_ID = $item_id";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            // Add item details to the selected items array
            $selected_items[] = array(
                'name' => $row['Item_Name'],
                'price' => $row['Item_Price'],
                'picture'=>$row['Item_picture'] ,
                'quantity' => $quantity
            );
        }

        // Store selected items in session for further processing
        session_start();
        $_SESSION['selected_items'] = $selected_items;

        // Redirect to the explore page
        header("Location: explore_orders.php");
        exit();
    }

    // Write SQL query to fetch menu items
    $sql = "SELECT * FROM menu_item";
    $result = $con->query($sql);

    // Close the database connection
    $con->close();
    ?>

    <section id="menu">
        <div class="container">
            <div class="title">
                <h2>Our Special Menu</h2>
            </div>
            <div class="menu-items">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="menu-items-left">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="menu-item">';
                                echo '<img src="' . $row["Item_picture"] . '" alt="' . $row["Item_Name"] . '">';
                                echo '<div>';
                                echo '<h3>' . $row["Item_Name"] . ' <span class="primary-text">$' . $row["Item_Price"] . '</span></h3>';
                                echo '<p>' . $row["Item_Description"] . '</p>';
                                // Add quantity input and hidden item ID field
                                echo '<input  class="add-to-cart"  type="number" name="item[' . $row["Item_ID"] . ']" value="0"  min="0" max="10" >';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "No menu items found.";
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-third">Add to Cart</button>
                </form>
            </div>
        </div>
    </section>

</body>

</html>



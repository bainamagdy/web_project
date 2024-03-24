<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Your CSS and other header content -->
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="Customer_user_name" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="Customer_password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forget password?</a>
            </div>
            <button class="btn" name="submit" value="Login" type="submit">submit</button>
        </form>
    </div>
</body>
</html>

<?php

session_start();

if(isset($_POST['submit']) and $_POST['submit'] == 'Login')    
{
    include 'connect.php';

    $Customer_user_name = $_POST['Customer_user_name'];
    $Customer_password = $_POST['Customer_password'];

    $q1 = "SELECT * FROM `Customer` WHERE `Customer_user_name`='$Customer_user_name' and `Customer_password`='$Customer_password'";
    $sql = mysqli_query($con, $q1);

    if($sql->num_rows > 0)
    {
        $row = $sql->fetch_assoc();

        // Assigning values to variables
        $username = $Customer_user_name;
        $email = $row['Customer_Email'];
        $address = $row['Customer_Address'];
        $phone = $row['Customer_phone'];
        $name = $row['Customer_name'];
        $id = $row['Customer_ID'];

        // Inserting the current date for Order_Date, you may need to adjust this depending on your requirements
        $order_date = date('Y-m-d');

        $customer_id = $id; // Using the variable instead of session

        $total_amount=$_SESSION['total_amount'];
        $total_price=$_SESSION['total_price'];

        $sql = "INSERT INTO orders (Customer_ID, Order_Date, Order_Total_Amount, Order_Payment) 
                VALUES ('$customer_id', '$order_date', '$total_amount', '$total_price')";

        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    // Retrieve data from the database and display it
    $sql = "SELECT * FROM orders
            INNER JOIN customer ON orders.Customer_ID = customer.Customer_ID";
    $result = $con->query($sql);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($result->num_rows > 0) {
        echo "<h2>Orders from Database</h2>";
        while($row = $result->fetch_assoc()) {
            echo "<p>Customer: " . $row["Customer_name"]. " - Email: " . $row["Customer_Email"]. " - Total amount: " . $row["Order_Total_Amount"]. " - Total price: " . $row["Order_Payment"]. "</p>";
        }
    } else {
        echo "No orders found in the database";
    }

    $con->close();
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log_in</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="login.css">
</head>

<body>
    <header id="home">
        <div id="navbar">
            <img src="./img/logo.png" alt="BESTO Resturant Logo" style="width: 125px; padding-top:20px ;">
            <nav role="navigation">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#index.html">About US</a></li>
                    <li><a href="menu.html" target="_blank">Menu</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="Registration.php">Registration</a></li>
                    <li><a href="#index.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="Customer_user_name" placeholder="Username" required> <!-- Added name attribute -->
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="Customer_password" placeholder="Password" required> <!-- Added name attribute -->
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>

                <a href="#">Forget password?</a>
            </div>
            <button class="btn" name="submit" value="Login" type="submit"> <!-- Added name attribute and submit value -->
                Login 
            </button>
            <div class="register-link">
                <p>Don't have an account? <a href="Registration.html">Register</a></p>
            </div>
        </form>

    </div>
</body>

</html>



    <?php 	
	
    if(isset($_POST['submit']) and $_POST['submit'] == 'Login')	
    {
    
    include 'connect.php';
    
    $Customer_user_name=$_POST['Customer_user_name'];
    $Customer_password=$_POST['Customer_password'];
    
    
    
    #$query="SELECT * FROM `Customer` WHERE `Customer_user_name`='$Customer_user_name' and `Customer_password`='$Customer_Password'; 
    
    
    $q1="SELECT * FROM `Customer` WHERE `Customer_user_name`='$Customer_user_name' and `Customer_password`='$Customer_password'";
    $sql=mysqli_query($con,$q1);
    if($sql->num_rows>0)
    {
    session_start();	
    $_SESSION['username']= $Customer_user_name;
    
    ?>
    <script type="text/javascript">
    alert("Logged in successfully");
    
    </script>
    <?php	
    
    }
    else
    {
    ?>
    
    <script type="text/javascript">
    alert("the username and password not found try agin");
    
    </script>
    
    <?php
    }
    }
    ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header id="home">
        <div id="navbar">
            <img src="./img/logo.png" alt="BESTO Restaurant Logo" style="width: 125px; padding-top:20px ;">
            <nav role="navigation">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#index.html">About US</a></li>
                    <li><a href="menu.html" target="_blank">Menu</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="Registration.html">Registration</a></li>
                    <li><a href="#index.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="Admin_User_name" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="Admin_password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forget password?</a>
            </div>
            <button class="btn" type="submit" name="submit">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="Registration.html">Register</a></p>
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['submit']) and $_POST['submit'] == 'Login') {
        include 'connect.php';
        $Admin_User_name=$_POST['Admin_User_name'];
        $Admin_password=$_POST['Admin_password'];
        $q1="SELECT * FROM `admin` WHERE `Admin_User_name`='$Admin_User_name' and `Admin_password`='$Admin_password'";
        $sql=mysqli_query($con,$q1);
        if($sql->num_rows>0) {
            session_start();
            $_SESSION['Admin_User_name']= $Admin_User_name;
            echo '<script type="text/javascript">alert("Logged in successfully");</script>';
            header("location:Admincpanel.php");
        } else {
            echo '<script type="text/javascript">alert("The username and password not found. Please try again.");</script>';
        }
    }
    ?>
</body>

</html>


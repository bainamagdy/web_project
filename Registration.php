<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="Registration.css">
    
</head>

<body>
    <header>
        <div id="navbar">
            <img src="./img/logo.png" alt="BESTO Resturant Logo" style="width: 125px; padding-top:20px ;">
            <nav role="navigation">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#index.html">About US</a></li>
                    <li><a href="menu.html" target="_blank">Menu</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="#index.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="title">REGISTRATION</div>
        <form action="#" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details"> NAME</span>
                    <input type="text" name="Customer_name" placeholder="Enter your name" required>
                </div>

                <div class="input-box">
                    <span class="details">USER NAME</span>
                    <input type="text" name="Customer_user_name" placeholder="Enter your USER name" required>
                </div>

                <div class="input-box">
                    <span class="details">EMAIL</span>
                    <input type="email" name="Customer_Email" placeholder="mail@example.com" required>
                </div>

                <div class="input-box">
                    <span class="details">PHONE NUMBER</span>
                    <input type="text" name="Customer_phone" placeholder="010########" required>
                </div>
       

                <div class="input-box">
                    <span class="details">ADDRESS</span>
                    <input type="text" name="Customer_Address" placeholder="Enter your address" required>
                </div>

                <div class="input-box">
                    <span class="details">PASSWORD</span>
                    <input type="password" name="Customer_password" placeholder="Enter your password" required>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="Register">
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php              
if(@$_POST['submit'] and $_POST['submit'] =='Register')
{
    include("Connect.php");
    $Customer_Name=$_POST['Customer_name'];
    $Customer_User_name=$_POST['Customer_user_name'];
    $Customer_Password=$_POST['Customer_password'];
    $Customer_Email=$_POST['Customer_Email'];
    $Customer_Phone=$_POST['Customer_phone'];
    $Customer_Address=$_POST['Customer_Address'];

    $query="SELECT * FROM `customer` WHERE `Customer_Email`='$Customer_Email'  or `Customer_user_name`='$Customer_User_name'";
                
    $sql=mysqli_query($con,$query);
    $row=mysqli_fetch_array($sql);

    if($row>0)
    {
        ?>
        <script type="text/javascript">
        alert("Email or username already exists");
        </script>
        <?php
    } 
    else
    {  
        $sql1="INSERT INTO `customer` ( `Customer_name`, `Customer_phone`, `Customer_Email`, `Customer_user_name`, `Customer_password`,Customer_Address)
               VALUES( '$Customer_Name', '$Customer_Phone', '$Customer_Email', '$Customer_User_name', '$Customer_Password','$Customer_Address');";

        mysqli_query($con,$sql1);

        ?>
        <script type="text/javascript">
        alert("Membership has been successfully registered");                
        </script>
        <?php
    }
}
?>

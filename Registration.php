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
                    <li><a href="login.html">Login</a></li>
                    <li><a href="Registration.html">Registration</a></li>
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
                    <span class="details">FIRST NAME</span>
                    <input type="text" placeholder="Enter your first name" required>
                </div>

                <div class="input-box">
                    <span class="details">SECOND NAME</span>
                    <input type="text" placeholder="Enter your second name" required>
                </div>

                <div class="input-box">
                    <span class="details">EMAIL</span>
                    <input type="email" placeholder="mail@example.com" required>
                </div>

                <div class="input-box">
                    <span class="details">PHONE NUMBER</span>
                    <input type="number" placeholder="010########" required>
                </div>
       

                <div class="input-box">
                    <span class="details">ADDRESS</span>
                    <input type="text" placeholder="Enter your address " required>
                </div>

                <div class="input-box">
                    <span class="details">PASSWORD</span>
                    <input type="password" placeholder="Enter your password" required>
                </div>

                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </div>
        </form>
    </div>
</body>

</html>

</html>
<?php              
if(@$_POST['submit'] and $_POST['submit'] =='Register')
{
    include("Connection.php");
    $Customer_Name=$_POST['Customer_Name'];
    $Customer_Username=$_POST['Customer_Username'];
    $Customer_Password=$_POST['Customer_Password'];
    $Customer_Email=$_POST['Customer_Email'];
    $Customer_Phone=$_POST['Customer_Phone'];

    $query="SELECT * FROM `customer` WHERE `Customer_Email`='$Customer_Email'  or `Customer_Username`='$Customer_Username'";
                
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
        $sql1="INSERT INTO `customer` ( `Customer_Name`, `Customer_Phone`, `Customer_Email`, `Customer_Username`, `Customer_Password`)
               VALUES( '$Customer_Name', '$Customer_Phone', '$Customer_Email', '$Customer_Username', '$Customer_Password');";

        mysqli_query($con,$sql1);

        ?>
        <script type="text/javascript">
        alert("Membership has been successfully registered");                
        </script>
        <?php
    }
}
?>

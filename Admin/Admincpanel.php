<?php
session_start();
 

if(isset($_SESSION['Admin_user_name']))
include("header.php") ;
else
header("location:index.php");	
?>

<div class="main">
  <div class="wrapper row2">
   <section id="ctdetails" class="hoc container clear"> 
    <div class="one_quarter1"> &nbsp;&nbsp; </div>
     <article class="two_third"><br><br>
      <?php
          if(isset($_SESSION['Admin_user_name']))
          {
              echo ' <center> <h2 class="wel"> Welcome ' . $_SESSION['Admin_user_name'].'</h2> </center> <br/>';   
          }
          else
          {
              header("location:index.php");
          }
      ?>
      
      <center> <h3 class="well"> Please select serives  <h3> </center>
          <h3>
          <ul class="list">
            <li><a href="AddData.php" >Add food</a></li>
            <li><a href="DeleteData.php"> Delete food</a></li>
            <li><a href="modify.php">Update food price</a></li>
          </ul>
          </h3>
     </article>
   </section>  
  </div>
</div>

  <?php include("footer.php");?>

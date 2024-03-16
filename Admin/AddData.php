<?php include("Header.php");?>

<div class="content-reg">
            <div class="Add" >
            <form method="post" enctype="multipart/form-data">
              <div class="icon"><i class="fa-solid fa-circle-plus"></i></div>
                <h2>AddData Now</h2><br>
                <p>Trainees Category<p>
                   <input type="text" name="Trainees_Category" placeholder="Enter your Name">
                  <p>Upload Pic<p>
                  <input type="file" name="upload" > 
                  <input type="submit" name="submit"  value="Add">
                </form>
            </div>
            
            <?php              
              if(@$_POST['submit'] and $_POST['submit'] =='Add')
              {
                include("Connection.php");
                $Trainees_Category=$_POST['Trainees_Category'];
                
                $filetempname=$_FILES['upload']['tmp_name'];
                $filename=$_FILES['upload']['name'];
                $type=$_FILES['upload']['type'];
                $error=$_FILES['upload']['error'];

                $random=rand(0,99);
                $url=date('d-m-y').$random.$filename;
                $uploadDirectory=dirname(__FILE__).'/uploaded/';
                $datapage['page_image']   = $uploadDirectory.$url;

                $destination=$uploadDirectory.date('d-m-y').$random.$filename;
                move_uploaded_file($filetempname, $destination);
                $Trainees_Photo='uploaded/'.date('d-m-y').$random.$filename;

                $sql1="INSERT INTO `trainees` ( `Trainees_Category`, `Trainees_Photo`) 
                VALUES ( '$Trainees_Category', '$Trainees_Photo');";

                if(mysqli_query($con,$sql1))
                {
                ?>
                <script type="text/javascript">
                alert("Data has been successfully Added");                
                </script>
                <?php
                }
              }
             ?>
                  
        </div>
     </div>
     
    

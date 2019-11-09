<?php
   include("config/db.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $sql = "SELECT * FROM myUsers WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
   
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {

         $_SESSION['login_user'] = $myusername;
         
         header("location: blog.php");
      }else {
         $error = "Invalid, try again. ";
         // echo $error;
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
   </head>
   
   <body>
	
      <div class="container">
         <div>
            <div class="row justify-content-md-center">
               <div class="form-group">
               <h1 class="mt-4 mb-3">Login</h1>
                  <form action = "" method = "post" >
                     <label >Username  : </label> <input type = "text" name = "username" class="form-control" />
                     <label>Password  : </label> <input type = "password" name = "password" class="form-control mb-3" />
                     <input type = "submit" value = " Submit " class="btn btn-primary"/>
                  </form>
                  <div><?php echo $error; ?></div>
               </div>
				</div>
         </div>
			
      </div>

   </body>
</html>
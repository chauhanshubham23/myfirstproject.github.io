<?php
  session_start()
?>
	
  <?php
	include('database.php');

	if(isset($_POST['sub'])){
    if(isset($_GET['token'])){
      $token = $_GET['token'];

    $upass= mysqli_real_escape_string($conn,$_POST['pass']);
    $ucfpass= mysqli_real_escape_string($conn,$_POST['cfpass']);

    //$pass = password_hash($upass, PASSWORD_BCRYPT);
    //$ucpass = password_hash($ucfpass, PASSWORD_BCRYPT);


		if($upass===$ucfpass){
      $updatequery = "UPDATE user SET u_password '$upass' where token= '$token' ";
			
				$iquery = mysqli_query($conn,$updatequery);
				if($iquery){
          $_SESSION['msg'] = "Your password has been updated.";
          header('location:Log in.php'); 

        }else{
          $_SESSION['passmsg']= "Your password is not updated.";
          header('location:reset_password.php');
        }
      }else{
          $_SESSION['passmsg']= "Your password is not matching.";
        }
  
      }  else{
        echo "No token found";
      }  
				
		}
  
		
		
	

	?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

<!-- font -->

  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
<title>Reset password</title>
<style>
    .card{
        box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.78);
-webkit-box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.78);
-moz-box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.78);
    }
</style>
</head>
<body>
   

<div>
    <div class="container">
    	<div class="row">
    		<div class="col-sm col-md col-lg d-flex justify-content-center">
    			<div class="card  mb-4 border-0" style="margin-top: 85px;">
                <h3 class="text-center mt-4">Update Password</h3>
                <div class="card-body">
                <p class="text-danger">** Create your password and repeat.</p>
                <p ><?php 
                    if(isset($_SESSION['passmsg'])){
                      echo $_SESSION['passmsg'];
                    } else{
                      echo $_SESSION['passmsg']="";
                    }
                    ?></p>
                 <form class="form2" action="" method="POST">
               
                 
                  
                     
                    <div class="form-group">
                    <div class="col-auto mb-4">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                  </div>
                                  <input type="password" class="form-control" name="pass" placeholder="New password" required>
                                </div>
                              </div>
                        </div>
                        <div class="form-group">
                        <div class="col-auto mb-4">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                  </div>
                                  <input type="password" class="form-control" name="cfpass" placeholder="Repeat password" required>
                                </div>
                              </div>
                        </div>
                        <div class="col-auto text-center mb-4">
                           <p>  Already have an account? <a href="login.php"> Login</a></p>
                     </div>
                     <div class="col-auto d-flex justify-content-center ">
                     <button type="submit" class="btn btn-primary text-center" name="sub">Create password</button>
                     </div>

                 
				  
            </form>
         </div>
    			</div>
    		</div>
    		
    	</div>
    </div>
</div>



</body>
</html>



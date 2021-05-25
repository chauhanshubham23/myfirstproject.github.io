<?php
  session_start()
?>
	
  <?php
	include('database.php');

	if(isset($_POST['sub']))
	{

    $uemail= mysqli_real_escape_string($conn,$_POST['email']);

		$emailquery="SELECT * FROM user WHERE u_email='$uemail'";
		$query = mysqli_query($conn, $emailquery);
        $emailcount= mysqli_num_rows($query);
		if($emailcount)
		{	
            $userdata = mysqli_fetch_assoc($query);
            $u_fname = $userdata['u_fname'];
            $token = $userdata['token'];
          $subject = "Password reset";
          $body = "Hi, $u_fname. Click here to reset your password. http://localhost/Registration/reset_password.php?token=$token";
          $sender_email = "From: subhamchauhan1586@gmail.com";
          if(mail($uemail,$subject,$body,$sender_email)){
            ?>
            
            <div class = "alert alert-success text-center">
            <?php echo "your mail sent successfully to $uemail" ?>
            </div>
           <?php
            $_SESSION['msg']="Check your mail to reset your password $uemail";
            header('location:login.php');
          }else{
            echo "Email sending failed..";
          }
        }else{
            echo "No email found.";

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" >
<title>forget password</title>
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
    			<div class="card mb-4 border-0" style="margin-top: 85px;">
                <h3 class="text-center mt-4">Recover your account.</h3> <hr>
                <div class="card-body">
                <p class="text-danger">** Please fill your email id properly.</p>
                <div>
                
                </div>
                 <form class="form2" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
               
                 
                  <div class="form-group">
                  <div class="col-auto mb-4">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                  </div>
                                  <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                                </div>
                              </div>
                        </div>
            
                     <div class="col-auto d-flex justify-content-center mb-4 ">
                     <button type="submit" class="btn btn-primary text-center" name="sub">Send Mail</button>
                     </div>
                     <div class="col-auto text-center mb-4">
                           <p> Already have an account?  <a href="login.php">Login</a></p>
                     </div>

                 
				  
            </form>
         </div>
    			</div>
    		</div>
    		
    	</div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


</body>
</html>



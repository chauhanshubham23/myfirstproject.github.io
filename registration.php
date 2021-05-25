<?php
  session_start()
?>
	
  <?php
	include('database.php');

	if(isset($_POST['sub']))
	{

    $ufname= mysqli_real_escape_string($conn,$_POST['fname']);
    $ulname= mysqli_real_escape_string($conn,$_POST['lname']);
    $uemail= mysqli_real_escape_string($conn,$_POST['email']);
    $mobile= mysqli_real_escape_string($conn,$_POST['mob']);
    $udob= mysqli_real_escape_string($conn,$_POST['dob']);
    $article= mysqli_real_escape_string($conn,$_POST['checkbox1']);
    $upass= mysqli_real_escape_string($conn,$_POST['pass']);
    $ucfpass= mysqli_real_escape_string($conn,$_POST['cfpass']);

    //$pass = password_hash($upass, PASSWORD_BCRYPT);
    //$ucpass = password_hash($ucfpass, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));

		$sql="SELECT u_email FROM user WHERE u_email='$uemail'";
		$iquery=mysqli_query($conn,$sql);
		if(mysqli_num_rows($iquery)>0)
		{
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Alert!</strong> Email already exist.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
		} 
		elseif($upass===$ucfpass)
		{
				$sql="INSERT INTO user(u_fname, u_lname, u_email, u_mob, u_dob, article, u_password, cf_password, token,status) VALUES ('$ufname','$ulname','$uemail','$mobile','$udob','$article','$upass','$ucfpass','$token','inactive')";
				if(mysqli_query($conn,$sql)){	
				?>
    <script>
      alert('Registered successfully');
				location.href='login.php';
				</script>
        
				<?php
		}
		}
		else		 
		{ ?>
		
		
					 <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Alert!</strong> Password and confirm password does not match.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
					<?php
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
<title>Register</title>
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
    			<div class="card mt-5 mb-4 border-0">
                <h3 class="text-center mt-4">Sign Up</h3>
                <div class="card-body">
                <p class="text-danger">** You have to fill all fields then you can only press sign up button.</p>
                 <form class="form2" action="registration.php" method="POST">
                <div class="form-group">
                     <div class="col-auto mb-4">
                         <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class='fas fa-user-alt'></i></div>
                                  </div>
                                  <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
                                </div>
                              </div>
                        </div>
                  <div class="form-group">
                  <div class="col-auto mb-4">
                         <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class='fas fa-user-alt'></i></div>
                                  </div>
                                  <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required>
                                </div>
                              </div>
                        </div>
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
                  <div class="form-group">
                  <div class="col-auto mb-4">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                  </div>
                                  <input type="number" class="form-control" name="mob" placeholder="Enter Your Phone no" required> 
                                </div>
                              </div>
                         </div>
				  <div class="form-group">
                  <div class="col-auto mb-4">
                                <label for="">Select your date of birth</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                  </div>
                                  <input type="date" class="form-control" id="picker" name="dob" placeholder="DD/MM/YYYY" required>
                                </div>
                              </div>
                        </div>
                      <div class="form-group">
                      <div class="col-auto mb-4">
                                  <p>Select preferences based on which article are displayed.</p>
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="checkbox1" value="1" >Sports
                                    </label>
                                  </div>
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="checkbox1" value="2" >Blogging
                                    </label>
                                  </div>
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="checkbox1" value="3" >Politics
                                    </label>
                                  </div>                               
                              </div>
                      </div>
                    <div class="form-group">
                    <div class="col-auto mb-4">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                  </div>
                                  <input type="password" class="form-control" name="pass" placeholder="Enter password" required>
                                </div>
                              </div>
                        </div>
                        <div class="form-group">
                        <div class="col-auto mb-4">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                  </div>
                                  <input type="password" class="form-control" name="cfpass" placeholder="Confirm password" required>
                                </div>
                              </div>
                        </div>
                        <div class="col-auto text-center mb-4">
                           <p>  Already have an account? <a href="login.php"> Login</a></p>
                     </div>
                     <div class="col-auto d-flex justify-content-center ">
                     <button type="submit" class="btn btn-primary text-center" name="sub">Sign up</button>
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



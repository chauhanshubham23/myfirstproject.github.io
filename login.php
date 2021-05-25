<?php
include('database.php');
session_start();
if(isset($_POST['log']))
{
    $uemail=$_POST['uemail'];
    $pass=$_POST['pass'];
    $sql="SELECT u_email,u_password FROM user WHERE u_email='$uemail' AND u_password='$pass'";
    $result=mysqli_query($conn,$sql); 
	if(mysqli_num_rows($result)>0)
	{
    $_SESSION['is_login']=true;
    $_SESSION['USER']=$uemail;
    
?>
    <script> alert('login successfull'); 
    location.href='home.php';
    </script>
    <?php
} 
    else
    {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Alert!</strong> Login or Password is incorrect..
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
<link rel="stylesheet" href="assets/css/style.css">
<title>Log in</title>
<style>
        .card{
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.78);
-webkit-box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.78);
-moz-box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.78);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm col-md col-lg d-flex justify-content-center">
                <div class="card mb-4 border-0 " style="margin-top: 85px;">
                <i class="fas fa-user display-4 text-center mt-3"></i>
                <h3 class="text-center mt-2">Log in</h3><hr>
                <div class="card-body">
                
                    <form action="login.php" method="POST">
                        <div class="form-group">
                        <div class="col-auto mb-4">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                  </div>
                                  <input type="email" class="form-control" name="uemail" id="inlineFormInputGroup" placeholder="Enter your email" required>
                                </div>
                              </div>
                        </div>
                        <div class="form-group">
                        <div class="col-auto mb-4">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class='fas fa-lock'></i></div>
                                  </div>
                                  <input type="password" name="pass" class="form-control" id="inlineFormInputGroup" placeholder="Password" required>
                                </div>
                              </div>
                        </div>
                        <div class="col-auto mb-4 ">
                                  <a href="forget_password.php">Forgot password?</a><br>
                                  <a href="registration.php">Not a member yet?</a>
                              </div>
                              <div class="col-auto d-flex justify-content-center">
                                  <button type="submit" name="log" class="btn btn-primary">Sign in</button>
                              </div>
                    </form>
                </div>

                </div>

            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
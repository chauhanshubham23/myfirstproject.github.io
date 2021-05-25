<?php
	session_start();
	if(!ISSET($_SESSION['USER'])){
		header('location:login.php');
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
<title>home</title>
<style>
    .navbar-brand{
        font-family: 'Times New Roman';
        font-size: 32px;
    }
</style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand ml-4" href="#">Tech-Hub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="btn btn-outline-primary mr-5 mb-3 w-75" href="user_profile.php" type="submit">User</a>
      </li>
      <li class="nav-item">
      <a href="logout.php" class="btn btn-outline-danger mr-5 w-75" type="submit">Logout</a>
      </li>
      
      
    </ul>
  </div>
</nav>
<div class="container mt-4 text-center">
    <h2>Welcome <br> <?php echo $_SESSION['USER'];   ?></h2>
</div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
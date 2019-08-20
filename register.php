
<?php

 include 'database/connection.php';

 
 $error_name = '';
 $error_email = '';
 $error_password  = '';
 $error_confirm_password  = '';
 $error_mobile = '';
 $error_university = '';
 $length = '';
 $confirmPassword = '';
 $pwd = '';
 $email_check = '';
 $email_exist = '';



if(isset($_POST['login'])){
	$name = mysqli_escape_string($conn, $_POST['name']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$password = mysqli_escape_string($conn, $_POST['password']);
	$confirmPassword = mysqli_escape_string($conn, $_POST['confirmPassword']);
	$mobile = mysqli_escape_string($conn, $_POST['mobile']);
	$university = mysqli_escape_string($conn, $_POST['university']);
	$email_exist = "SELECT email FROM user WHERE email = '$email'";
	$query = mysqli_query($conn, $email_exist);

	if(mysqli_num_rows($query)>0){

		$email_check = "Your Email Is Alredy Exist";
	}
	

      if(empty($name)){

		$error_name = "Name is required.";
	  }

	  else if(strlen($name)<5){

		$length = "Length must be greater than four letter !";
	  }
	 

	  else if(empty($email)){

		$error_email = "email is required.";
	  }

	  else if(empty($password)){

		$error_password = "password is required.";
	  }

	  else if(empty($confirmPassword)){

		$error_confirm_password = "confirm password is required.";
	  }
	



	  else if(empty($mobile)){


		$error_mobile = "mobile number is required.";
	  }

	  else if(empty($university)){

		$error_university = "university name is required.";
	  }
	 

	

	  else if($password!= $confirmPassword){

		$pwd = "Your confirm password does not match !";
	  }

	  else {
		  $password = md5($password);
		  $v_key = md5(time().$email); // Encrypted value
		  echo "<script> alert('$v_key')</script>";
	  }

	 
	 

}

?>



<!doctype html>
<html lang="en" class="fullscreen-bg">
<?php
 include 'layouts/css/css-layout.php'

 ?>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box " style ="height: 560px;">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo">
								</div>
								<p class="lead">Register to your account</p>
		
		
							</div>
							<form class="form-auth-small" action="" method="POST">
								<div class="form-group">
									<label for="name" class="control-label sr-only">Name</label>
									<input type="text" class="form-control" placeholder="Type Your Name" name ="name" autofocus id="name">
									<span class ="text-danger"><?= $error_name ?> <?= $length ?> </span>

								</div>
								<div class="form-group">
									<label for="email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" name="email"
										placeholder="Type Your Email"  id="email">
										<span class ="text-danger"><?= $error_email ?> </span>

								</div>

								<div class="form-group">
									<label for="password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password"
										placeholder="Type Your password"  id="password">
										<span class ="text-danger"><?= $error_password ?> </span>

								</div>
								<div class="form-group">
									<label for="confirmpassword" class="control-label sr-only">Confirm Password</label>
									<input type="password" class="form-control" name="confirmPassword"
										placeholder="Type Your Confirm Password"  id="password">
										<span class ="text-danger"><?= $error_confirm_password ?>  <?= $pwd; ?></span>

								</div>
								<div class="form-group">
									<label for="mobile" class="control-label sr-only">Mobile</label>
									<input type="mobile" class="form-control" name="mobile"
										placeholder="Type Your Mobile Number"  id="mobile">
										<span class ="text-danger bg-success"><?= $error_mobile ?> </span>

										
								</div>
								<div class="form-group">
										<label for="university" class="control-label sr-only">University Name</label>
										<input type="text" class="form-control" name="university"
											placeholder="Type Your University Name"  id="university">
											<span class ="text-danger"><?= $error_university ?> </span>

									</div>
								


								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" name="remember" id="remember">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" name ="login">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="">Forgot
											password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Free Bootstrap dashboard template</h1>
							<p>by The Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
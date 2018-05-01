<?php
require_once 'register.php';
require_once 'login.php';

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="template/css/style.css">
  <style>
	#hintspan{
		color:orange;
	}
  </style>	
  
</head>

<body>
  <div class="container">


	<form class="signUp" action="" method="post">
		<h3>Create Your Account</h3>
	
		<input class="w100" type="text" name="username" placeholder="Insert Name"  required>
		<span> <?php if(isset($errorArray['nameError'])) echo "invalid name";?> </span>
		<input type="email" placeholder="Insert eMail" required autocomplete='off' name="email"/>
		<span> <?php if(isset($errorArray['emailError'])) echo "invalid email";?> </span>
		<input type="password" placeholder="Insert Password" name="pass" required />
		<span> <?php if(isset($errorArray['passError'])) echo "invalid pass";?> </span>
		<input type="text" name="phone" placeholder="Insert Phone" >
		<span> <?php if(isset($errorArray['phoneError'])) echo "invalid phone";?> </span>
		<span id="hintspan">Hint:password contains capital,small letters,numbers at least 4</span>
		<button class="form-btn sx log-in" type="button">Log In</button>
		<button class="form-btn dx" type="submit" value="register" name="registerBtn" >Sign Up</button>
	</form>


	<form class="signIn" action="" method="post">
		<h3>Welcome</br>Back !</h3>
		<!--<button class="fb" type="button">Log In With Facebook</button>-->
		<!--<p>- or -</p>-->
		<br><br><br>
		<input type="email" placeholder="Insert eMail" autocomplete='off' required name="loginemail" />
		<input type="password" placeholder="Insert Password" required name="loginpass" />
		<button class="form-btn sx back" type="button">Back</button>
		<br><span> <?php if(isset($loginError)) echo "Invalid Data";?> </span>
		<!--<input type="submit" name="loginBtn" value="Log In" class="form-btn dx">-->
		<button class="form-btn dx" type="submit" value="login" name="loginBtn">Log In</button>
	</form>
</div>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
	
    <script src="template/js/index.js"></script>

</body>
</html>

<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: recentalbums.php");
    exit;
} // FOR LOGIN CODE
else {
	session_destroy();
}

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if (isset($_POST['rusername'])){
	$username = $_POST['rusername'];
}
if (isset($_POST['rpassword'])){
	$password = $_POST['rpassword'];
}
if (isset($_POST['confirm_password'])){
	$confirm_password = $_POST['confirm_password'];
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
if(isset($_POST["username"]) && trim($_POST["username"]) != "" && isset($_POST["password"]) && trim($_POST["password"]) != ""){
	
	//------- LOGIN CODE -------
	
	// Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: recentalbums.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
	mysqli_close($link);
    // Close connection
}
 //------- REGISTER CODE -------
// Processing form data when form is submitted
//if($_SERVER["REQUEST_METHOD"] == "POST"){
else {
	// Validate username
	if(empty(trim($_POST["rusername"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["rusername"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["rusername"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["rpassword"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["rpassword"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["rpassword"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
       
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: loginregister.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
	mysqli_close($link);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" sizes='32x32' type="image/jpg" href="images/voyagers3.png" >
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
	
    <style>
    
	@import url('https://fonts.googleapis.com/css?family=Mukta');
	body{
	  font-family: 'Mukta', sans-serif;
		height:100vh;
		min-height:550px;
		background-image:url("images/voyagers.jpg");
		background-repeat: no-repeat;
		background-size:cover;
		background-position:center;
		position:relative;
		overflow-y: hidden;
	}
	
	.topnav {
      overflow: hidden;
      background-color: #111111;
    }
  
    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }
    .topnav a:hover {
      background-color: #60C4C1;
      color: black;
    }
      background-color: #F0AF24;
      color: white;
    }
    .topnav .icon {
      display: none;
    }
	
    @media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {display: none;}
      .topnav a.icon {
        float: right;
        display: block;
      }
    }
    @media screen and (max-width: 600px) {
      .topnav.responsive {position: relative;}
      .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
      }
      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
    }
	
	a{
	  text-decoration:none;
	  color:#444444;
	}
	.bg-image {
	  background-image: url("images/new.png");
	  filter: blur(8px);
	  -webkit-filter: blur(8px);
	}
	.login-reg-panel{
		position: relative;
		top: 50%;
		transform: translateY(-50%);
		text-align:center;
		width:70%;
		right:0;left:0;
		margin:auto;
		height:400px;
		background-color: rgba(30,30,30, 0.9);
	}
	.white-panel{
		background-color: rgba(255,255,255, 1);
		height:500px;
		position:absolute;
		top:-50px;
		width:50%;
		right:calc(50% - 50px);
		transition:.3s ease-in-out;
		z-index:0;
	}
	.login-reg-panel input[type="radio"]{
		position:relative;
		display:none;
	}
	.login-reg-panel{
		color:#B8B8B8;
	}
	.login-reg-panel #label-login, 
	.login-reg-panel #label-register{
		border:1px solid #9E9E9E;
		padding:0 5px;
		width:150px;
		display:block;
		text-align:center;
		border-radius:3px;
		cursor:pointer;
	}
	.login-info-box{
		width:30%;
		padding:0 50px;
		top:20%;
		left:0;
		position:absolute;
		text-align:left;
	}
	.register-info-box{
		width:30%;
		padding:0 50px;
		top:20%;
		right:0;
		position:absolute;
		text-align:left;
		
	}
	.right-log{right:50px !important;}

	.login-show, 
	.register-show{
		z-index: 1;
		display:none;
		opacity:0;
		transition:0.3s ease-in-out;
		color:#242424;
		text-align:left;
		padding:50px;
	}
	.show-log-panel{
		display:block;
		opacity:0.9;
	}
	.login-show input[type="text"], .login-show input[type="password"]{
		width: 100%;
		display: block;
		margin:20px 0;
		padding: 15px;
		border: 1px solid #b5b5b5;
		outline: none;
	}
	.login-show input[type="button"] {
		max-width: 150px;
		width: 100%;
		background: #444444;
		color: #f9f9f9;
		border: none;
		padding: 10px;
		text-transform: uppercase;
		border-radius: 2px;
		float:right;
		cursor:pointer;
	}
	.login-show a{
		display:inline-block;
		padding:10px 0;
	}

	.register-show input[type="text"], .register-show input[type="password"]{
		width: 100%;
		display: block;
		margin:20px 0;
		padding: 15px;
		border: 1px solid #b5b5b5;
		outline: none;
	}
	.register-show input[type="button"] {
		max-width: 150px;
		width: 100%;
		background: #444444;
		color: #f9f9f9;
		border: none;
		padding: 10px;
		text-transform: uppercase;
		border-radius: 2px;
		float:right;
		cursor:pointer;
	}
	.credit {
		position:absolute;
		bottom:10px;
		left:10px;
		color: #3B3B25;
		margin: 0;
		padding: 0;
		font-family: Arial,sans-serif;
		text-transform: uppercase;
		font-size: 12px;
		font-weight: bold;
		letter-spacing: 1px;
		z-index: 99;
	}
	a{
	  text-decoration:none;
	  color:#ff0000;
	}

	.fa {
	  padding: 10px;
	  font-size: 20px;
	  width: 30px;
	  text-align: center;
	  text-decoration: none;
	  margin: 5px 2px;
	}

	.fa-google {
	  display: block;
	  background: #dd4b39;
	  color: white;
	}

	.fa-facebook {
	   display: block;  
	  background: #3B5998;
	  color: white;
	}

	.fa-twitter {
	  background: #55ACEE;
	  color: white;
	}
    </style>
</head>
<body>
	<DIV class="topnav" id="myTopnav" align="center">
		<A href="index.php"> <img src='images/voyagerslogo.png' style='width: 17px;height:17px;'> </A>
		<A href="members.php"> Meet The Band </A>
		<!--<A href="recentalbums.php"> Recent Albums </A>-->
		<A href="gallery.php"> Gallery </A>
		<A href="contact.php"> Contact Us </A>
		<!--<A href="loginregister.php" CLASS='active'> Login </A>-->
		<!--<A href="javascript:void(0);" class="icon" onclick="navBar()"> <I class="fa fa-bars"></I> </A>-->
    </DIV>
	
    <div class="bg-image"></div>
  	<div class="login-reg-panel">
		<div class="login-info-box">
			<h2>Have an account?</h2>
			<p>Go ahead and login </p>
			<label id="label-register" for="log-reg-show">Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>
							
		<div class="register-info-box">
			<h2>Don't have an account?</h2>
			<p>Please do register</p>
			<label id="label-login" for="log-login-show">Register</label>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>
							
		<div class="white-panel">
			<FORM action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="login-show">
				<h2>LOGIN</h2>
				<DIV class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
					<span class="help-block"><?php echo $username_err; ?></span>
				</DIV>
				<DIV class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
					<span class="help-block"><?php echo $password_err; ?></span>
				</DIV>
				<INPUT TYPE='hidden' NAME='action' VALUE='login'>
				<input type="submit" value="Login"> <BR>
				<!--<a href='Update.php'>Forgot password?</a>-->
			</div>
			</FORM>
			<FORM action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="register-show">
				<h2>REGISTER</h2>
				<DIV class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<input type="text" name="rusername" placeholder="Username" value="<?php echo $username; ?>">
					<span class="help-block"><?php echo $username_err; ?></span>
				</DIV>
				<DIV class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<input type="password" name="rpassword" placeholder="Password" value="<?php echo $password; ?>">
					<span class="help-block"><?php echo $password_err; ?></span>
				</DIV>
				<DIV class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
					<span class="help-block"><?php echo $confirm_password_err; ?></span>
				</DIV>
				<INPUT TYPE='hidden' NAME='action' VALUE='register'>
				<input type="submit" value="Register">
			</div>
			</FORM>
		</div>
	</div>
    <a href="https://accounts.google.com/signin/v2/identifier?service=CPanel&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="fa fa-google"></a>
    <a href="https://en-gb.facebook.com/login/" class="fa fa-facebook"></a>
    <a href="https://twitter.com/login?lang=en" class="fa fa-twitter"></a>
  <script>
    $(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
	});

	$('.login-reg-panel input[type="radio"]').on('change', function() {
		if($('#log-login-show').is(':checked')) {
			$('.register-info-box').fadeOut(); 
			$('.login-info-box').fadeIn();
			
			$('.white-panel').addClass('right-log');
			$('.register-show').addClass('show-log-panel');
			$('.login-show').removeClass('show-log-panel');
			
		}
		else if($('#log-reg-show').is(':checked')) {
			$('.register-info-box').fadeIn();
			$('.login-info-box').fadeOut();
			
			$('.white-panel').removeClass('right-log');
			
			$('.login-show').addClass('show-log-panel');
			$('.register-show').removeClass('show-log-panel');
		}
	});
</script>

</body>
</html>
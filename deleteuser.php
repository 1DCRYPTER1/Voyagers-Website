<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginregister.php");
    exit;
}
 
// Include config file
require_once "config.php";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

$sql = "DELETE FROM users WHERE id = ?";
if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            
            // Set parameters
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                //Destroy the session, and redirect to login page
                session_destroy();
                header("location: loginregister.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
	mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Delete Account </title>
    <style type="text/css">
        .wrapper { 
		  width: 350px;
		  padding: 20px;
		  border: 3px solid #f1f1f1;
		  margin-left: auto;
		  margin-right: auto;
		  opacity: 0.9;
		  background-color: #414141;
		}
		body {
          background-color: #414141;
          font-family: "Lato", sans-serif;
		  background-image: url("images/voyagers.jpg");
		  height: 400px; 
		  background-attachment: fixed;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
        }
		h1 {
		  font-family: lucida,sans-serif;
		  color: #ffc300;
	      text-align: center;
		}
		h2 {
		  font-family: "Comic Sans MS", cursive, sans-serif;
		  color: #2AE8D8;
		  text-align: center;
		}
		p {
		  color: #FFC300;
		  font-family: verdana;
		  font-size: 20px;
		  text-align: center;
		}
		.button {
		  background-color: #111111 /*#00FFFB*/;
		  border: none;
		  color: white;
		  padding: 16px 32px;
		  text-align: center;
		  font-size: 16px;
		  margin: auto;
		  transition: 0.3s;
		  display: block;
		  text-decoration: none;
		  cursor: pointer;
		  transition: width 2s;
		}
		.button:hover {
		  opacity: 1;
		  width: 250px;
		}
		label {
			color: white;
		}
    </style>
</head>
<body>
	<BR> <BR>
    <div class="wrapper">
        <h2> Delete Account </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<BR>
            <div class="form-group">
                <input type="submit" class="button" value="Confirm Account Deletion">
				<BR>
                <a class="button" href="index.php"> Cancel </a>
            </div>
        </form>
    </div>    
</body>
</html>
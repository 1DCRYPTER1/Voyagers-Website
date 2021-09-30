<?php
// Initialize the session
session_start();
$login = "<a href=\"recentalbums.php\">Login</a>";
$logout = "<a href=\"logout.php\">Logout</a>";
$pwchange = "<a href=\"reset-password.php\">Change Password</a>";
$userdel = "<a href=\"deleteuser.php\">Delete Account</a>";
$albumacc = "<a href=\"recentalbums.php\">Recent Albums</a>";
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	$check_login = $logout;
	$check_login1 = $pwchange;
	$check_login2 = $userdel;
	$check_login3 = $albumacc;
}
else{
	$check_login = $login;
	$check_login1 = '';
	$check_login2 = '';
	$check_login3 = '';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" sizes='32x32' type="image/jpg" href="images/voyagers3.png" >
<style>
* {
  box-sizing: border-box;
}

/*Comman for navigation Bar*/
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
    .topnav a.active {
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
/*Navigation Bar*/

body {
  font-family: Arial;
}

/* The grid: Four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
}

/* Style the images inside the grid */
.column img {
  opacity: 0.8; 
  cursor: pointer; 
}

.column img:hover {
  opacity: 1;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The expanding image container */
.container {
  position: relative;
  display: none;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}

	.footer {
	  left: 0;
	  bottom: 0;
	  width: 100%;
	  background-color: grey;
	  color: white;
	  text-align: center;
	  padding: 5px;
	  position: fixed;
	}
</style>
</head>
<body bgcolor="black">
	<DIV class="topnav" id="myTopnav" align="center">
		<A href="index.php"> <img src='images/voyagerslogo.png' style='width: 17px;height:17px;'> </A>
		<A href="members.php"> Meet The Band </A>
		<?php echo $check_login3; ?>
		<A href="gallery.php" class="active"> Gallery </A>
		<A href="contact.php"> Contact Us </A>
		<SPAN STYLE="float:right"> <?php echo $check_login; echo $check_login1; echo $check_login2; ?> </SPAN>
		<A href="javascript:void(0);" class="icon" onclick="navBar()"> <I class="fa fa-bars"></I> </A>
    </DIV>
  <SCRIPT>
  function navBar() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  </SCRIPT>

<div style="text-align:center; color: cyan;">
  <h1 style="font-family: Samarkan;">VOYAGERS GALLERY</h1>
</div>

<!-- The four columns -->
<div class="row">
  <div class="column">
    <img src="images/11.jpg" alt="Singing" style="width:100%" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="images/2.jpg" alt="Recordings" style="width:100%" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="images/3.jpg" alt="Guitar Modifications" style="width:100%" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="images/4.jpg" alt="Team" style="width:100%" onclick="myFunction(this);">
  </div>

<div class="container">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:100%">
  <div id="imgtext"></div>
</div>

<!-- HERE THE CODE IS FOR ENLARGING THE IMAGE -->
<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>

  <DIV class="footer">
  <P style="color:black; font-size:12px;">Copyright 2019, Voyagers. All Rights Reserved.
  Developed By: Tech ArNeSh<sup style='font-size:6px;'>TM</sup> <br><A href="https://www.instagram.com/voyagers_the_band/"> <img src="images/Instagram.png"></A> | <A href="www.facebook.com"><img src="images/Facebook.png"></A> | <A href="www.twitter.com"><img src="images/Twitter.png"></A></P>
  </DIV>

</body>
</html>

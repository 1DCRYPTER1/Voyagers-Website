<?php
// Initialize the session
session_start();
$login = "<a href=\"loginregister.php\">Login</a>";
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
	header("location: loginregister.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" sizes='32x32' type="image/jpg" href="images/voyagers3.png" >
<script>
function myFunction() {
  alert("Congradulations you have logged in and are able to view our premium videos!");
}
</script>

<script>
function showCD(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","albums.php?q="+str,true);
  xmlhttp.send();
}
</script>

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #404040;
}

/*Comman for navigation Bar*/
.topnav {
      overflow: hidden;
      background-color: #111111;
      border-radius: 10px;
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
	.topnavlogin{
		display: <?=displaytoggle?>;
	}

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 50%;
  padding: 10px 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #000000;
  color: #f2f2f2;
}
	.footer {
	  position: relative;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  width: 100%;
	  background-color: grey;
	  color: white;
	  text-align: center;
	  padding: 5px;

	}
</style>
</head>
<body>
  <DIV class="topnav" id="myTopnav" align="center">
    <A href="index.php" > <IMG SRC='images/voyagerslogo.png' STYLE='width: 17px;height:17px;'> </A>
    <A href="members.php"> Meet The Band </A>
    <A href="recentalbums.php" CLASS='active'> Recent Albums </A>
    <A href="gallery.php"> Gallery </A>
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
<BR>

<DIV CLASS="card" STYLE='border-radius: 10px;'>
<form>
Select an Album:
<select name="cds" onchange="showCD(this.value)">
<option value="">Select Album:</option>
<option value="Dosti Cha Nata"> Dosti Cha Nata </option>
<option value="Tu Mazhe Sukh"> Tu Mazhe Sukh </option>
<option value="Kosalta Wara"> Kosalta Wara </option>
<option value="Jaganmaya"> Jaganmaya </option>
</select>
</form>
<div id="txtHint"><b>Album info will be listed here...</b></div>
</DIV>

<div class="row">
  <div class="column">
  	<a href="voyagersvideos.html">
    <div class="card">
      <h2 style="font-family: Samarkan;">Dosti Cha Nata</h2>
     <img onclick="myFunction()" src="images/thumbdosti1.jpg" style="width:50%">
 	</a>
    </div>
  </div>

  <div class="column">
  	<a href="voyagersvideos.html">
    <div class="card">
      <h2 style="font-family: Samarkan;">Tu Mazhe Sukh</h2>
     <img onclick="myFunction()" src="images/tumazhesukh.jpg" style="width:50%">
 	  </a>
    </div>
  </div>
</div>
  
  <div class="row">
  <div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Upcoming...</h2>
     <img src="images/album3.jpg" style="width:50%; opacity: 0.2;">
    </div>
  </div>
  <div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Upcoming...</h2>
     <img src="images/Lucy.png" style="width:50%; opacity: 0.2;">
    </div>
  </div>
</div>

  
   <DIV class="footer">
  <P style="color:black; font-size:12px;">Copyright 2019, Voyagers. All Rights Reserved.
  Developed By: Tech ArNeSh<sup style='font-size:6px;'>TM</sup> <br><A href="https://www.instagram.com/voyagers_the_band/"> <img src="images/Instagram.png"></A> | <A href="www.facebook.com"><img src="images/Facebook.png"></A> | <A href="www.twitter.com"><img src="images/Twitter.png"></A></P>
  </DIV>

</body>
</html>
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
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" sizes='32x32' type="image/jpg" href="images/voyagers3.png" >
<style>
	body {
	  font-family: Arial, Helvetica, sans-serif;
	  background-color: #404040;
	}

	/*Common for navigation Bar*/
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

	* {
	  box-sizing: border-box;
	}

	/* Float four columns side by side */
	.column {
	  float: left;
	  width: 25%;
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
	  position: static;
	  left: 0;
	  bottom: 0;
	  width: 100%;
	  background-color: grey;
	  color: white;
	  text-align: center;
	  padding: 5px;
      margin-left: auto;
	  margin-right: auto;
	}
	
	/* GMap styling */
	* {
	  box-sizing: border-box;
	}
	.mapouter{
	  position:relative;
	  height:500px;
	  width: 600px;
	  padding-bottom: 10px;
	}
	.gmap_canvas {
	  overflow:hidden;
	  background:none!important;
	  height:100%;
	  width:100%;
	}
	.mapcolumn {
	  margin-left: auto;
	  margin-right: auto;
	  width: 50%;
	  padding: 10px;
	  height: 500px;
	}
	.maprow:after {
	  content: "";
	  display: table;
	  clear: both;
	}
</style>
</head>
<body>
	<DIV class="topnav" id="myTopnav" align="center">
		<A href="index.php"> <img src='images/voyagerslogo.png' style='width: 17px;height:17px;'> </A>
		<A href="members.php"> Meet The Band </A>
		<?php echo $check_login3; ?>
		<A href="gallery.php"> Gallery </A>
		<A href="contact.php" class="active"> Contact Us </A>
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

<div class="row">
  <div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Shaun D'silva</h2>
     <img src="images/Shaun_D_silva.png" style="width:50%">
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Elton D'silva</h2>
     <img src="images/Elton_D_silva.png" style="width:50%">
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Reeve Rebello</h2>
     <img src="images/Reeve_R_bello.png" style="width:50%">
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Cliff Machado</h2>
   <img src="images/Cliff_M_achado.png" style="width:50%">
    </div>
  </div>
</div>
<DIV CLASS="row">
<div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Orvin Fernandes</h2>
   <img src="images/Shaun_D_silva.png" style="width:50%">
    </div>
  </div>
<div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Princley Lemos</h2>
   <img src="images/Shaun_D_silva.png" style="width:50%">
    </div>
  </div>
<div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">Roosevelt Dias</h2>
   <img src="images/Shaun_D_silva.png" style="width:50%">
    </div>
  </div>
<div class="column">
    <div class="card">
      <h2 style="font-family: Samarkan;">8th member</h3>
   <img src="images/Shaun_D_silva.png" style="width:50%">
    </div>
  </div>
</div>

    <h1 style="font-family: Samarkan; text-align: center;" >Get Our Location @googlemaps</h1>
<!-- Here the Geoloaction code is there-->
<div class="maprow">
    <div class="mapcolumn">
      <div class="mapouter">
		<div class="gmap_canvas"><iframe width="600px" height="500px" id="gmap_canvas" src="https://maps.google.com/maps?q=vasai&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
      </div>
	</div>
</div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<div>
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
</div>
<BR> <BR>
 <DIV class="footer">
  <P style="color:black; font-size:12px;">Copyright 2019, Voyagers. All Rights Reserved.
  Developed By: Tech ArNeSh<sup style='font-size:6px;'>TM</sup> <br><A href="https://www.instagram.com/voyagers_the_band/"> <img src="images/Instagram.png"></A> | <A href="www.facebook.com"><img src="images/Facebook.png"></A> | <A href="www.twitter.com"><img src="images/Twitter.png"></A></P>
  </DIV>

</body>
</html>
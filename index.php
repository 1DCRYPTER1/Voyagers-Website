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
<HTML>
<HEAD> <TITLE>The Voyagers </TITLE>
  <LINK rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" sizes='32x32' type="image/jpg" href="images/voyagers3.png" >
  <STYLE> 

  	/* Button used to open the contact form - fixed at the bottom of the page */
	.open-button {
	  background-color: #555;
	  color: white;
	  padding: 16px 20px;
	  border: none;
	  cursor: pointer;
	  opacity: 0.8;
	  position: fixed;
	  bottom: 23px;
	  right: 28px;
	  width: 280px;
	}

	/* The popup form - hidden by default */
	.form-popup {
	  display: none;
	  position: fixed;
	  bottom: 0;
	  right: 15px;
	  border: 3px solid #f1f1f1;
	  z-index: 9;
	}

	/* Add styles to the form container */
	.form-container {
	  max-width: 300px;
	  padding: 10px;
	  background-color: white;
	}

	/* Full-width input fields */
	.form-container input[type=text], .form-container input[type=password] {
	  width: 100%;
	  padding: 15px;
	  margin: 5px 0 22px 0;
	  border: none;
	  background: #f1f1f1;
	}

	/* When the inputs get focus, do something */
	.form-container input[type=text]:focus, .form-container input[type=password]:focus {
	  background-color: #ddd;
	  outline: none;
	}

	/* Set a style for the submit/login button */
	.form-container .btn {
	  background-color: #4CAF50;
	  color: white;
	  padding: 16px 20px;
	  border: none;
	  cursor: pointer;
	  width: 100%;
	  margin-bottom:10px;
	  opacity: 0.8;
	}

	/* Add a red background color to the cancel button */
	.form-container .cancel {
	  background-color: red;
	}

	/* Add some hover effects to buttons */
	.form-container .btn:hover, .open-button:hover {
	  opacity: 1;
	}

    body {
          background-color: #414141;
          font-family: "Lato", sans-serif;
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
 	 background-color: #00FFFB /*#ff33cc*/;
	  border: none;
	  color: white;
	  padding: 16px 32px;
	  text-align: center;
	  font-size: 16px;
	  margin: auto;
	  opacity: 0.6;
	  transition: 0.3s;
	  display: block;
	  text-decoration: none;
	  cursor: pointer;
 	  transition: width 2s;
	}
	.button:hover {opacity: 1;width: 300px;}

    .topnav {
      overflow: hidden;
      background-color: #111111;
	  position: sticky;
	  top: 5;
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
	
	.footer {
	  position: static;
	  left: 0;
	  bottom: 0;
	  width: 100%;
	  background-color: grey;
	  color: white;
	  text-align: center;
	  padding: 5px;
	  margin: 0;
	}

    #snackbar {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }
    #snackbar.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

  </STYLE>

</HEAD>

<BODY>

	<embed src="shaun.mp3" loop="false" hidden="true" autostart="true">

	<STYLE>
  .parallax2 { 
    background-image: url("images/voyagers.jpg");
    height: 400px; 
    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  </STYLE>
  <DIV class="parallax2"></DIV>
	<DIV class="topnav" id="myTopnav" align="center">
		<A href="index.php" CLASS='active'> <IMG SRC='images/voyagerslogo.png' STYLE='width: 17px;height:17px;'> </A>
		<A href="members.php"> Meet The Band </A>
		<?php echo $check_login3; ?>
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
	<H1 style="font-family: Samarkan;"> VOYAGERS <BR> The Band </H1>

  <DIV id="snackbar">Do Login to access our full featureset!</DIV>
  <SCRIPT>
    function loadSnackbar() {
      var x = document.getElementById("snackbar");
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
    window.onload=loadSnackbar
  </SCRIPT>

  <P> Experience an ethereal musical experience! </P>
  <P> An authentic Indian musical experience infused with the famous Kokani and Goan flavour of Vasai. </P>
  <HR>


<button onclick="window.location.href='booking.html'" class="button"> <B> Book Now </B> </button>
<BR>

   <STYLE>
  .parallax1 { 
    background-image: url("images/voyage.jpg");
    height: 400px; 
    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  </STYLE>
  <DIV class="parallax1"></DIV>
  <HR>
  
  <P align="center" style="color:#61e5ff;">We the Voyagers are here to take you all on a musical voyage. We are a Vasai based band recreating the old memmories of our own "Harit Vasai" (Evergreen Vasai). All our songs are based on a musical famous band Meesharn and the "Mai" Album.</P>
  <HR>
  <BR><BR>
  <DIV class="footer">
  <P style="color:black; font-size:12px; margin: 0;">Copyright 2019, Voyagers. All Rights Reserved.
  Developed By: Tech ArNeSh<sup style='font-size:6px;'>TM</sup> <br><A href="https://www.instagram.com/voyagers_the_band/"> <img src="images/Instagram.png"></A> | <A href="www.facebook.com"><img src="images/Facebook.png"></A> | <A href="www.twitter.com"><img src="images/Twitter.png"></A></P>
  </DIV>
</BODY>
</HTML>
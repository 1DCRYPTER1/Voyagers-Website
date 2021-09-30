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
}
/* This is common for navigation bar */
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
/*Common Part*/

	#leftbox { 
	  float:left;  
	  width:33.33%;  
	} 
	#middlebox{ 
	  float:left;   
	  width:33.33%;  
	} 
	#rightbox{ 
	  float:right;  
	  width:33.33%;  
	} 

	.flip-card {
	  background-color: transparent;
	  width: 300px;
	  height: 300px;
	  perspective: 1000px;
	}

	.flip-card-inner {
	  position: relative;
	  width: 100%;
	  height: 100%;
	  text-align: center;
	  transition: transform 0.6s;
	  transform-style: preserve-3d;
	  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	}

	.flip-card:hover .flip-card-inner {
	  transform: rotateY(180deg);
	}

	.flip-card-front, .flip-card-back {
	  position: absolute;
	  width: 100%;
	  height: 100%;
	  backface-visibility: hidden;
	}

	.flip-card-front {
	  background-color: #bbb;
	  color: black;
	}

	.flip-card-back {
	  background-color:#a774f7;
	  color: white;
	  transform: rotateY(180deg);
	}
	.flip-card-back1 {
	  background-color:#000000;
	  color: black;
	  transform: rotateY(180deg);
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
	}
	
	/* json table */
	th, td, p, input {
      font:14px Verdana;
    }
    table, th, td {
      border: solid 1px #DDD;
      border-collapse: collapse;
      padding: 2px 3px;
      text-align: center;
	  color: white;
    }
    th {
      font-weight:bold;
    }
</style>
</head>
<body bgcolor="Black">

	<DIV class="topnav" id="myTopnav" align="center">
		<A href="index.php"> <img src='images/voyagerslogo.png' style='width: 17px;height:17px;'> </A>
		<A href="members.php"  class="active"> Meet The Band </A>
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

<h1 style="font-family: Samarkan;color:#a774f7;text-align: center;font-size: 300%;">Members of the Voyagers</h1>


<div id = "leftbox" class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/elton.jpg" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back">
      <h1>Elton Dsilva</h1> 
      <p><b>Bass Guitarist</b></p> 
    </div>
  </div>
</div>


<div id = "middlebox" class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/shaun.jpg" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back">
      <h1>Shaun Dsilva</h1> 
      <p><b>Lead Guitarist</b></p> 
    </div>
  </div>
</div>


<div id = "rightbox" class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/princley.jpg" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back">
      <h1>Princley Lemos</h1> 
      <p><b>Rhythm Guitarist</b></p> 
    </div>
  </div>
</div>


<div id = "leftbox" class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/Reeve.png" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back">
      <h1>Reeve Rebello</h1> 
      <p><b>Drummer</b></p> 
    </div>
  </div>
</div>


<div id="middlebox" class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/orvin.jpg" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back">
      <h1>Orvin Fernandes</h1> 
      <p><b>Keyboardist</b></p> 
    </div>
  </div>
</div>

<div id="rightbox" class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/roosevelt.jpg" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back">
      <h1>Roosevelt Dias</h1> 
      <p><b>Hindi/Marathi Vocalist</b></p> 
    </div>
  </div>
</div>

<div id = "leftbox" class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/Cliff.jpg" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back">
      <h1>Cliff Machado</h1> 
      <p><b>Vocalist</b></p> 
    </div>
  </div>
</div>

<DIV ID='middlebox' CLASS='flip-card'>
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/blackavatar.jpg" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back1">
      <h1>Tech</h1> 
      <p><b>ArNeSh</b></p> 
    </div>
  </div>
</DIV>
<DIV ID='rightbox' CLASS='flip-card'>
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="images/blackavatar.jpg" alt="Avatar" style="width:100%;height:100%;">
    </div>
    <div class="flip-card-back1">
      <h1>Tech</h1> 
      <p><b>ArNeSh</b></p> 
    </div>
  </div>
</DIV>

  <input type="button" onclick="CreateTableFromJSON()" value="Display Member Contacts" />
  <p id="showData"></p>

<script type="text/javascript" src="data.json"></script>
<script>
    function CreateTableFromJSON() {
        var myBooks = data

        // EXTRACT VALUE FOR HTML HEADER. 
        // ('Book ID', 'Book Name', 'Category' and 'Price')
        var col = [];
        for (var i = 0; i < myBooks.length; i++) {
            for (var key in myBooks[i]) {
                if (col.indexOf(key) === -1) {
                    col.push(key);
                }
            }
        }

        // CREATE DYNAMIC TABLE.
        var table = document.createElement("table");

        // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.

        var tr = table.insertRow(-1);                   // TABLE ROW.

        for (var i = 0; i < col.length; i++) {
            var th = document.createElement("th");      // TABLE HEADER.
            th.innerHTML = col[i];
            tr.appendChild(th);
        }

        // ADD JSON DATA TO THE TABLE AS ROWS.
        for (var i = 0; i < myBooks.length; i++) {

            tr = table.insertRow(-1);

            for (var j = 0; j < col.length; j++) {
                var tabCell = tr.insertCell(-1);
                tabCell.innerHTML = myBooks[i][col[j]];
            }
        }

        // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
        var divContainer = document.getElementById("showData");
        divContainer.innerHTML = "";
        divContainer.appendChild(table);
    }
</script>

  <DIV class="footer">
  <P style="color:black; font-size:12px;">Copyright 2019, Voyagers. All Rights Reserved.
  Developed By: Tech ArNeSh<sup style='font-size:6px;'>TM</sup> <br><A href="https://www.instagram.com/voyagers_the_band/"> <img src="images/Instagram.png"></A> | <A href="www.facebook.com"><img src="images/Facebook.png"></A> | <A href="www.twitter.com"><img src="images/Twitter.png"></A></P>
  </DIV>

</body>
</html>
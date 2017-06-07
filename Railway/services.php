<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Railway Ticket Booking</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/rlogo.png" height=50 width=400  alt="logo"></a>
            </div>
             <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="index.php">Home</a></li>
                    <li><a href="about-us.php">About Us</a></li>
                    <li class="active"><a href="services.php">Sign Up</a></li>
                    <li><a href="portfolio.php">Sign In</a></li>
                    <li><a href="contact-us.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->

	<?php

if(isset($_POST['email'])&&isset($_POST['uname'])&&isset($_POST['name'])&&isset($_POST['password'])&&isset($_POST['confirm_password']))
{
$newvar=0;
$newvar1=0;	
$name=$_POST["name"];
$uname=$_POST["uname"];

$email=$_POST["email"];
$password=$_POST["password"];
$confirm_password=$_POST["confirm_password"];
if($name!=null&&$uname!=null&&$email!=null&&$password!=null&&$confirm_password!=null){
if($password==$confirm_password)
		{
$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);

if($db_found)
{
$sql= "select * from users ";          
			$result=mysql_query($sql);
			while ( $db_field = mysql_fetch_assoc($result) ) {

			if($db_field['email']==$email)
			{
			$newvar=1;
			}
			if($db_field['username']==$uname)
			{
			$newvar1=2;
			}
			}
			
			if($newvar==1)
			{
					$var="The email you entered is already registered with other account, please enter another email address";
				//	echo "<script type='text/javascript'>alert('{$var}');</script>";
			}
			if($newvar1==2)
			{
					$var="The Username you entered is already taken.";
			//		echo "<script type='text/javascript'>alert('{$var}');</script>";
			}
		if($newvar==0&&$newvar1==0)
		{		  

$sql1="INSERT INTO users (username,name,email,password,confirm_password,type) 
	VALUES('$uname','$name','$email','$password','$confirm_password','0')";
		
	$var="You are Successfully Registered..";
	echo "<script type='text/javascript'>alert('{$var}');</script>";
	$result=mysql_query($sql1);
	mysql_close($db_handle);
	$r='index.php';
    header('Location: '.$r);	

					}
		
		}
		}	

else
{
	$var="Password Not mattched";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
	
}
}
else{
	$var="Insert data";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
	
	
}
}


?>

	
	
	<br>
<br>

<h1>SIGN UP</h1>
<br>
    
	<form action="services.php" method="post">

 <div class="col-md-1" style="width: 5.333333%"> 
 <div style="width="12px;"> Name  </div>
 </div>
 <div class="col-md-2">
  <input type="text" name="name"> </div> 
</div> 
<br><br>

 <div class="col-md-1" style="width: 5.333333%"> 
 <div style="width="12px;"> username  </div>
 </div>
 <div class="col-md-2">
  <input type="text" name="uname"> </div> 
</div> 
<br><br>
 <div class="col-md-1" style="width: 5.333333%"> 
 <div style="width="12px;"> Email  </div>
 </div>
 <div class="col-md-2">
  <input type="email" name="email"> </div> 
</div> 
<br><br>
<div class="col-md-1" style="width: 5.333333%"> 
 <div style="width="12px;"> Password  </div>
 </div>
 <div class="col-md-2">
  <input type="password" name="password"> </div> 
</div> 
<br><br>
<div class="col-md-1" style="width: 5.333333%"> 
 <div style="width="12px;"> Confirm Password  </div>
 </div>
 <div class="col-md-2">
  <input type="password" name="confirm_password"> </div> 
</div> 
<br><br>
 <div class="col-md-4" style="width: 5.333333%">
</div> 
 <div class="col-md-2">
<button type="submit" class="btn btn-primary active" > Sign Up</button> </div> 
 
</form>
 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

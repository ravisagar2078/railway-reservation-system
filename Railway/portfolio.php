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
<?php 
session_start();
if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username'])  &&!empty($_POST['password']) )
{
	$newvar=0;
	$id_user=$_POST['username'];
	$password=$_POST['password'];
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
if($db_field['username']==$id_user && $db_field['password']==$password)
			{
			$newvar=1;
	
	if($newvar==1&& $db_field['type']==0)
	{
	$_SESSION['C_ID'] = $id_user;
		$r='com_user.php';	
	mysql_close($db_handle);
	header('Location: '.$r);
		
	}

		else
		{
			 if($newvar==1&&$db_field['type']==1)
	{
	$_SESSION['A_ID']=$id_user;
		$r='admin.php';
mysql_close($db_handle);	
	header('Location: '.$r);
		
	}
	
		}	

	}
	else{
		
		
	}
			
			}

			
}}
		
?>
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
                    <li><a href="services.php">Sign Up</a></li>
                    <li class="active"><a href="portfolio.php">Sign In</a></li>
                    <li><a href="contact-us.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->
<br>
<br>
  <h1>SIGN IN</h1>
<br>
 <form  action="portfolio.php" method="post">

<div class="col-md-1" style="width: 5.333333%"> 
 <div style="width="12px;"> Username  </div>
 </div>
 <div class="col-md-2">
  <input type="text" name="username"> </div> 
</div> 
<br><br>
<div class="col-md-1" style="width: 5.333333%"> 
 <div style="width="12px;"> password  </div>
 </div>
 <div class="col-md-2">
  <input type="password" name="password"> </div> 
</div> 
<br><br>
 <div class="col-md-4" style="width: 5.333333%">
</div> 
 <div class="col-md-2">
<button type="submit" class="btn btn-primary active" > Sign In</button> </div> 
 
</form>



  <br><br><br><br><br><br>
 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

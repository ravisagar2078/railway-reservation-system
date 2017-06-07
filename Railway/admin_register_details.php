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
	if(isset($_POST['cnic'])&&isset($_POST['tno'])){
$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);
$pay=$_POST['cnic'];
$tid=$_POST['tno'];
if($db_found)
{	
if(!empty($_POST['cnic'])&&!empty($_POST['tno']))
	{
$q2="select ticket_id as 'maxi'  from reservation where ticket_id=$tid and payment=$pay ";
			$result1 =mysql_query($q2);
			$row1=mysql_fetch_assoc($result1);
			$v2=$row1['maxi'];
$num_length = strlen($pay);

if($num_length == 13&& $v2==$tid) 
{
	
$q1="update reservation set status='confirm' where ticket_id=$tid and  payment=$pay ";	
	$result=mysql_query($q1);
	
mysql_close($db_handle);
$var="TICKET REGISTER SUCCESSFULLY";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
					$r='admin.php';
    header('Location: '.$r);	

	
}
	else
	{$var="C_NIC or Ticket_ID not valid";
					echo "<script type='text/javascript'>alert('{$var}');</script>";}
	}
	

	}
	}
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
                    <title> ADMIN</title >
<li><a href="admin.php">HOME</a></li>

					<li><a href="admin_register_details.php">REGISTER TICKET</a></li>

<li><a href="index.php">LOGOUT</a></li>

                   
                </ul>
            </div>
        </div>
    </header><!--/header-->

	<br>
<br>
<form action="admin_register_details.php" method="post">

 <div class="col-md-1" style="width: 12%"> 
 <div style="width="12px;"> Enter C_NIC Number:  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="cnic"> </div> 
</div> 
<br><br>

 <div class="col-md-1" style="width: 12%"> 
 <div style="width="12px;"> Enter Ticket ID:  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="tno"> </div> 
</div>
<br><br>

<div class="col-md-4" style="width: 12%">
</div> 
 <div class="col-md-2">
<button type="submit" class="btn btn-primary active" > Proceed</button> </div> 
 
</form>
 



 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
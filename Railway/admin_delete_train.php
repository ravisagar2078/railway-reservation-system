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
	
$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);
$result222=0;
if($db_found)
{
if(isset($_POST['trainid']))
{
	$s2=$_POST['trainid'];
//echo $s2;
	if(!empty($s2))
	{
    $query1 = "Select * FROM train where trainid=$s2 ";
    $result = mysql_query($query1);
    //echo "<br/>";			
$query2 = "Select * FROM coachinfo where trainid=$s2 ";
    $result3 = mysql_query($query2);

$query22 = "Select * FROM coach where trainid=$s2 ";
    $result33 = mysql_query($query22);
    
	if(mysql_num_rows($result) > 0 )
	{
		while ( $db_field = mysql_fetch_assoc($result3) ) {

			if($db_field['trainid']==$s2)
			{
	$q2 = "DELETE FROM coachinfo where trainid=$s2 ";
    $r2 = mysql_query($q2);
			}
			}
		while ( $row = mysql_fetch_assoc($result33) ) {

			if($row['trainid']==$s2)
			{
	$q23 = "DELETE FROM coach where trainid=$s2 ";
    $r23 = mysql_query($q23);
			}
			}
			
    $query200 = "DELETE FROM train where trainid=$s2 ";
    $result200 = mysql_query($query200);

	mysql_close($db_handle);
	$var="DELETEED SUCCESSFULLY";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
				
	
	}
	else
	{
		echo "Please Enter the Valid ID number";
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
                    <title> ADMIN</title >
															<li><a  href="admin.php">HOME</a></li>

					<li><a  href="admin_add_train.php">ADD TRAIN</a></li>

<li><a href="admin_delete_train.php">DELETE TRAIN</a></li>

<li><a href="admin_train_details.php">TRAIN DETAILS</a></li>

<li><a href="admin_showuser_details.php">USER DETAILS</a></li>

<li><a href="index.php">LOGOUT</a></li>

                   
                </ul>
            </div>
        </div>
    </header><!--/header-->

	<br>
<br>
<form action="admin_delete_train.php" method="post">

 <div class="col-md-1" style="width: 5.8888%"> 
 <div style="width="12px;"> Train ID  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="trainid"> </div> 
</div> 
<br><br>
<div class="col-md-4" style="width: 5.333333%">
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
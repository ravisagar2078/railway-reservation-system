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
	if(isset($_POST['trainid'])&&isset($_POST['trainname'])&&isset($_POST['source'])&&isset($_POST['destination'])&&isset($_POST['arrivaltime'])&&
	isset($_POST['departuretime'])
	)
{

	$s1=$_POST['trainid'];
	$s2=$_POST['trainname'];
	$s3=$_POST['source'];
	$s4=$_POST['destination'];
	$s5=$_POST['arrivaltime'];
	$s6=$_POST['departuretime'];
	$newvar=0;
$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);

if($db_found)
{	
if(
!empty($_POST['trainid']) &&
!empty($_POST['trainname']) &&
!empty($_POST['source']) &&
!empty($_POST['destination']) &&
!empty($_POST['arrivaltime']) &&
!empty($_POST['departuretime']))
 //&& !empty($_POST['totalcoachnumber']) )
 {
$sql= "select * from train ";          
			$result=mysql_query($sql);
			while ( $db_field = mysql_fetch_assoc($result) ) {

			if($db_field['trainid']==$s1)
			{
			$newvar=1;
			}
			
			}
			if($newvar==1){
				
				
					$var="train id is already taken";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
		
			}
 

//	$s7=$_POST['s7'];
if($newvar==0){
$q1= "INSERT INTO train (trainid, trainname,totalcoachnumber,source,destination,arrivaltime,departuretime) 
                VALUES ('$s1','$s2','10','$s3','$s4','$s5','$s6')";
$result=mysql_query($q1);

mysql_close($db_handle);
$_SESSION['T_ID'] = $s1;
$_SESSION['c']=5;
$r='after_add_train.php';
    header('Location: '.$r);	

}
/*if(mysqli_query($db,$q1))
{
	echo "Data Has been Inserted and continue";
			$_SESSION['T_ID'] = $s1;
	$r='after_add_train.php';
    header('Location: '.$r);	
}*/
/*else
{
	echo "Data is not Inserted";
	echo "<br />";		
	echo "Fill in the Columns Properly";
}*/
}}

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
                <a class="navbar-brand" href="index.php"><img src="images/rlogo.png" height=50 width=400 alt="logo"></a>
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

<h1>ADD TRAIN</h1>
<br><br>
		<form action="admin_add_train.php" method="post">

 <div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> Train ID  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="trainid"> </div> 
</div> 
<br><br>

 <div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> Train Name  </div>
 </div>
 <div class="col-md-2">
  <input type="text" name="trainname"> </div> 
</div> 
<br><br>
 <div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> Source  </div>
 </div>
 <div class="col-md-2">
  <input type="text" name="source"> </div> 
</div> 
<br><br>
<div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> Destination  </div>
 </div>
 <div class="col-md-2">
  <input type="text" name="destination"> </div> 
</div> 
<br><br>
<div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> ArrivalTime  </div>
 </div>
 <div class="col-md-2">
  <input type="time" name="arrivaltime"> </div> 
</div> 
<br><br>
<div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> DepartureTime  </div>
 </div>
 <div class="col-md-2">
  <input type="time" name="departuretime"> </div> 
</div> 
<br><br>
 <div class="col-md-4" style="width: 8%">
</div> 
 <div class="col-md-2">
<button type="submit" class="btn btn-primary active" > Continue</button> </div> 
 
</form>
 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
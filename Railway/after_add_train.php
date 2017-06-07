
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
<?php

session_start();

	if($_SESSION['c']>0){
if(isset($_POST['coachid'])&&isset($_POST['boolean'])&&isset($_POST['fare'])
	)
{

	//$count=$_SESSION['c'];
	$s1=$_SESSION['T_ID'];

	$s2=$_POST['coachid'];
	$s3=$_POST['boolean'];
	$s4=$_POST['fare'];
//echo $count;
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
!empty($_POST['coachid']) &&
!empty($_POST['boolean']) &&
!empty($_POST['fare']) )
{
	$sql= "select * from coach ";          
			$result3=mysql_query($sql);
			while ( $db_field = mysql_fetch_assoc($result3) ) {

			if($db_field['trainid']==$s1&&$db_field['coachid']==$s2)
			{
			$newvar=1;
			}
			}
			if($newvar==1)
			{
				$var="coach id is already taken";
					echo "<script type='text/javascript'>alert('{$var}');</script>";			
			}
			$sql1="select DISTINCT fare_per_seat from coach where trainid=$s1 and coachtype='$s3'";
			$result1 =mysql_query($sql1);
			$row1=mysql_fetch_assoc($result1);
			$v2=$row1['fare_per_seat'];
		if($v2==$s4||$v2==NULL){
			
			if($newvar==0)
			{
				echo $_SESSION['c']--;
	$q1= "INSERT INTO coach (coachid,coachtype,fare_per_seat,trainid) 
                VALUES ($s2,'$s3',$s4,$s1)";
	$q2= "INSERT INTO coachinfo (coachsize,coachid,trainid) 
                VALUES (30,$s2,$s1)";
		
$result=mysql_query($q1);
$result2=mysql_query($q2);
mysql_close($db_handle);

		}}
		else{$var="ERROR..!! Different fare for same class";
					echo "<script type='text/javascript'>alert('{$var}');</script>";			
			}
}
}

	
}


}else{$r='admin.php';
    header('Location: '.$r);}
?>

<h1>ADD TRAIN DETAILS</h1>
<br><br>

<form  action="after_add_train.php" method="post">
		       <div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> Coach ID  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="coachid"> </div> 
</div>
			<br><br>
			
	   
	 <div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> Coach Type  </div>
 </div> 
	   
	   <select   name="boolean" style="margin-left: 17px">
	 <option type="text" value="economy" selected="yes">Economy</option>
      <option type="text" value="bussiness">Bussiness</option>
	  <option type="text" value="sleeper">Sleeper</option>
    </select>
		
	  
	  
	  <br><br>
	 <div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> Fare  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="fare"> </div> 
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
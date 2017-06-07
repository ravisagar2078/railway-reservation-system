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
                    <title> User</title >
										<li><a href="com_user.php">HOME</a></li>

					<li><a href="user_book_ticket.php">BOOK TICKET</a></li>

<li><a href="user_cancel_ticket.php">CANCEL TICKET</a></li>

<li><a href="user_train_details.php">TRAIN DETAILS</a></li>

<li><a href="user_booking_details.php">BOOKING DETAILS</a></li>

<li><a href="index.php">LOGOUT</a></li>

                   </ul>
            </div>

        </div>
    </header><!--/header-->
<?php


session_start();
if(isset($_POST['trainid']) && isset($_POST['date']) && !empty($_POST['boolean'])  )
{
	
$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);

$uid = $_SESSION['S_ID'];
$tid=$_POST['trainid'];
$date=$_POST['date'];
$type=$_POST['boolean'];
$newvar=0;
$today = date("Y-m-d");
if($db_found)
{
	if(!empty($_POST['trainid']) &&
!empty($_POST['trainid']) &&
!empty($_POST['boolean']) &&
!empty($_POST['date']) )
 {
//echo $today ;
//echo $date;
$sql= "select * from coach ";          
			$result=mysql_query($sql);
			while ( $db_field = mysql_fetch_assoc($result) ) {

			if($db_field['trainid']==$tid&&$db_field['coachtype']==$type)
			{
			$newvar=1;
			}
			
			}
			//echo $date;
			if($newvar==0){$var="train id or coach class not exist";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
					}
				
				if($date<=$today    ){$var=" date not valid";
				echo "<script type='text/javascript'>alert('{$var}');</script>";
				
					}	
if($newvar==1&&$date>$today )
	{
$_SESSION['T_ID'] = $tid;
 $_SESSION['S_ID']=$uid;
$_SESSION['dat']=$date;
$_SESSION['bool']=$type;

		$r2='user_book_ticket_2.php';
    header('Location: '.$r2);
	}
			
 }

}

}
 ?>
	<br>
<br>
		
<form  action="user_book_ticket.php" method="post">
    
       <div class="col-md-1" style="width: 8%"> 
 <div style="width="12px;"> Train ID  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="trainid"> </div> 
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
 <div style="width="12px;"> Date  </div>
 </div>
 <div class="col-md-2">
  <input type="date" name="date"> </div> 
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
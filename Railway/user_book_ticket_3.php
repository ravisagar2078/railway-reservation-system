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
															<li><a  href="com_user.php">HOME</a></li>

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
$uid = $_SESSION['S_ID'];
$tid=$_SESSION['T_ID'];
$date=$_SESSION['dat'];
$type=$_SESSION['bool'];
$pay1=$_SESSION['PAY'];

$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);


$newvar=0;
if($db_found)
{
$q1="SELECT coachid from coach where trainid=$tid and coachtype='$type' ";
  $result =mysql_query($q1);
    echo "<br/>";	

$t=true;
if(mysql_num_rows($result) > 0 )
	{
		while($row = mysql_fetch_assoc($result))
		{
			$v1=$row['coachid'];
			$q2="select max(seatno) as 'maxi'  from reservation where trainid=$tid and coachid=$v1 and date='$date'";
			$result1 =mysql_query($q2);
			
			$row1=mysql_fetch_assoc($result1);
			
	//		echo $row1['maxi'];
			$v2=$row1['maxi'];
				if($v2<30)
			{
				$v2=$v2+1;
				break;
			}
		}
		
	}
	
//	echo $date;
//echo $v2;
//echo $v1;
$q3= "INSERT INTO reservation (status,payment,date,seatno,ticket_id,username,trainid,coachid) 
                VALUES ('pending',$pay1,'$date','$v2','','$uid','$tid','$v1')";
$result=mysql_query($q3);
//echo "wewe";
//echo $pay1;
mysql_close($db_handle);
	$var="Ticket Registered Successfully...";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
$r='com_user.php';
    header('Location: '.$r);	


}
 ?>
	<br>
<br>
		
<<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
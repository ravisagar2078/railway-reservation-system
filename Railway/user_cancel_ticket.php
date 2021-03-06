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

	<br>
<br>

<h1></h1>
<br>
    
	<form  method="post">

<div class="col-md-1" style="width: 12%"> 
 <div style="width="12px;"> <b>Enter Ticket Number: </b>  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="s2"> </div> 
</div> 
<br><br>
 <div class="col-md-4" style="width: 12%">
</div> 
 <div class="col-md-2">
<button type="submit" class="btn btn-primary active"   > Submit</button> </div> 
</form>
 
 <?php
 session_start();
 
$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);
$today = date("Y-m-d");

if($db_found)
{
	$i=$_SESSION['S_ID'];

if(isset($_POST['s2']))
{
	$s2=$_POST['s2'];
	if(!empty($s2))
	{
    $query1 = "Select * FROM reservation where ticket_id=$s2 and username='$i' " ;
    $result =mysql_query($query1);

			
			$row1=mysql_fetch_assoc($result);
			if($row1['date']==$today  &&$row1['status']=='confirm'  )
			{
				$var=" ticket cannot be cancelled";
				echo "<script type='text/javascript'>alert('{$var}');</script>";
				$r2='com_user.php';
				header('Location: '.$r2);
			}	
			
			
	if(mysql_num_rows($result) ==1 )
	{
    $query2 = "DELETE FROM reservation where ticket_id=$s2  ";
    $result2 =mysql_query($query2);
    echo "<br/>";					
	if($result2==true)
	{
	$r2='after_remove_ticketid.php';
    header('Location: '.$r2);
	}
	else
	{
		    echo "<br/>";			
		   echo "<strong>Cannot Delete Because Of Foreign Key Constraints</strong>";		
		    echo "<br/>";			
	}
	}
	else
	{
	$var="Please Enter the Valid Ticket ID";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
	}
	}
}
}
?>


 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
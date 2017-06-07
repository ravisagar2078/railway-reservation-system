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
if(isset($_POST['cardnumber'])){
$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);

/*$uid = $_SESSION['S_ID'];
$tid=$_SESSION['T_ID'];
$date=$_SESSION['dat'];
$type=$_SESSION['bool'];
*/
$pay=$_POST['cardnumber'];
$newvar=0;
//$today = date("Y-m-d");
if($db_found)
{
	if(!empty($_POST['cardnumber']))
	$num_length = strlen($pay);
if($num_length == 13) {
  mysql_close($db_handle);
$_SESSION['PAY'] = $pay;
$r='user_book_ticket_3.php';
    header('Location: '.$r);	

					
					} 
					else {
	$var="number not valid";
					echo "<script type='text/javascript'>alert('{$var}');</script>";
    // Fail
}
}}
 ?>
	<br>
<br>
		
<form  action="user_book_ticket_2.php" method="post">
    
       <div class="col-md-1" style="width: 10%"> 
 <div style="width="12px;"> Enter C-NIC Number  </div>
 </div>
 <div class="col-md-2">
  <input type="int" name="cardnumber"> </div> 
</div>
			<br><br>
			
 <div class="col-md-4" style="width: 10%">
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
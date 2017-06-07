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
	<style>
table, th, td {
     border: 1px solid black;
}
</style>
	<?php
	
$root="root";
$root_password="";
$server="127.0.0.1";
$database="railway";
$db_handle=mysql_connect($server,$root,$root_password);
$db_found=mysql_select_db($database,$db_handle);

if($db_found)
{	
$query1 = "select distinct a.trainname,a.trainid,a.source,a.destination,a.arrivaltime,a.departuretime,b.coachtype,b.fare_per_seat FROM train a,coach b
 where a.trainid=b.trainid and b.coachtype='economy' UNION 
 Select distinct a.trainname,a.trainid,a.source,a.destination,a.arrivaltime,a.departuretime,b.coachtype,b.fare_per_seat FROM train a,coach b 
 where a.trainid=b.trainid and b.coachtype='bussiness' UNION
select distinct a.trainname,a.trainid,a.source,a.destination,a.arrivaltime,a.departuretime,b.coachtype,b.fare_per_seat FROM train a,coach b 
where a.trainid=b.trainid and b.coachtype='sleeper' order by trainid";
    $result =mysql_query($query1);
    echo "<br/>";	

$t=true;
if(mysql_num_rows($result) > 0 )
	{echo "<center><p><b> Train Details</b></p></center>";

		echo "<center><table >
  <tr>
    <td ><b>Train_ID</b> </td>
    <td ><b>Train Name</b></td>
    <td ><b>Coach Type</b></td>
    <td ><b>Source</b></td>
  <td ><b>Destination</b></td>
    <td ><b>Arrival_Time</b></td>
	  <td ><b>Departure_Time</b></td>
    <td ><b>Fare</b></td>
  
 </tr>";

		while($row = mysql_fetch_assoc($result))
		{
echo "<tr>";					
echo "<td>".$row['trainid']."</td>";			
echo "<td>".$row['trainname']."</td>";
echo "<td>".$row['coachtype']."</td>";			
echo "<td>".$row['source']."</td>";
echo "<td>".$row['destination']."</td>";
echo "<td>".$row['arrivaltime']."</td>";
echo "<td>".$row['departuretime']."</td>";
echo "<td>".$row['fare_per_seat']."</td>";			

	}
	echo "</table></center>";
	}
			else
		{
			if($t==true)
			{
				echo "<br/>";			
				echo "There are no entries";
				echo "<br/>";			
			}
		}

}


?>
	<br>
<br>


 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
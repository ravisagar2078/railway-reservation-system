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
$query1 = "select username,name,email FROM users where type=0 ";
    $result =mysql_query($query1);
    echo "<br/>";	

$t=true;
if(mysql_num_rows($result) > 0 )
	{
//		echo 'ecece';
		//output every row
//		echo "<table><tr><th>Username</th><th>Name</th><th>Email</th><th>Password</th></tr>";
echo "<center><table >
  <tr>
    <td ><b>Username</b> </td>
    <td ><b>Name</b></td>
    <td ><b>Email</b></td>
    
  </tr>";	

	while($row = mysql_fetch_assoc($result))
		{
		//	echo "<tr><td>" .$row['username']. "</td><td>" .$row['name']. "</td></tr>" .$row['email']. "</td></tr>" .$row['password']. "</td></tr>";
/*echo "<br/>";			
echo "<br/>";		
echo "<b>Username :</b>".$row['username'];
echo "<br/>";			
echo "<b>Name :</b>".$row['name'];
echo "<br/>";			
echo "<b>Email :</b>".$row['email'];
echo "<br/>";			
echo "<b>Password : </b>".$row['password'];
echo "<br/>";					}
*/
echo "<tr>";
  echo "<td>".$row['username']."</td>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "</tr>";
//  echo "</table>";



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

 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
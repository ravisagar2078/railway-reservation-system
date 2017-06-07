	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$db = new mysqli('localhost','root','','railway');

if (mysqli_connect_error()) 
{
$Message = 'MySQL Error: ' . mysqli_connect_error();
die('Cannot connect to the database');
}
?>

</body>
</html>
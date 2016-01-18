<?php
session_start();

if (!isset($_SESSION['log']))
{
	header('Location:index.php');
	exit();
}
?>

<!DOCTYPE = HTML>
<html lang= "pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Papieskie chwile</title>
</head>

<body>
<?php

echo"<p> Szczęść Boże ". $_SESSION['user'] .'![<a href="logout.php">Wyloguj się</a>]</p>'; 
echo"<p> <b>Smocze monety</b>:" .$_SESSION['drewno'];
echo" |<b>Piwsko</b>:" .$_SESSION['kamien'];
echo" |<b>Rubaszniki</b>:" .$_SESSION['zboze']."</p>";

echo"<p> <b>E-mail</b>:" .$_SESSION['email'];
echo"<br/><b>Dni Papieskie</b>:" .$_SESSION['dnipremium']."</p>";
?>


</body>
</html>
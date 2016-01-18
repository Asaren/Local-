<?php
session_start();

if ((isset($_SESSION['log'])) && ($_SESSION['log']==true))
{
	header('Location:gra.php');
	exit();
}
?>
	
<!DOCTYPE = HTML>
<html lang= "pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>System logowania</title>
</head>

<body>

	O kurdełe, stworzyłem potwora! <br/><br/>
	
	<form action ="zaloguj.php" method ="post">
	
		Login: <br/> <input type= "text" name="login"/> <br/>
		Hasło: <br/> <input type= "password" name="haslo"/> <br/><br/>
		<input type="submit" value="Zaloguj sie">
		</form>
		
		<?php
		
		if(isset($_SESSION['blad'])) echo$_SESSION['blad'];
		unset($_SESSION['blad']);
		
		?>



</body>
</html>
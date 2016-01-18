<?php
	
	session_start();
	
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo"Error".$polaczenie->connect_errno;
	}
	
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$login= htmlentities($login, ENT_QUOTES,"UTF-8");
		$haslo= htmlentities($haslo, ENT_QUOTES,"UTF-8");
		
		
		if ($result = @$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$user_number = $result->num_rows;
			if($user_number==1)
			{
				$_SESSION['log'] = true;
				$wiersz=$result->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['user'];
				$_SESSION['drewno'] = $wiersz['drewno'];
				$_SESSION['kamien'] = $wiersz['kamien'];
				$_SESSION['zboze'] = $wiersz['zboze'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['dnipremium'] = $wiersz['dnipremium'];
				
				unset($_SESSION['blad']);
				$result->close();
				header('Location:gra.php');
				
			} else {
				$_SESSION['blad'] = '<span style = "color:red"> Nieprawidłowy login lub hasło </span>';
				header('Location:index.php');
		
			}
		}
		
		$polaczenie->close();
	}
		
?>
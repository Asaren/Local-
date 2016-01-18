<?php

	$paczkow = $_POST['paczki'];
	$grzebieni = $_POST['grzebienie'];
	$suma= 0.99 * $paczkow + 1.29 * $grzebieni;
echo<<<END

	<h2>Podsumowanie zamówienia</h2>
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>Paczek(0,99PLN/szt)</td> <td>$paczkow</td>
	</tr>
	<tr>
		<td>Grzebien(1,20PLN/szt)</td> <td>$grzebieni</td>
	</tr>
	<tr>
		<td>SUMA</td> <td>$suma PLN</td>
	</tr>
	</table>
	<br><a href= "index.php"> Powrót do strony głównej</a>
END;
	
?>
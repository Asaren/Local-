<?php
require("config.inc.php");
//Definiujemy tablicę IP z których połączenie jest dozwolone
//Patrz - serwerów dotpay
$allow_server = array('217.17.41.5', '195.150.9.37');
 
//Sprawdzamy czy w/w tablica zawiera numer IP klienta który właśnie się z nami łączy
if (!in_array($_SERVER['REMOTE_ADDR'], $allow_server)) {
        exit('You are not authorized to do this operation!'); //Jeśli nie, to kończymy skrypt
}
 
//Jeśli wszystko jest OK, to zaczynamy księgowanie
if ($_POST['t_status'] == 2 && $_POST['amount'] != '' && $_POST['control'] != '') {
        $control = cln($_POST['control']);
        $amount = cln($_POST['amount']);
        if (is_numeric($control) && is_numeric($amount)) {
                /* tabela mysql [transid w primary z autoinkrementem], [uid], [kwota], [czas] */
                mysql_query('INSERT INTO `transakcje` VALUES ("", "'.$control.'", "'.$amount.'", "'.time().'")');
                echo('OK');
        }
}
mysql_close($dbh);
?>
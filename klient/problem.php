<?php
session_start();
header('Location: logged.php');
$wybranyB = $_POST['wyborBledu'];
$opisanyB = $_POST['opisBledu'];
$user= $_SESSION['uzytkownik'];
$dateee = date("F j, Y, g:i a"); 

$link = mysqli_connect('zdunowski.com.pl', '29409810_testcrm' ,'1995ZQ12WR#', '29409810_testcrm'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków

$result = mysqli_query($link, "INSERT INTO problem (nrProblemu, opisProblemu, zglaszajacy, czas) VALUES ('$wybranyB', '$opisanyB', '$user' ,'$dateee') "); // pobranie z BD wiersza
//$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
//echo $wybranyB;
//echo $opisanyB;
?>

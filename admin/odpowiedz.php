<?php
session_start();
header('Location: tabela.php');
$link = mysqli_connect('zdunowski.com.pl', '29409810_testcrm' ,'1995ZQ12WR#', '29409810_testcrm'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków


$idPytania = (int) $_POST['numerpytania'];
$odpowiedzAdmina = $_POST['odpowiedz'];

 //$odp = mysqli_query($link , "SELECT * FROM problem WHERE id = '$idPytania'") or die(mysqli_error($link));

//$idPytaniaZbazy = mysqli_query ($link , "SELECT * FROM problem WHERE id='$idPytania' ") or die("blad zapytania");
if (!empty($_POST['numerpytania']) =="true" && !empty($_POST['odpowiedz']) =="true") {


//$odpowiedzDoBazy = mysqli_query ($link , "INSERT INTO `problem` (resolved) VALUES ('$odpowiedzAdmina')  ") or die(mysqli_error($link));
$user = $_SESSION['user'];
$updateKoment =  mysqli_query ($link , "UPDATE problem SET resolved='$odpowiedzAdmina', odpBy='$user'  WHERE id='$idPytania'") or die(mysqli_error($link));


}
else{
  echo "Brak danych";
}

?>


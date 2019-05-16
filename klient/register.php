<?php
session_start();
//header("Location: logowanie.php");
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$mail = $_POST['mail'];
$login = $_POST['login'];
$pass = $_POST['pass1'];

$dbhost="zdunowski.com.pl"; 
$dbuser="29409810_testcrm#"; 
$dbname="29409810_testcrm";
$dbpassword="1995ZQ12WR#";  

$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db($polaczenie, $dbname);

  
//$sql = "SELECT * FROM klient // WHERE login='$login'" ;
$sql = "SELECT login FROM klient";

$rezultat = mysqli_query($polaczenie, $sql) or die(mysqli_error($polaczenie));

$ip = $_SERVER['REMOTE_ADDR'];
$date2 = date("F j, Y, g:i a",time());

$rekord = mysqli_fetch_array($rezultat);

if($rekord['login'] == '$login'){
	$_SESSION['zle'] = '<span style="color:red">Ops, something went wrong! Try to register again.</span>';
		header('Location: logowanie.php');

}else{
		$doBazy =  mysqli_query($polaczenie, "INSERT INTO klient (imie,nazwisko,login,haslo,mail,data ,adres) VALUES('$imie','$nazwisko','$login','$pass', '$mail', '$date2', '$ip')") or die(mysqli_error($polaczenie));



		$_SESSION['utworzone'] = "Konto zostało utworzone!";
		$_SESSION['utworzone2'] = "Teraz możesz się zalogować!";
		unset($_SESSION['blad']);
		unset($_SESSION['zle']);
		unset($_SESSION['userIstnieje']);
	 	header('Location: logowanie.php');	
}
?>																																																																																																																																																					
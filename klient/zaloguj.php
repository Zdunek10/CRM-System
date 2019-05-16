<?php
session_start();

 	$user=$_POST['user']; // login z formularza
	$pass=$_POST['pass']; // hasło z formularza
	$_SESSION['uzytkownik'] = $user;
	$link = mysqli_connect('zdunowski.com.pl', '29409810_testcrm' ,'1995ZQ12WR#', '29409810_testcrm'); // połączenie z BD – wpisać swoje parametry !!!
	if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
	mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
	$ip = $_SERVER['REMOTE_ADDR'];
	$result = mysqli_query($link, "SELECT * FROM klient WHERE login='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
	$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
	if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
	{
			mysqli_close($link); // zamknięcie połączenia z BD
			echo "Brak użytkownika o takim loginie !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
		}
		else    { // Jeśli $rekord istnieje
				if($rekord['haslo']==$pass) // czy hasło zgadza się z BD
				{
				//echo "Logowanie Ok. User: {$rekord['user']}. Hasło: {$rekord['pass']}";
				$updateIP = mysqli_query($link, "UPDATE klient SET adres ='$ip' WHERE login='$user' "); 
				//$dateee = date("F j, Y, g:i a"); 
				  $dateee = date("Y-m-d, g:i a");

				$updateTime = mysqli_query($link, "INSERT INTO klient VALUES $dateee WHERE login = '$login' ");
				$updateTime2 = mysqli_query($link, "UPDATE  klient SET data='$dateee' WHERE login = '$login' ");


				header('Location: logged.php');
				//$_SESSION['user1'] = '$user';
				$_SESSION['logged'] = true;

				}
			else
				{
				$_SESSION['blad'] = '<span style="color:red">The username or password you entered is incorrect, please try again.</span>';
				unset($_SESSION['utworzenie']);
		   		unset($_SESSION['utworzenie2']);	
				header('Location: logowanie.php');
				}
		}
?>
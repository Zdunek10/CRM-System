<?php
session_start();
 	$user=$_POST['user']; // login z formularza
	$pass=$_POST['pass']; // hasło z formularza

	$_SESSION['user'] = $user;
	$link = mysqli_connect('zdunowski.com.pl', '29409810_testcrm' ,'1995ZQ12WR#', '29409810_testcrm'); // połączenie z BD – wpisać swoje parametry !!!
	if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
	mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków

	$result = mysqli_query($link, "SELECT * FROM pracownicy WHERE login='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
	$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
	if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
	{
			mysqli_close($link); // zamknięcie połączenia z BD
			//echo "Brak użytkownika o takim loginie !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
			$_SESSION['zlyLogin'] = "Coś poszło nie tak! Spróbuj ponownie!";
			header('Location: logowanieAdmin.php');

		}
		else
		{ 	//Jeśli $rekord istnieje
			if($rekord['haslo']==$pass) // czy hasło zgadza się z BD
		{
			//echo "Logowanie Ok. User: {$rekord['user']}. Hasło: {$rekord['pass']}";
			$_SESSION['logged'] = true;
			header('Location: loggedAdmin.php');
		}
		else
		{
			mysqli_close($link);
			//echo "Błąd w haśle !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
			$_SESSION['zlyLogin2'] = "Coś poszło nie tak! Spróbuj ponownie!";
			header('Location: logowanieAdmin.php');


		}
	}
?>
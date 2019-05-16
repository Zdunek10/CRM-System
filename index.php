<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
    <meta http-equiv="refresh" content="1000" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Zdunowski</title>

    
</head>

<body>

<ul>
 <li><a href="http://www.zdunowski.com.pl">Home</a></li>
  <li><a href="http://www.zdunowski.com.pl/crm/klient/logowanie.php">Log In / Register</a></li>
  <li><a href="http://www.zdunowski.com.pl/crm/admin/logowanieAdmin.php">Panel Administratora</a></li>

</ul>
<br>
    <h1> GUI tools dla BD i zarządzanie relacjami z klientami (CRM) </h1>

<p3> Ilość zadanych pytań przez użytkowników: 
<?
$link = mysqli_connect('zdunowski.com.pl', '29409810_testcrm' ,'1995ZQ12WR#', '29409810_testcrm'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków

$result=mysqli_query($link, "SELECT count(*) as total from problem");
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?>
</p3>

   

<br>
<? //include ("zapis.txt");
//25509958_lab1
?>
<br>

<?php


?>


</body>
</html>
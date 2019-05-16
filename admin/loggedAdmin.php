<?php
session_start();
unset($_SESSION["zlyLogin"]);
unset($_SESSION["zlyLogin2"]);

$link = mysqli_connect('zdunowski.com.pl', '29409810_testcrm' ,'1995ZQ12WR#', '29409810_testcrm'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
?>


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
  <li><a href="http://www.zdunowski.com.pl/crm/admin/logowanieAdmin.php">Panel Administratora</a></li>
  <li style="float:right"><a href="http://www.zdunowski.com.pl/crm/admin/logout.php">Log out</a></li>
</ul>


<h1>
<?php 
if(isset($_SESSION['user'])){
  echo "<p>Zalogowano jako: "." ".$_SESSION['user']."!";
  }
?>
</h1>
<br>

<p3> Ilość zadanych pytań przez użytkowniów:
<?
$result=mysqli_query($link, "SELECT count(*) as total from problem");
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?> 
</p3>
<br>


<p> Wybierz rodzaj pytania by na nie odpowiedzieć. </p>
<br>
<form method="POST" action="tabela.php">
<select id="mySelect" name="wyborBledu">
  <option value="p1" size="40" name="p1" >Problem 1</option>
  <option value="p2" size="40" name="p2">Problem 2</option>
  <option value="p3" size="40" >Problem 3</option>
  <option value="p4" size="40" >Problem 4</option><br>
</select>
<br>
    <input type="submit" value="Wyświetl."/><br>
</form>
  
<br>

<?php 
$user= $_SESSION['user'];

print "<TABLE CELLPADDING=5 BORDER=1>";
            print "<TR><TD>ID</TD>
           			   <TD>Rodzaj problemu</TD>
                       <TD>Opis problemu</TD>
                       <TD>Klient</TD>
                       <TD>Czasz zgłoszenia</TD>
                       <TD>Odpowiedz</TD>
                       <TD>Pomocy udzielił:</TD>
                   </TR>\n";

$sql = mysqli_query ($link , "SELECT * FROM problem  ORDER BY czas DESC ") or die("blad zapytania");

$odpowiedzOD = $_SESSION['$user'];
//if(mysqli_num_rows($sql)>0){
  while ($wiersz = mysqli_fetch_array ($sql))
       {      
        $id = $wiersz['id'];
        $nP = $wiersz['nrProblemu'];
        $oP = $wiersz['opisProblemu']; 
        $osoba = $wiersz['zglaszajacy'];
        $czas = $wiersz['czas'];
        $odp = $wiersz['resolved'];
        $odpBy = $wiersz['odpBy'];
        print "<TR><TD>$id</TD><TD>$nP</TD><TD>$oP</TD><TD>$osoba</TD><TD>$czas</TD><TD>$odp</TD><TD>$odpBy</TD></TR>\n";
       }
    print "</TABLE>";

?> 


</table>


</body>
</html>
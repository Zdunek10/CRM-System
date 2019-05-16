<?php
session_start();
/*if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
}else{
  header('Location: logged.php');
  exit();
}*/
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
   <li><a href="http://zdunowski.com.pl">Home</a></li>
  <li><a href="http://www.zdunowski.com.pl/crm/klient/logowanie.php">Log In / Register</a></li>
  <li><a href="#">Panel Administratora</a></li>
  <li style="float:right"><a href="http://www.zdunowski.com.pl/crm/klient/logout.php">Log out</a></li>
</ul>



<?php 
if(isset($_SESSION['uzytkownik'])){
  echo "<p>Welcome: "." ".$_SESSION['uzytkownik']."!";
}
?> 
<br>

<form method="POST" action="problem.php">
<br>
<p1> Wybierz jeden z kategorii problemów. </p1><br><br>

<select name="wyborBledu">
  <option value="p1" size="40" >Problem 1</option>
  <option value="p2" size="40" >Problem 2</option>
  <option value="p3" size="40" >Problem 3</option>
  <option value="p4" size="40" >Problem 4</option>
</select>
<br><br><br>

  <p1> Opisz dokładnie swój problem </p1><br>
  <input name="opisBledu" type="text" id='wpisanyProblem' size="100" required>
  <br><br>


    <input type="submit" value="Zgłoś problem."/><br>
</form>


<?php
$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_crm' ,'zaq12wsx', '25509958_crm'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$user= $_SESSION['uzytkownik'];

print "<TABLE CELLPADDING=5 BORDER=1>";
            print "<TR><TD>Rodzaj problemu</TD>
                       <TD>Opis problemu</TD>
                       <TD>Czasz zgłoszenia</TD>
                       <TD>Pomocy udzielił</TD>
                       <TD>Odpowiedz</TD>
                   </TR>\n";

$sql = mysqli_query ($link , "SELECT * FROM problem WHERE zglaszajacy='$user' ") or die("blad zapytania");


//if(mysqli_num_rows($sql)>0){
  while ($wiersz = mysqli_fetch_array ($sql))
       {      
            $nP = $wiersz['nrProblemu'];
            $oP = $wiersz['opisProblemu']; 
           // $region1 = $wiersz['zglaszajacy'];
            $czas = $wiersz['czas'];
             $odpBy = $wiersz['odpBy'];
            $asd = $wiersz['resolved'];

        print "<TR><TD>$nP</TD><TD>$oP</TD><TD>$czas</TD><TD>$odpBy</TD><TD>$asd</TD></TR>\n";
       }
    print "</TABLE>";
//  }

//header('Location: logged.php');
//exit;

?>



</table>
</body>
</html>
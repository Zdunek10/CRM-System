<?php
session_start();
if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
header('Location: loggedAdmin.php');
exit();
}
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
  <li><a href="http://www.zdunowski.com.pl/crm/klient/logowanie.php">Log In / Register</a></li>
  <li><a href="http://www.zdunowski.com.pl/crm/admin/logowanieAdmin.php">Panel Administratora</a></li>

</ul>
<h1> Logowanie</h1>
<form method="POST" action="zalogujAdmin.php">
  Login: <br/> <input type="text" name="user" required> <br/>
  Hasło: <br/> <input type="Password" name="pass" required> <br/>
  <input type="submit" value="Login"/> <br><br>
</form>

<?php
  if(isset($_SESSION['zlyLogin'])) {
    echo $_SESSION['zlyLogin'];
  }
  if(isset($_SESSION['zlyLogin2'])){
    echo $_SESSION['zlyLogin2'];
  }
?>
<br>
</body>
</html>
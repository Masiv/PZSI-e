<!DOCTYPE html>
<html lang="pl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Koncerty - ewidencja: Logowanie</title>

    <!-- Bootstrap core CSS -->
    <link href="css/logowanie//bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/logowanie/signin.css" rel="stylesheet">


  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="Signin.php" method="post">
        <h2 class="form-signin-heading">Logowanie</h2>
        <input class="form-control" placeholder="Użytkownik" required="" autofocus="" type="text" name="log">
        <input class="form-control" placeholder="Hasło" required="" type="password" name="pass">
       <!--  <label class="checkbox">
          <input value="remember-me" type="checkbox" name="pamietaj"> Pamiętaj mnie
        </label> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name='wyslij'>Zaloguj się</button>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name='wyloguj'>Wyloguj się</button>
      </form>

<center><p class="text-muted">
<?php
session_start();

if(isset($_POST['wyloguj'])) {
$_SESSION['zalogowany'] = false;
session_destroy();
echo "Zostałeś wylogowany. Nie wiem why powie Ci że: ";
}


mysql_connect("localhost","root","");
mysql_select_db("u409462969_bilet");

if(isset($_SESSION['zalogowany'])) {
echo "Witaj, ".$_SESSION['login'].", sesja istnieje, jesteś zalogowany "; 
}else{

if(isset($_POST['wyslij'])) {

   if(mysql_num_rows(mysql_query("SELECT login, haslo
   FROM pracownik WHERE login = '".$_POST['log']."' && haslo = '".$_POST['pass']."' ")) > 0) //spawdza czy jest taki login 
       {

       if(mysql_num_rows(mysql_query("SELECT idPracownik FROM pracownik  
       WHERE login = '".$_POST['log']."' 
       && haslo = '".$_POST['pass']."' ")) > 0 ) {   //sprawdza czy jest taka kombinacja loginu i hasła, kwestią bazy jest unikalnosc uzytkownikow


           $_SESSION['zalogowany'] = true;
          $_SESSION['login'] = $_POST['log'];  //dlaczego sesja ma przechowywać login i haslo? Chyba tylko po to, żeby przywitac
//           $_SESSION['haslo'] = $_POST['pass'];

           echo "Jesteś zalogowany.";

       } else { 
        echo "Złe hasło, proszę spróbować ponownie";
        }

    } else { 
   echo "Nie ma takiego użytkownika";
    }
mysql_close();
}
}


?>

</p>
</center>
<!-- /container -->

</body></html>
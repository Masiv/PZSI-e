<!DOCTYPE html>
<html lang="pl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Koncerty - ewidencja</title>

    <!-- Bootstrap core CSS -->
    <link href="Signin%20Template%20for%20Bootstrap_pliki/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Signin%20Template%20for%20Bootstrap_pliki/signin.css" rel="stylesheet">

        <link href="Sticky%20Footer%20Navbar%20Template%20for%20Bootstrap_pliki/sticky-footer-navbar.css" rel="stylesheet">

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
mysql_connect("","","");
mysql_select_db("");

if(isset($_SESSION['zalogowany'])) {
echo "Witam, ".$_SESSION['login']; 
}else{

if(isset($_POST['wyslij'])) {

   if(mysql_num_rows(mysql_query("SELECT login
   FROM pracownik WHERE login = '".$_POST['log']."' ")) > 0) //spawdza czy jest taki login 
       {

       if(mysql_num_rows(mysql_query("SELECT nr FROM konta  
       WHERE login = '".$_POST['log']."' 
       && haslo = '".$_POST['pass']."' ")) > 0 ) {   //sprawdza czy jest taka kombinacja loginu i hasła, kwestią bazy jest unikalnosc uzytkownikow


           $_SESSION['zalogowany'] = true;
 /*          $_SESSION['login'] = $_POST['log'];  //dlaczego sesja ma przechowywać login i haslo?
           $_SESSION['haslo'] = $_POST['pass'];
  */
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

if(isset($_POST['wyloguj'])) {
session_destroy();
echo "Zostałeś wylogowany";
}
?>

</p>
</center>
<!-- /container -->

</body></html>
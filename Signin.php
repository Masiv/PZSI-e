<?php session_start();
include_once('config.php');
ini_set('display_errors',1); 
 error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pl"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Koncerty - ewidencja: Logowanie</title>

    <!-- Bootstrap core CSS -->
    <link href="css/logowanie/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/logowanie/signin.css" rel="stylesheet">


  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="signin.php" method="post">
        <h2 class="form-signin-heading">Logowanie</h2>
        <input class="form-control" placeholder="Użytkownik"  autofocus="" type="text" name="log" required>
        <input class="form-control" placeholder="Hasło"  type="password" name="pass" required> 
       <!--  <label class="checkbox">
          <input value="remember-me" type="checkbox" name="pamietaj"> Pamiętaj mnie
        </label> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name='wyslij'>Zaloguj się</button>
      </form>

<center><p class="text-muted">
<?php


function pre($pre){
echo '<pre>';
print_r($pre);
echo '</pre>';
}


if(isset($_SESSION['zalogowany'])) {
header("Location: /index.php");
}else{

if(isset($_POST['wyslij'])) {

   $_login = $_POST['log'];
//  $_login = htmlspecialchars($_POST['log'], ENT_QUOTES);
//   $_haslo = sha1($_POST[pas]);   
   $_haslo = $_POST['pass'];  
   $_md5_pass = md5($_haslo);   
   
//weryfikowanie poprawności wpisywanych znakow do pola 
   
   
  if(!preg_match( '/^[A-Za-zĄąĆćĘęŁłŃńÓóŚśŹźŻż0-9]+$/ui', $_login )) {
  echo 'Bledna nazwa uzytkonika!';

//porównywanie wpisanych danych z danymi w bazie    

   } elseif(mysql_num_rows(mysql_query("SELECT login FROM Pracownik WHERE login = '$_login'")) > 0) //spawdza czy jest taki login 
       {
     
       if(mysql_num_rows(mysql_query("SELECT idPracownik FROM Pracownik  
       WHERE login = '$_login' && haslo = '$_md5_pass'")) > 0) {   //sprawdza czy jest taka kombinacja loginu i hasła, kwestią bazy jest unikalnosc uzytkownikow

          $_SESSION['zalogowany'] = true;
          $_SESSION['login'] = $_POST['log'];  

          header("Location: /index.php");

       } else { 
        echo "Złe hasło, proszę spróbować ponownie";
        }

    } else { 
   echo "Nazwa użytkownika bledna";
    }
mysql_close();
}
}


?>

</p>
</center>
<!-- /container -->

</body></html>
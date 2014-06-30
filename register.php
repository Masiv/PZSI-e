<?php session_start();
include_once('config.php');
?>
<!DOCTYPE html>
<html lang="pl"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Koncerty - ewidencja: Rejestracja</title>

    <!-- Bootstrap core CSS -->
    <link href="css/logowanie/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/logowanie/signin.css" rel="stylesheet">


  </head>

  <body>

    <div class="container">

<?php
function pre($pre){
echo '<pre>';
print_r($pre);
echo '</pre>';
}



$_teraz = date('Y-m-d H:i:s', time() + 21600);



if(empty($_GET['msv'])) $_GET['msv'] = '';

switch($_GET['msv']){
case "": default:

?>

      <form class="form-signin" role="form" action="register.php?msv=dodaj" method="post">
        <h2 class="form-signin-heading">Dodaj pracownika</h2>
        <input class="form-control" placeholder="Użytkownik"  autofocus="" type="text" name="log" required>
        <input class="form-control" placeholder="Hasło"  type="password" name="pass" required>
        <input class="form-control" placeholder="Powtórz Hasło"  type="password" name="pass2" required>
        <input class="form-control" placeholder="Imię"  autofocus="" type="text" name="imie" required>
        <input class="form-control" placeholder="Nazwisko"  autofocus="" type="text" name="nazwisko" required>
        <input class="form-control" placeholder="Data: yyyy-mm-dd"  autofocus="" type="text" name="data" required>
        <input class="form-control" placeholder="Stanowisko"  autofocus="" type="text" name="stanowisko" required>
       
       
        Uprawnienia:<br>
        <select name="uprawnienia" class="form-control">
        <?php
        
        $pob = mysql_query("select * from Pracownik_uprawnienia order by nazwa ASC");
        while($rek = mysql_fetch_row($pob)){
          echo '<option value="'. $rek[0] .'">'. $rek[1] .'</option>';
        }
        
        
        ?>
        </select>
       
       <!--  <label class="checkbox">
          <input value="remember-me" type="checkbox" name="pamietaj"> Pamiętaj mnie
        </label> -->
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name='wyslij'>Dodaj pracownika</button>
      </form>

<center><p class="text-muted">
<?php
break;



case "dodaj":

$_login = strtolower($_POST['log']);
$_pass = $_POST['pass'];
$_pass2 = $_POST['pass2'];
$_imie = $_POST['imie'];
$_nazwisko = $_POST['nazwisko'];
$_data = $_POST['data'];
$_id_uprawnienia = $_POST['uprawnienia'];
$_stanowisko = $_POST['stanowisko'];

$_md5_pass = md5($_pass);

echo '<center><p class="text-muted">';


if(!preg_match( '/^[A-Za-zĄąĆćĘęŁłŃńÓóŚśŹźŻż0-9]+$/ui', $_login )) {
  echo 'Login zawiera niedozwolone znaki!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(!preg_match( '/^[A-Za-zĄąĆćĘęŁłŃńÓóŚśŹźŻż0-9]+$/ui', $_pass )) {
  echo 'Haslo zawiera niedozwolone znaki!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(!preg_match( '/^[A-Za-zĄąĆćĘęŁłŃńÓóŚśŹźŻż0-9]+$/ui', $_pass2 )) {
  echo 'Haslo 2 zawiera niedozwolone znaki!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(!preg_match( '/^[A-Za-zĄąĆćĘęŁłŃńÓóŚśŹźŻż]+$/ui', $_imie )) {
  echo 'Imie zawiera niedozwolone znaki!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(!preg_match( '/^[A-Za-zĄąĆćĘęŁłŃńÓóŚśŹźŻż]+$/ui', $_nazwisko )) {
  echo 'Nazwisko zawiera niedozwolone znaki!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(!preg_match( '/^[0-9\-]+$/ui', $_data )) {
  echo 'Data zawiera niedozwolone znaki!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(!preg_match( '/^[0-9]+$/ui', $_id_uprawnienia )) {
  echo 'ID Uprawnienia zawiera niedozwolone znaki!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(!preg_match( '/^[A-Za-zĄąĆćĘęŁłŃńÓóŚśŹźŻż0-9 ]+$/ui', $_stanowisko )) {
  echo 'Stanowisko zawiera niedozwolone znaki!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif($_pass != $_pass2) {
  echo 'Hasla nie sa takie same!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(strlen($_pass) < 6) {  
  echo 'Haslo musi mieć przynajmniej 6 znaków!<br><a href="javascript:history.back();">Wstecz</a>';
} elseif(mysql_num_rows(mysql_query("select login from Pracownik where login = '$_login'")) != 0){
  echo 'Użytkownik o takim loginie juz jest w bazie!<br><a href="javascript:history.back();">Wstecz</a>';
} else {  
  mysql_query("insert into Pracownik (`idPracownik`, `login`, `Imie`, `Nazwisko`, `data_zatrudnienia`, `stanowisko`, `uprawnienia_id`, `data_utworzenia`, `haslo`, `bledne_logowania`, `czy_zablokowane`) VALUES ('', '$_login', '$_imie', '$_nazwisko', '$_data', '$_stanowisko', '$_id_uprawnienia', '$_teraz', '$_md5_pass', '0', '0')");
  echo 'Użytkownik został poprawnie utworzony!<br><a href="register.php">Strona Główna</a>';
}
break;

}

?>

</p>
</center>
<!-- /container -->

</body></html>
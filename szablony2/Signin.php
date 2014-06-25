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
        <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj się</button>
      </form>

<center><p class="text-muted">
<
        if (isset($_POST['log']))
          {
            if (isset($_POST['pass']))
            {
              if (($_POST['log'] == 'michal') && ($_POST['pass'] == 'bbx3'))
              {
              print "Zalogowałeś się prawidłowo<br>
              <br>Witamy w serwisie!";
              }else print "Nie ma takiego użytkownika lub hasło jakie wprowadziłeś jest nieprawidłowe<br><br>Spróbuj ponownie.";

            }else print "Nie wpisałeś hasła.";

          }else print "";

  ?>
</p>
</center>
<!-- /container -->

</body></html>
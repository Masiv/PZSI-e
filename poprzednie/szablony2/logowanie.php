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

  </head>

  <body>

       <?php

        if (!empty($_POST['log']))
          {
            if (!empty($_POST['pass']))
            {
              if (($_POST['log'] == "michal") && ($_POST['pass'] == "bbx3"))
              {
              print "Zalogowałeś się prawidłowo<br><br>Witamy w serwisie!";
              }else print "Nie ma takiego użytkownika lub hasło jakie wprowadziłeś jest nieprawidłowe<br><br>Spróbuj ponownie.";

            }else print "Nie wpisałeś hasła!";

          }else print "Żeby wejść do serwisu musisz wpisać swój login a póżniej hasło!";

	?>

	</body></html>
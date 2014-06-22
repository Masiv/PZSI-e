<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="Generator" content="" />

  <title>Tytuł dokumentu</title>
</head>

<body>


<?php
echo "Hello world"; ?>

<form enctype="multipart/form-data" action="plik.php" 
		 method="post" >
<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
<input type="file" name="nazwa_pliku" />
<input type="submit" value="wyślij" />
</form>

</body>
</html>
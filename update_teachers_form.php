<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <title>Сайт первого в мире университета гулей</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 </head>
 <body>
<?php
    include('config.php');
   
    $link = mysqli_connect($server, $user, $password, $database)
				or die('Error: Unable to connect: ' . mysqli_connect_error());


    $id = mysqli_real_escape_string($link, $_POST['id']);
    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $fathers_name = mysqli_real_escape_string($link, $_POST['fathers_name']);
           

   $query = "UPDATE teachers SET `first_name`='$first_name', `last_name`='$last_name', `fathers_name`='$fathers_name' WHERE id='$id'";
   
   if (mysqli_query($link, $query))
   {
       echo 'Данные обновлены!';
   }
   else
   {
       echo 'Данные не были обновлены';
   }
   mysqli_free_result($SQLresult);
   mysqli_close($link);
?>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="teachers.php"> <P> Назад </P> </a>
</body>
</html>
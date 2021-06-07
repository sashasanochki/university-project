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
    $gruppa_name = mysqli_real_escape_string($link, $_POST['gruppa_name']);
    $amount = mysqli_real_escape_string($link, $_POST['amount']);
    $course = mysqli_real_escape_string($link, $_POST['course']);
    $institute_id = mysqli_real_escape_string($link, $_POST['institute_id']);
           

   $query = "UPDATE gruppa SET `gruppa_name`='$gruppa_name', `amount`='$amount', `course`='$course', `institute_id`='$institute_id' WHERE id='$id'";
   
   if (mysqli_query($link, $query))
   {
       echo '<h3>Данные обновлены!</h3>';
   }
   else
   {
       echo '<h3>Данные не были обновлены</h3>';
   }
   mysqli_free_result($SQLresult);
   mysqli_close($link);
?>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="groups.php"> <P> Назад </P> </a>
</body>
</html>
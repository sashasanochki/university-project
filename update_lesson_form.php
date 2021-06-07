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
    $teacher_id = mysqli_real_escape_string($link, $_POST['teacher_id']);
    $classroom = mysqli_real_escape_string($link, $_POST['classroom']);
    $lesson_type = mysqli_real_escape_string($link, $_POST['lesson_type']);
    $lesson_date = mysqli_real_escape_string($link, $_POST['lesson_date']);
    $lesson_time = mysqli_real_escape_string($link, $_POST['lesson_time']);
    $subject_id = mysqli_real_escape_string($link, $_POST['subject_id']);
    $gruppa_id = mysqli_real_escape_string($link, $_POST['gruppa_id']);
           

   $query = "UPDATE lesson SET `teacher_id`='$teacher_id', `classroom`='$classroom', `lesson_type`='$lesson_type',`lesson_date`='$lesson_date',`lesson_time`='$lesson_time',`subject_id`='$subject_id',`gruppa_id`='$gruppa_id' WHERE id='$id'";
   
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
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="lesson.php"> <P> Назад </P> </a>
</body>
</html>
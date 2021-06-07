<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <title>Сайт первого в мире университета гулей</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 </head>
<?php
include('config.php');
$link = mysqli_connect($server, $user, $password, $database)
        or die('Error: Unable to connect: ' . mysqli_connect_error());

// $id1 = mysqli_real_escape_string($link, $_POST['id']);
$teacher_id = mysqli_real_escape_string($link, $_POST['teacher_id']);
$classroom = mysqli_real_escape_string($link, $_POST['classroom']);
$lesson_type = mysqli_real_escape_string($link, $_POST['lesson_type']);
$lesson_date = mysqli_real_escape_string($link, $_POST['lesson_date']);
$lesson_time = mysqli_real_escape_string($link, $_POST['lesson_time']);
$subject_id = mysqli_real_escape_string($link, $_POST['subject_id']);
$gruppa_id = mysqli_real_escape_string($link, $_POST['gruppa_id']);


echo $id1;
echo $teacher_id;
echo $classroom;
echo $lesson_type;
echo $lesson_date;
echo $lesson_time;



$SQLquery = "INSERT INTO lesson (teacher_id, classroom, lesson_type, lesson_date, lesson_time, subject_id, gruppa_id) VALUES ('$teacher_id','$classroom','$lesson_type','$lesson_date','$lesson_time', '$subject_id', '$gruppa_id')";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>New record created successfully";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);


?>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="lesson.php"> <P> Назад </P> </a>
</body>
</html>
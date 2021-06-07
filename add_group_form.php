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

$id1 = mysqli_real_escape_string($link, $_POST['id']);
$gruppa1 = mysqli_real_escape_string($link, $_POST['gruppa_name']);
$count1 = mysqli_real_escape_string($link, $_POST['amount']);
$course1 = mysqli_real_escape_string($link, $_POST['course']);
$institute1 = mysqli_real_escape_string($link, $_POST['institute_id']);



echo $id1;
echo $gruppa;
echo $count;
echo $course;
echo $instutute;



$SQLquery = "INSERT INTO gruppa (id, gruppa_name, amount, course, institute_id) VALUES ('$id1', '$gruppa1','$count1','$course1','$institute1')";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>New record created successfully";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);


?>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="groups.php"> <P> Назад </P> </a>
</body>
</html>
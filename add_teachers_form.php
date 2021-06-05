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
$first_name1 = mysqli_real_escape_string($link, $_POST['first_name']);
$last_name1 = mysqli_real_escape_string($link, $_POST['last_name']);
$fathers_name = mysqli_real_escape_string($link, $_POST['fathers_name']);
$post_id1 = mysqli_real_escape_string($link, $_POST['post_id']);
$academic_degree_id1 = mysqli_real_escape_string($link, $_POST['academic_degree_id']);



echo $id1;
echo $first_name1;
echo $last_name1;
echo $fathers_name;
echo $post_id1;
echo $academic_degree_id1;



$SQLquery = "INSERT INTO teachers (id, first_name, last_name, fathers_name, post_id, academic_degree_id) VALUES ('$id1', '$first_name1','$last_name1','$fathers_name','$post_id1','$academic_degree_id1')";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>New record created successfully";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);


?>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="index.html"> <P> Назад </P> </a>
</body>
</html>
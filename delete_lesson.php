<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <title>Сайт первого в мире университета гулей</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 </head>
 <body>

  <?php
        printf('<P>Hello world! Searching for Sales of medicines:</P>');


        include('config.php');
        $link = mysqli_connect($server, $user, $password, $database)
            or die('Error: Unable to connect: ' . mysqli_connect_error());
        echo '<P>Succesfully connected!</P>';
	    $ee=mysqli_real_escape_string($link, $_POST['id']);

        $SQLquery = "DELETE FROM lesson WHERE id= '$ee'";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>Record deleted successfully";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}
      

        mysqli_free_result($SQLresult);
        mysqli_close($link);

?>

<BR>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="lesson.php"> <P> Назад </P> </a>

 </body>
</html>

<html>
 <head>
  <title>Сайт Северо-Восточного Федерального университета</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
<P style="color:black; font-size:20; font-weight:bold">
Наши кафедры:
</P>
<meta charset="utf-8">

        <?php
        include('config.php');
        $link = mysqli_connect($server, $user, $password, $database)
            or die('Error: Unable to connect: ' . mysqli_connect_error());

        $SQLquery = 'SELECT first_name, last_name FROM teachers'>
        $SQLresult = mysqli_query($link,$SQLquery);
        while ($row = mysqli_fetch_array($SQLresult))
        {
        printf( $row['first_name'] . " " . $row['last_name'].' '.  "<br>");
        }
        // � ������� ������ �� १�������
        mysqli_free_result($SQLresult);
        mysqli_close($link);
?>

<BR>
<a href="index.html"> <P> Назад </P> </a>

 </body>
</html>

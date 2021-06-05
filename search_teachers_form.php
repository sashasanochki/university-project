<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <title>Сайт первого в мире университета гулей</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 </head>
 <body>

 <?php
        
        // Соединяемся, выбираем базу данных VER3

        include('config.php');
        $link = mysqli_connect($server, $user, $password, $database)
            or die('Error: Unable to connect: ' . mysqli_connect_error());
	    $date=mysqli_real_escape_string($link, $_POST['id']);
        // Выполняем SQL-запрос
        $SQLquery = 'SELECT * FROM teachers';
        $SQLresult = mysqli_query($link,$SQLquery);
        while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
       	{
		if ($result[0]=="$date"){
                $pole1=$result[1];
                $pole2=$result[2];
                $pole3=$result[3];
                echo '<h2>Поиск препода прошел успешно</h2>';
                echo ($pole1.' '.$pole2. ' '. $pole3. ' ');
		}
   
        }
        // Освобождаем память от результата
        mysqli_free_result($SQLresult);
        mysqli_close($link);

?>

<BR>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="index.html"> <P> Назад </P> </a>

 </body>
</html>
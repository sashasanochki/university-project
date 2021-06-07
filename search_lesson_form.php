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
	    $date=mysqli_real_escape_string($link, $_POST['lesson_date']);
        // Выполняем SQL-запрос
        $SQLquery = 'select * from zapros_2';
        $SQLresult = mysqli_query($link,$SQLquery);
        echo '<table>';
        echo "<tr><td><h1>Дата</h1></td><td><h1>Группа</h1></td><td><h1>Предмет</h1></td><td><h1>Преподаватель</h1></td><td><h1>Вид занятия</h1></td><td><h1>Время</h1></td><td><h1>Аудитория</h1></td></tr>";
        while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
       	{
		if ($result[0]=="$date"){
                $pole1=$result[0];
                $pole2=$result[1];
                $pole3=$result[2];
                $pole4=$result[3];
                $pole5=$result[4];
                $pole6=$result[5];
                $pole7=$result[6];
                echo "<tr><td><h1>$pole1</h1></td><td><h1>$pole2</h1></td><td><h1>$pole3</h1></td><td><h1>$pole3</h1></td><td><h1>$pole5</h1></td><td><h1>$pole6</h1></td><td><h1>$pole7</h1></td><</tr>";
		}
   
        }
        // Освобождаем память от результата
        mysqli_free_result($SQLresult);
        mysqli_close($link);
        echo '</table>';

?>

<BR>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="lesson.php"> <P> Назад </P> </a>

 </body>
</html>
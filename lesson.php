
<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <title>Сайт Северо-Восточного Федерального университета</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>

 

 <body>

<P style="color:white; font-size:24; font-weight: bold; font-family: 'Open Sans', sans-serif;"> Расписание занятий:  </P>

        <?php
                include('config.php');
                $mysqli = mysqli_connect($server, $user, $password, $database);

                $SQLquery = "select concat(teachers.first_name, ' ',left(teachers.last_name,1),'.', left(teachers.fathers_name,1)), lesson_name, gruppa_name, lesson_date, lesson_time, subject_name, classroom FROM lesson INNER JOIN teachers ON teacher_id = teachers.id INNER JOIN type_lesson ON lesson_type = type_lesson.id INNER JOIN discipline ON subject_id = discipline.id INNER JOIN gruppa ON gruppa = gruppa.id INNER JOIN classroom ON lesson.classroom=classroom.number order by lesson_date;";
                $SQLresult = mysqli_query($mysqli, $SQLquery);

                echo "<table>";
                echo "<tr><td><h1>Дата</h1></td><td><h1>Группа</h1></td><td><h1>Предмет</h1></td><td><h1>Преподаватель</h1></td><td><h1>Вид занятия</h1></td><td><h1>Время</h1></td><td><h1>Аудитория</h1></td></tr>";
                    while ($row = mysqli_fetch_array($SQLresult))
                    {
                        $pole1=$row[3];
                        $pole2=$row[2];
                        $pole3=$row[5];
                        $pole4=$row[0];
                        $pole5=$row[1];
                        $pole6=$row[4];
                        $pole7=$row[6];
                    echo "<tr><td><h1>$pole1</h1></td><td><h1>$pole2</h1></td><td><h1>$pole3</h1></td><td><h1>$pole4</h1></td><td><h1>$pole5</h1></td><td><h1>$pole6</h1></td><td><h1>$pole7</h1></td></tr>";
                    }
                mysqli_free_result($SQLresult);
                mysqli_close($link);
            echo "</table>";
            ?>
</P>

<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="index.html"> <P> Назад </P> </a>

 </body>
</html>

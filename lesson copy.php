
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

                $SQLquery = "select concat(teachers.first_name, ' ',teachers.last_name), lesson_name, gruppa_name, lesson_date, lesson_time, subject_name, classroom FROM lesson INNER JOIN teachers ON teacher_id = teachers.id INNER JOIN type_lesson ON lesson_type = type_lesson.id INNER JOIN discipline ON subject_id = discipline.id INNER JOIN gruppa ON gruppa_id = gruppa.id INNER JOIN classroom ON lesson.classroom=classroom.number order by lesson.id;";
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
<table width=100%> 
    <TR>
        <TH> <h2> Поиск занятий по дате </h2> </TH>
        <TH> <h2> Добавить в расписание! </h2> </TH>
        <TH> <h2> Обновление данных </h2> </TH>
    </TR>

            <TD>
            <form action="search_lesson_form.php" method="post"><center>
            <BR> 
                <h1>Введите ID: <input type="date" name="lesson_date">
            <input type="submit" value="Поиск"></center>
                                </form>
            </TD>
            
            <TD><form action="add_lesson_form.php" method="post">
 <BR>
                                <h1>ID препода: <select name="teacher_id">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, ' ', first_name, ' ', last_name) FROM teachers";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s %s</option>',$result1[0],$result1[1],$result1[2]);
			                        }
                                    mysqli_free_result($SQLresult);
?></h1>
</select>
<BR>
								<h1>Аудитория: <select name="classroom">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT number FROM classroom";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%d</option>',$result1[0],$result1[0]);
			                        }
                                    mysqli_free_result($SQLresult);
?></h1>
		</h1></select>
<BR>
								<h1>Вид занятия: <select name="lesson_type">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, '.', lesson_name) FROM type_lesson";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			                        }
                                    mysqli_free_result($SQLresult);
?></h1>
		</h1></select>
<BR>
                                <h1>Дата: <input type="date" name="lesson_date"></h1>
<BR>
                                <h1>Время: <input type="time" name="lesson_time"></h1>
<BR>


                                <h1>Предмет:  <select name="subject_id">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, '.', subject_name) FROM discipline";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			                        }
                                    mysqli_free_result($SQLresult);
?>
		</select></h1>


<BR>
<h1>Группа: <select name="gruppa_id">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, '.', gruppa_name) FROM gruppa";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			                        }
                                    mysqli_free_result($SQLresult);
?>
		</select>
        </h1>
<BR>
								
    <input type="submit" value="Добавим!">
    </form>

    <TD>
    <form action="update_lesson_form.php" method="post">
<br>
    ID:  <select name="id">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id, lesson_date from lesson";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			                        }
                                    mysqli_free_result($SQLresult);
?>
		</select><br>

    teacher_id:<select name="teacher_id">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, ' ', first_name, ' ',last_name) FROM teachers";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s %s</option>',$result1[0],$result1[1],$result[2]);
			                        }
                                    mysqli_free_result($SQLresult);
?></h1>
</select><br>

    classroom:<select name="classroom">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT number FROM classroom";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%d</option>',$result1[0],$result1[0]);
			                        }
                                    mysqli_free_result($SQLresult);
?>
		</select><br>

    lesson_type:<select name="lesson_type">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, '.', lesson_name) FROM type_lesson";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			                        }
                                    mysqli_free_result($SQLresult);
?></h1>
		</h1></select> <br>
    lesson_date:<input type="date" name="lesson_date"></h1><br>

    lesson_time:<input type="time" name="lesson_time"><br><br>

    subject_id:<select name="subject_id">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, '.', subject_name) FROM discipline";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			                        }
                                    mysqli_free_result($SQLresult);
?>
		</select><br>
    gruppa_id:  <select name="gruppa_id">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, '.', gruppa_name) FROM gruppa";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			                        }
                                    mysqli_free_result($SQLresult);
?>
		</select><br>
    <input type="submit" value="Обновить!"> <br>
            </form>
    </TD>
            </table>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="index.html"> <P> Назад </P> </a>

 </body>
</html>

<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <title>Сайт первого в мире университета гулей</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 </head>
 <body link="red" vlink="blue">
<P style="color:orange; font-size:26; font-weight: bold; font-family: 'Open Sans', sans-serif;">
Состав наших дорогих преподавателей:
</P>

	<?php
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());

	$SQLquery = 'SELECT teachers.id, first_name, last_name, fathers_name, post_name, ad_name FROM teachers INNER JOIN post ON teachers.post_id=post.id INNER JOIN academic_degree ON teachers.academic_degree_id=academic_degree.id ORDER BY post.id DESC;';
	$SQLresult = mysqli_query($link,$SQLquery);

    echo "<table>";
    echo "<tr><td><h1>Номер удостоверения</h1></td><td><h1>Фамилия</h1></td><td><h1>Имя</h1></td><td><h1>Отчество</h1></td><td><h1>Должность</h1></td><td><h1>Ученая степень</h1></td></tr>";
		while ($row = mysqli_fetch_array($SQLresult))
		{
            $pole1=$row[0];
            $pole2=$row[1];
            $pole3=$row[2];
            $pole4=$row[3];
            $pole5=$row[4];
            $pole6=$row[5];
        echo "<tr><td><h1>$pole1</h1></td><td><h1>$pole2</h1></td><td><h1>$pole3</h1></td><td><h1>$pole4</h1></td><td><h1>$pole5</h1></td><td><h1>$pole6</h1></td></tr>";
		}
	mysqli_free_result($SQLresult);
	mysqli_close($link);
echo "</table>";
?>
</P>

<P style="color:orange; font-size:24; font-weight: bold; font-family: 'Open Sans', sans-serif;"> Выберите опции:</P>
<table width=100% cellspacing="3" border="3";"> 
    <TR>
        <TH> <h2> Добавление преподавателя </h2> </TH>
        <TH> <h2> Поиск преподавателя по номеру удостоверения </h2> </TH>
        <TH> <h2> Обновление данных </h2> </TH>
    </TR>
    <TD>
 <form action="add_teachers_form.php" method="post">
 <BR>
                                <h1>ID преподавателя: <input type="text" name="id"></h1>
<BR>
                                <h1>Фамилия: <input type="text" name="first_name"></h1>
<BR>
								<h1>Имя: <input type="text" name="last_name"></h1>
<BR>
								<h1>Отчество (если есть): <input type="text" name="fathers_name"></h1>
<BR>
								<a href="post.php"><h1>ID должности (нажмите, чтобы узнать):</a> <input type="text" name="post_id"></h1>
<BR>
								<a href="ad.php"><h1>ID ученой степени (нажмите, чтобы узнать):</a> <input type="text" name="academic_degree_id"></h1>
<BR>
    <input type="submit" value="Добавим!">
    </form>

    </TD>

    <TD>
    <form action="search_teachers_form.php" method="post"><center>
    <BR> 
        <h1>Введите ID: <input type="text" name="id">
    <input type="submit" value="Поиск"></center>
                          </form>
    </TD>


    <TD>
    <form action="update_teachers_form.php" method="post">

    <h1>ID препода:<select name="id">
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
</select>
<br>

    <h1>Фамилия:<input type="text" name="first_name"><br><br></h1>

    <h1>Имя:<input type="text" name="last_name"><br><br></h1>

    <h1>Отчество:<input type="text" name="fathers_name"><br><br></h1>

    <input type="submit" value="Обновить!"> <br>
            </form>
    </TD>
 
    </table>
<BR>

            </TD>
            </TR>
<BR>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="index.html"> <P> Назад </P> </a>

 </body>
</html>

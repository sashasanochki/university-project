<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <title>Сайт первого в мире университета гулей</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 </head>
<body>
<P style="color:orange; font-size:26; font-weight: bold; font-family: 'Open Sans', sans-serif;">
Группы:
</P>

	<?php
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());

	$SQLquery = 'select gruppa.id, gruppa_name, amount, course, institutes.inst_name FROM gruppa INNER JOIN institutes ON institute_id = institutes.id GROUP BY gruppa.id ORDER BY gruppa.id LIMIT 10 ;';
	$SQLresult = mysqli_query($link,$SQLquery);

    echo "<table>";
    echo "<tr><td><h1>ID группы</h1></td><td><h1>Курс</h1></td><td><h1>Название</h1></td><td><h1>Количество</h1></td><td><h1>Институт</h1></td></tr>";
		while ($row = mysqli_fetch_array($SQLresult))
		{
            $pole1=$row[0];
            $pole2=$row[3];
            $pole3=$row[1];
            $pole4=$row[2];
            $pole5=$row[4];
        echo "<tr><td><h1>$pole1</h1></td><td><h1>$pole2</h1></td><td><h1>$pole3</h1></td><td><h1>$pole4</h1></td><td><h1>$pole5</h1></td><td><h1>$pole6</h1></td></tr>";
		}
	mysqli_free_result($SQLresult);
	mysqli_close($link);
echo "</table>";
?>
<P style="color:orange; font-size:24; font-weight: bold; font-family: 'Open Sans', sans-serif;"> Выберите опции:</P>
<table width=100%> 
    <TR>
        <TH> <h2> Добавление группы </h2> </TH>
        <TH> <h2> Поиск группы по ID </h2> </TH>
        <TH> <h2> Обновление данных </h2> </TH>
    </TR>
</P>
<!-- <a href="https://docs.google.com/spreadsheets/d/1p-xcdfqga8xlHbyn5MsyQbAMqbG7V2y9gz46cEzc2bg/edit#gid=0" target="_blank"> <h3>Ссылка на полное количество групп</h3> </a> -->
<TD><form action="add_group_form.php" method="post">
 <BR>
                                <h1>ID группы: <input type="text" name="id"></h1>
<BR>
                                <h1>Название: <input type="text" name="gruppa_name"></h1>
<BR>
								<h1>Количество учащихся: <input type="number" name="amount"></h1>
<BR>
								<h1>Курс: <input type="number" name="course"></h1>
<BR>
								<h1><a href="institutes_1.php" target="_blank">ID института (нажмите, чтобы узнать):</a> <input type="number" name="institute_id"> </h1>     
<BR>
    <input type="submit" value="Добавим!">
    </form>
    </TD>
    <TD>
    <form action="search_group_form.php" method="post"><center>
    <BR> 
        <h1>Введите ID: <input type="text" name="id">
    <input type="submit" value="Поиск"></center>
                          </form>
    </TD>
    <TD>
    <form action="update_group_form.php" method="post">

   <h1> ID: <select name="gruppa_id">
                                <?php
                                include('config.php');
                                $link = mysqli_connect($server, $user, $password, $database)
                                         or die('Error: Unable to connect: ' . mysqli_connect_error());
                                $SQLquery = "SELECT id,  CONCAT( id, ' ', gruppa_name, ' ') FROM gruppa";
                                $SQLresult = mysqli_query($link,$SQLquery);
                                while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			                        {
				                            printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			                        }
                                    mysqli_free_result($SQLresult);
?></h1>
</select>

   <h1>Название:<input type="text" name="gruppa_name"></h1><br>

   <h1>Кол-во:<input type="number" name="amount"></h1><br>

   <h1>Курс:<input type="number" name="course"></h1><br>

   <h1>ID_инст:<input type="number" name="institute_id"></h1><br><br>

    <input type="submit" value="Обновить!"> <br>
            </form>
    </TD>
</table>
    </body>

<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="index.html"> <P> Назад </P> </a>
    </html>

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

	$SQLquery = 'select gruppa.id, gruppa_name, count, course, institutes.inst_name FROM gruppa INNER JOIN institutes ON institute_id = institutes.id ORDER BY course LIMIT 10;';
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
</P>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="index.html"> <P> Назад </P> </a>
    </body>
    </html>

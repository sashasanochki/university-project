
<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <title>Сайт Северо-Восточного Федерального университета</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>



 <body>

<P style="color:orange; font-size:26; font-weight: bold; font-family: 'Open Sans', sans-serif;">
Предметы:

</P>
<meta charset="utf-8">
<P style="color:white; font-size:24; font-weight: bold; font-family: 'Open Sans', sans-serif;">
        <?php
                include('config.php');
                $mysqli = mysqli_connect($server, $user, $password, $database);

                $query = "select DISTINCT subject_name from discipline;";
                $result = mysqli_query($mysqli, $query);

                /* получениеи ассоциативного массив */
                while ($row = mysqli_fetch_row($result)) 
                {
                    printf("%s ", $row[0]. "<br>");
                    printf("\n");
                }
?>
</P>
<BR>
<a style="color:yellow; font-size:25px; font-weight: bold; font-family: 'Open Sans', sans-serif;"  href="index.html"> <P> Назад </P> </a>
 </body>
</html>

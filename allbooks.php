<html>
 <head>
  <title>WEB-site of the Alekseev V. National Library</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Hello world! Searching for books of Dostojevsky:</P>');
	// ������塞��, �롨ࠥ� ���� ������ VER3

	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	echo '<P>Succesfully connected!</P>';
	
	// �믮��塞 SQL-�����
	$SQLquery = 'SELECT * FROM authors INNER JOIN books on books.AuthorID=authors.AuthorID';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Author: %s %s, Book: %s (%d) </P>',$result[1],$result[2],$result[5],$result[6]);
	}
	// �᢮������� ������ �� १����
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>
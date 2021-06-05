<?php
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());

	$SQLquery = 'SELECT teachers.id, first_name, last_name, fathers_name, post_name, ad_name FROM teachers INNER JOIN post ON teachers.post_id=post.id INNER JOIN academic_degree ON teachers.academic_degree_id=academic_degree.id ORDER BY post.id DESC;';
	$SQLresult = mysqli_query($link,$SQLquery);

    echo "<table>";
    echo "<tr><td>Номер удостоверения</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Должность</td><td>Ученая степень</td></tr>";
		while ($row = mysqli_fetch_assoc($SQLresult))
		{
            $pole1=$row['id'];
            $pole2=$row['first_name'];
            $pole3=$row['last_name'];
            $pole4=$row['fathers_name'];
            $pole5=$row['post_name'];
            $pole6=$row['ad_name'];
		}
        echo "<tr><td>$pole1</td><td>$pole2</td><td>$pole3</td><td>$pole4</td><td>$pole5</td><td>$pole6</td></tr>";
	mysqli_free_result($SQLresult);
	mysqli_close($link);
echo "</table>";
?>
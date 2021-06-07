<?php 
			
			$SQLquery = "SELECT id, CONCAT( `id`, '. ', `subject_name`) FROM discipline";
			$SQLresult = mysqli_query($link,$SQLquery);
			while ($result1 = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
			{
				printf('<option value=%d>%s</option>',$result1[0],$result1[1]);
			}

			mysqli_free_result($SQLresult);
	
		?>
<?
	$link=mysql_connect('localhost','root','');
	mysql_select_db('map'); // здесь имя базы данных
       
	$sql='SELECT DISTINCT city_type FROM cities'; // здесь название таблицы
	   
	$res=mysql_query($sql);

       for($i=0; $i<mysql_num_rows($res);$i++)
	       {
		        $row=mysql_fetch_array($res);
				 
				$city_type=$row['city_type'];
				 
			   	print "<a href=?city_type=$city_type> <br> Тип $city_type</a>";
		   }

	   mysql_close($link);
?>

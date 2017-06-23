<?
	$link=mysql_connect('localhost','root','');
	mysql_select_db('map'); // здесь имя базы данных


	$sql="SELECT count(*) AS cnt, `iso_country` FROM cities group by `iso_country`"; // здесь название таблицы
                      
	$res=mysql_query($sql);
                      
	for($i=0; $i<mysql_num_rows($res);$i++)
		{
			$row=mysql_fetch_array($res);
			$country=$row['iso_country']; // здесь название поля
			$cnt=$row['cnt'];      
                     
			print "
				<p><a class=\"btn btn-info btn-mini\" href=\"?iso_country=$country\">Города $country &raquo; $cnt <img src=\"image/flags_iso/16/$country.png\"> </a></p>
			";
		}
		
	mysql_close($link);
?>
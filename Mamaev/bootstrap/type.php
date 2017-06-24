		<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map12'); // здесь имя базы данных
       $sql='SELECT DISTINCT city_type
	   FROM cities'; // здесь название таблицы
	   
         $res=mysql_query($sql);
           for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		
		 
		 
		 
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $region=$row['region'];
		 $population=$row['population'];
		 $year_created=$row['year_created'];
		 $city_type=$row['city_type'];
		 $iso_country=$row['iso_country'];

		 $name1=str_replace("'", "", $name1);
		 
	   print "<a href=?city_type=$city_type> <br> Тип $city_type</a>";
	   }					  
      ?>

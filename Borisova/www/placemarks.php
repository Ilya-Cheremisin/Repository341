       <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('dislocation'); // здесь имя базы данных
       $sql='SELECT * FROM map'; // здесь название таблицы
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name=$row['Name']; // здесь название поля
		 $x=$row['Latitude']; // здесь название поля
		 $y=$row['Longitude']; // здесь название поля
		 
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$Name',
                balloonContent: 'Тут описание надо!'
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
	   }
       ?>



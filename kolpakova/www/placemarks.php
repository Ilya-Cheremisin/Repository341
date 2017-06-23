       <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql='SELECT * FROM `1`'; // здесь название таблицы
       $res=mysql_query($sql);
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name=$row['name']; // здесь название поля
		 $x=$row['latitude']; // здесь название поля
		 $y=$row['longitude']; // здесь название поля
		 
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$name',
                balloonContent: 'Тут описание надо!'
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
	   }
       ?>



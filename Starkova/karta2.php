<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Быстрый старт. Размещение интерактивной карты на странице</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=tr_TR" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap, 
            myPlacemark;

        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [56.7888, 60.6034],
                zoom: 7
            }); 
            
            myPlacemark = new ymaps.Placemark([56.7888, 60.6034], {
                hintContent: 'Yekaterinburg!',
                balloonContent: 'Столица Урала'
            });
            
            myMap.geoObjects.add(myPlacemark);
				<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
       $sql='SELECT * FROM cities Limit 100'; // здесь название таблицы
	   
	   $iso_country=$_GET['iso_country'];
	   if($iso_country)
	   $sql="SELECT * FROM cities WHERE iso_country='$iso_country'";
	   
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $name=$row['name1'];
		 $region=$row['region'];
		 $year_created=$row['year_created'];
		 $population=$row['population'];
		 $city_type=$row['city_type'];
		 $iso_country=$row['iso_country'];
		 
		 
		
		 $name1=str_replace("'", " ", $name1);
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$name1',
                balloonContent: '$name1 <br> <b>Регион:</b> $region <br> <b>Год:</b> $year_created <br> <b>Популяция:</b> $population <br> <b>Тип города:</b> $city_type <br> <b>Код страны:</b> $iso_country'
				
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
	   }
       ?>
	   <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
       $sql='SELECT * FROM cities Limit 100'; // здесь название таблицы
	   
	   $iso_country=$_GET['iso_country'];
	   if($iso_country)
	   $sql="SELECT * FROM cities WHERE iso_country='$iso_country'";
	   
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $name=$row['name1'];
		 $region=$row['region'];
		 $year_created=$row['year_created'];
		 $population=$row['population'];
		 $city_type=$row['city_type'];
		 $iso_country=$row['iso_country'];
		 
		 
		
		 $name1=str_replace("'", " ", $name1);
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$name1',
                balloonContent: '$name1 <br> <b>Регион:</b> $region <br> <b>Год:</b> $year_created <br> <b>Популяция:</b> $population <br> <b>Тип города:</b> $city_type <br> <b>Код страны:</b> $iso_country  <br> <img src=flags_iso/32/$iso_country.png>' 
				
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
	   }
       ?>
        }

    </script>
	
</head>
<a href="?iso_country=RU">Города России</a>
<body>
    <div id="map" style="width: 600px; height: 400px"></div>
	
</body>

</html>
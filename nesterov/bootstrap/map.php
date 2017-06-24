<html>
<head>
</head>
<body>
<div class="header">
<h1><big>Магазин товаров</big></h1>

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
                center: [55.76, 37.64],
                zoom: 1,
				
				controls: ['smallMapDefaultSet']
		   }); 
		   
		   myMap.controls.add('routeEditor');
		   myMap.controls.add('trafficControl');
            
            myPlacemark = new ymaps.Placemark([55.76, 37.64],
			{
                hintContent: 'Москва!',
                balloonContent: 'Столица России',
            });
            
            myMap.geoObjects.add(myPlacemark);
        
		
		var myPlacemark = new ymaps.Placemark([55.78, 37.68], {}, {
			iconLayout: 'default#image',
			iconImageHref: 'icon.png',
			iconImageSize: [30, 42],
			iconImageOffset: [-3, -42]
		});
			myMap.geoObjects.add(myPlacemark);
			
		var myPolyline = new ymaps.GeoObject({
			geometry: {
			type: "LineString",
			coordinates: [[55.76, 37.64],[55.78, 37.68]]
      }
    });
			myMap.geoObjects.add(myPolyline);

			
			
			       <? // вывод меток
				   
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map12'); // здесь имя базы данных
       $sql='SELECT * FROM cities LIMIT 100'; // здесь название таблицы
	   
	   $iso_country=$_GET['iso_country'];
	   if($iso_country)
		$sql="SELECT * FROM cities WHERE iso_country='$iso_country'"; //фильтрация iso_country
	   
	         $res=mysql_query($sql);
             for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		  $name3=$row['name3']; // здесь название поля
	      $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $region=$row['region'];
		 $population=$row['population'];
		 $year_created=$row['year_created'];
		 $city_type=$row['city_type'];
		 $iso_country=$row['iso_country'];
		 
		 	   
		 $name1=str_replace("'", "", $name1);
		 $name3=str_replace("'", "", $name3);
		 
		  print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$name3',
                balloonContent: '$name3 <br> Название:$name1 <br> Регион:$region, <br> Популяция:$population <br> Год:$year_created <br> Тип города:$city_type <br> Страна:$iso_country',
				
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
			  
			  
		}
       ?>
		
	}
    </script>
</head>
<body>
    <div id="map" style="width: 600px; height: 400px; position:absolute; top:800px;">
	<a href="?iso_country=RU"> Город России </a>
	</div>
</body>
</html>

<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map12'); // здесь имя базы данных
       $sql='SELECT DISTINCT iso_country
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
		 
	   print "<a href=?iso_country=$iso_country> <br> Город $iso_country</a> <br>
	   <img src='flags_iso/48/$iso_country.png'>";
	   }					  
      ?>
		

		<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map12'); // здесь имя базы данных
       $sql='SELECT count(*) AS cnt, iso_country FROM cities
	GROUP BY iso_country
	ORDER BY iso_country'; // здесь название таблицы
	   
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
		 
	   print "<a href=?city_type=$city_type> Тип $city_type  </a> ;
	   }					  
      ?>
		

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
<title>API 2.0 ЭКЗАМПЛЕ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<style type="text/css">
		#map {
			float: left;
			width: 700px;
			height: 400px;
		}
		.ballon {
			padding: 5px;
			width: 240px;
			height: 79px;
			float: left;
			text-align: left;
			color: #fff;
			position: absolute;
		}
		.ballon img.ll {
			float: left;
			width: 60px;
			height: 60px;
			margin: 0 5px 5px 0;
			border-radius: 60px;
		}
		.ballon span {
			font-size: 14px;
			font-weight: bold;
		}
		.ballon p {
			font-size: 12px;
		}
		.ballon .close {
			position: absolute;
			float: left;
			font-size: 15px;
			font-weight: bold;
			top: 0;
			right: 0px;
			cursor: pointer;
		}
		.ballon .close:hover {
			color: #ccc;
		}
	</style>
	<script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
	<script type="text/javascript">
        ymaps.ready(init); // карта соберется после загрузки скрипта и элементов
        var myMap; // заглобалим переменную карты чтобы можно было ею вертеть из любого места
        function init () { // функция - собиралка карты и фигни
            myMap = new ymaps.Map("map", { // создаем и присваиваем глобальной переменной карту и суем её в див с id="map"
                    center: [56.7888, 60.6034], // ну тут центр
                    behaviors: ['default', 'scrollZoom'], // скроллинг колесом
                    zoom: 1 // тут масштаб
                });
            myMap.controls // добавим всяких кнопок, в скобках их позиции в блоке
        		.add('zoomControl', { left: 5, top: 5 }) //Масштаб
        		.add('typeSelector') //Список типов карты
        		.add('mapTools', { left: 35, top: 5 }) // Стандартный набор кнопок
        		.add('searchControl'); // Строка с поиском
	   
	   
				
				<?  // Вывод меток
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
       $sql='SELECT * FROM cities Limit 100'; // здесь название таблицы
	   
	   $iso_country=$_GET['iso_country'];
	   if($iso_country)
	   $sql="SELECT * FROM cities WHERE iso_country='$iso_country'";
   
    $city_type=$_GET['city_type'];
	   if($city_type)
	   $sql="SELECT * FROM cities WHERE city_type='$city_type'";
	   
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		 $name_rus=$row['names'];
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $name=$row['name1'];
		 $region=$row['region'];
		 $year_created=$row['year_created'];
		 $population=$row['population'];
		 $city_type=$row['city_type'];
		 $iso_country=$row['iso_country'];
		 
		 
		
		 $name1=str_replace("'", " ", $name1);
		 $name_rus=str_replace("'", " ", $name_rus);
		
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$name_rus',
                balloonContent: '$name1 <br> <b>Регион:</b> $region <br> <b>Год:</b> $year_created <br> <b>Популяция:</b> $population <br> <b>Тип города:</b> $city_type <br> <b>Код страны:</b> $iso_country'
				
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
	   }
       ?>

	       
			
    }
	</script>
</head>
<body>
	<h1>Карта</h1>
	<div id="map"></div>
	<a href="?iso_country=RU">Города России</a>
</body>
</html>
<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
       $sql='SELECT DISTINCT iso_country
	   FROM cities'; // здесь название таблицы
	   
	   
	   
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
         print " 	<a href=?iso_country=$iso_country> <br> Города $iso_country</a> <br> <img src='flags_iso/48/$iso_country.png'>";
		 
		
	   }
       ?>
	   <?
       
	   $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
       $sql='SELECT DISTINCT city_type
	   FROM cities'; // здесь название таблицы
	   
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
        
	print " 	<a href=?city_type=$city_type> <br> Тип $city_type</a>";
	   }
       ?>
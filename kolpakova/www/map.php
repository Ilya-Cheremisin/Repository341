<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Map</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=tr_TR" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap, 
            myPlacemark;
			myPlacemark_2;
			var myRectangle;

        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [56.84, 60.61],
                zoom: 2
            }); 
            
            var myPlacemark= new ymaps.Placemark([56.95, 60.35], {
                hintContent: 'Ekaterinburg',
                balloonContent: 'The capital of the Urals'
            },{
        iconLayout: 'default#image',
        iconImageHref: '33.png',
        iconImageSize: [50, 62],
        iconImageOffset: [-1, -42]
    })
	        var myPlacemark_2= new ymaps.Placemark([56.50, 61.69], {
                hintContent: 'Kamensk',
            },{
        iconLayout: 'default#image',
        iconImageHref: '33.png',
        iconImageSize: [50, 62],
        iconImageOffset: [-1, -42]
    });
	var myRectangle = new ymaps.GeoObject({
      geometry: {
        type: "Rectangle",
        coordinates: [[57.70, 60.5],[56.5, 61.7]]
      }
    });
            
            myMap.geoObjects.add(myPlacemark);
			myMap.geoObjects.add(myPlacemark_2);
			myMap.geoObjects.add(myRectangle);
			
			       <?// вывод меток
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql='SELECT * FROM cities LIMIT 100'; // здесь название таблицы
       
	   $iso_country =$_GET['iso_country'];
	   if ($iso_country)
		   $sql="SELECT*FROM cities
	   WHERE iso_country='$iso_country'";
	   
	   	   $city_type =$_GET['city_type'];
	   if ($city_type)
		   $sql="SELECT*FROM cities
	   WHERE city_type='$city_type'";
	   
	   $res=mysql_query($sql);
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		 $name_rus=$row['names']; // здесь название поля
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $region=$row['region']; // здесь название поля
		 $iso_country=$row['iso_country']; // здесь название поля
		 $population=$row['population']; // здесь название поля
		 
		 $name1=str_replace("'"," ", $name1);
		 $name_rus=str_replace("'"," ", $name_rus);
		  
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$name_rus',
                balloonContent: '<b> Регион: $region</b> <br> Код: $iso_country <br> Население: $population'
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
	   }
       ?>
			
        }
    </script>
</head>

<body>
    <div id="map" style="width: 600px; height: 400px"></div>
	
	<a href="?iso_country=RU">Города России</a> 
	<a href="?iso_country=FR">Города Франции</a>
</body>

</html>


<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql="SELECT DISTINCT iso_country FROM cities"; // здесь название таблицы
       
	   $res=mysql_query($sql);
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $region=$row['region']; // здесь название поля
		 $iso_country=$row['iso_country']; // здесь название поля
		 $population=$row['population']; // здесь название поля
		 
		 $name1=str_replace("'"," ", $name1);
		 
         print "
		 <a href=?iso_country><br>Города:$iso_country</a>
		 <img src='flags_iso/48/$iso_country.png'>
		 ";
	   }
       ?>
	   
	   <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql="SELECT DISTINCT city_type FROM cities"; // здесь название таблицы
       
	   $res=mysql_query($sql);
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $region=$row['region']; // здесь название поля
		 $city_type=$row['city_type']; // здесь название поля
		 $population=$row['population']; // здесь название поля
		 
		 $name1=str_replace("'"," ", $name1);
		 
         print "
		 <a href=?iso_country><br>Тип города::$city_type</a>
		 ";
	   }
       ?>

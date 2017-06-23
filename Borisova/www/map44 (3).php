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
                zoom: 7
            }); 
            
            myPlacemark = new ymaps.Placemark([55.76, 37.64], {
                hintContent: 'Москва!',
                balloonContent: 'Столица России'
            });
            
            myMap.geoObjects.add(myPlacemark);
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


        }
    </script>
</head>

<body>
    <div id="map" style="width: 600px; height: 400px"></div>
</body>

</html>

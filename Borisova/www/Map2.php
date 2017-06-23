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
                    zoom: 10 // тут масштаб
                });
            myMap.controls // добавим всяких кнопок, в скобках их позиции в блоке
        		.add('zoomControl', { left: 5, top: 5 }) //Масштаб
        		.add('typeSelector') //Список типов карты
        		.add('mapTools', { left: 35, top: 5 }) // Стандартный набор кнопок
        		.add('searchControl'); // Строка с поиском
	        /* Создаем кастомные метки */
	        myPlacemark0 = new ymaps.Placemark([54.7888, 62.6034], { // Создаем метку с такими координатами и суем в переменную
	                balloonContent: '<div class="ballon"><img src="http://proadobemuse.ru/images/redpin.png" class="ll"/><span>Заголовок метки 1</span><br/><p>Немного инфы о том, о сем. Лорем ипсум чото там.</p><img class="close" onclick="myMap.balloon.close()" src="img/http://proadobemuse.ru/images/redpin.png"/></div>' // сдесь содержимое балуна в формате html, все стили в css
	            	}, {
	            	iconImageHref: 'img/http://proadobemuse.ru/images/redpin.png', // картинка иконки
	            	iconImageSize: [64, 64], // размер иконки
	            	iconImageOffset: [-32, -64], // позиция иконки
	                balloonContentSize: [270, 99], // размер нашего кастомного балуна в пикселях
	                balloonLayout: "default#imageWithContent", // указываем что содержимое балуна кастомная херь
	                balloonImageHref: 'img/http://proadobemuse.ru/images/redpin.png', // Картинка заднего фона балуна
	                balloonImageOffset: [-65, -89], // смещание балуна, надо подогнать под стрелочку
	                balloonImageSize: [260, 89], // размер картинки-бэкграунда балуна
	                balloonShadow: false,
	                balloonAutoPan: false // для фикса кривого выравнивания
	                });
	        		/* тоже самое для других меток */
	        myPlacemark1 = new ymaps.Placemark([56.7888, 60.6034], {
	                balloonContent: '<div class="ballon"><img src="img/hh.jpg" class="ll"/><span>Заголовок метки 2</span><br/><p>Немного инфы о том, о сем. Лорем ипсум чото там.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"/></div>'
	            	}, {
	            	iconImageHref: 'img/icon2.png',
	            	iconImageSize: [64, 64],
	            	iconImageOffset: [-32, -64],
	                balloonContentSize: [270, 99],
	                balloonLayout: "default#imageWithContent",
	                balloonImageHref: 'img/ballon2.png',
	                balloonImageOffset: [-65, -89],
	                balloonImageSize: [260, 89],
	                balloonShadow: false,
	                balloonAutoPan: false
	                });
	        myPlacemark2 = new ymaps.Placemark([56.7888, 60.6034], {
	                balloonContent: '<div class="ballon"><img src="http://justclickit.ru/flash/flag/flag%20(150).gif" class="ll"/><span>Екатеринбург</span><br/><p>Столица Урала</p><img class="close" onclick="myMap.balloon.close()" img src="http://justclickit.ru/flash/flag/flag%20(150).gif"/></div>'
	            	}, {
	            	iconImageHref: 'img src="http://justclickit.ru/flash/flag/flag%20(150).gif"',
	            	iconImageSize: [64, 64],
	            	iconImageOffset: [-32, -64],
	                balloonContentSize: [270, 99],
	                balloonLayout: "default#imageWithContent",
	                balloonImageHref: 'img src="img src="http://justclickit.ru/flash/flag/flag%20(150).gif"',
	                balloonImageOffset: [-65, -89],
	                balloonImageSize: [260, 89],
	                balloonShadow: false,
	                balloonAutoPan: false
	                });
	        /* Добавляем */
	        myMap.geoObjects
	        	.add(myPlacemark0)
	        	.add(myPlacemark1)
	        	.add(myPlacemark2);
				
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
		 $About=$row['About']; // здесь название поля
		 
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$Name',
                balloonContent: '$About'
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
	   }
       ?>

	        /* Фикс кривого выравнивания кастомных балунов */
			myMap.geoObjects.events.add([
		        'balloonopen'
		    ], function (e) {
		        var geoObject = e.get('target');
		        myMap.panTo(geoObject.geometry.getCoordinates(), {
		                                    delay: 0
		                                });
		    });
    }
	</script>
</head>
<body>
	<h1>Карта</h1>
	<div id="map"></div>
</body>
</html>
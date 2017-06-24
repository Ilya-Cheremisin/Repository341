<html>
<head>
</head>
<body>
<div class="header">

<h1><big>Магазин товаров 432432432</big></h1>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Быстрый старт. Всякое разное. Размещение интерактивной карты на странице</title>
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
		
		
		
<div class="bs-docs-example">
<table class="table">
<thead>
<tr class="error" bgcolor="#eee1">
</tr>
</tbody>
</table>
</div>
</div>
<div class="leftCol">
СПИСОК ТОВАРОВ
</div>
<div class="content">
<H2>Каталог
</H2>
<div class="gallery">
<H2> Товар 
</H2>
<div class="tovar">
<H3> Телевизор 
</H3>
<span> 10000 рублей </span>
</div>
<div class="tovar">
<H3> Холодильник 
</H3>
<span> 20000 рублей </span>
</div>
<div class="tovar">
<H3> Стиральная машина 
</H3>
<span> 25000 рублей </span>
</div>
<div class="tovar">
<H3> Пылесос 
</H3>
<span> 12000 рублей </span>
</div>
</div>
</div>
<div class="footer">
</div>
</body>
</html>



<style>
.header {
background:url(M.jpg);
height:500px;
left:0px;

}

h1{position:absolute;
top:50px;
left:25px;
color:#000080}

.leftCol {widht:25%;
float:left;
font:15px fantasy;
color:#8A2BE2;}

.content{widht:75%;
float:left;
border:solid 1px #FF1493;}

.leftCol{border:solid 1px #000080;},

gallery{border:dotted 1px #AFEEEE;}

.tovar{width:200px;
float:left;
padding:5px;
margin:5px;
border:solid 1px #aaa;
box-shadow:15 15 10px #333;
border-radius:5px;}

.tovar span{color:#f00;}

.cart{position:fixed;
border:solid 1px #000000;
background:#AFEEEE;
right:0;
bottom:100px;
height:50px;
color:#8A2BE2;}

.tovar{position.relative;}

.warn{position:absolute;
top:-10px;
left:-10px;
z-index:100;}
</style>


<div class="cart">
корзина </div>






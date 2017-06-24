<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 10px;
        padding-bottom: 10px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
	  #map {
			float: left;
			width: 100%;
			height: 400px;
			margin: 0 0 0 0;
			
		}

		.hero-unit {background-color: #fff;}
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
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">

								   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
								   
								   
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
	   
	   
				
				<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('cities_correct'); // здесь имя базы данных
	   
       $sql='SELECT * FROM cities LIMIT 100'; // здесь название таблицы
	   
	   
	   $iso_country=$_GET['iso_country'];
	   if($iso_country)
          $sql="SELECT * FROM cities WHERE iso_country='$iso_country'";


	   $city_type=$_GET['city_type'];
		 if($city_type)
			$sql="SELECT * FROM cities WHERE city_type='$city_type'";
		
		
			   $region=$_GET['region'];
		 if($region)
			$sql="SELECT * FROM cities WHERE region='$region'";
		
		
		$searchname = $_GET['searchname'];
   if($searchname)
	   $sql = "SELECT * FROM cities WHERE names LIKE '%$searchname%' ";
   
   		$searchname = $_GET['searchname'];
   if($searchname)
	   $sql = "	 SELECT * FROM cities  WHERE name like '%$searchname%'
   UNION
SELECT * FROM (	  SELECT * FROM cities  
	WHERE abs(length(name)-length('$searchname'))<2
ORDER BY levenshtein(name, '$searchname')

 LIMIT 20
 ) AS sdf";
	   
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $id=$row['id']; // здесь название поля
		 $name1=$row['name1']; // здесь название поля
		 $name=$row['name']; // здесь название поля
		 $names=$row['names']; // здесь название поля
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $city_type=$row['city_type']; // здесь название поля
		 $iso_country=$row['iso_country']; // здесь название поля
		 $population=$row['population']; // здесь название поля
		 $year_created=$row['year_created']; // здесь название поля
		 $region=$row['region']; // здесь название поля
		 $name=str_replace("'"," ", $name);
		 $names=str_replace("'"," ", $names);
		 
		 

		 
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
			 
                hintContent: '$name',
                balloonContent: 'Регион: $region; <br>Название name: <b>$name</b>,<br>Название names:<b>$names</b>; <br>Координаты: $x, $y; '+
				'<br>Население: $population, <br>$city_type, <br><img src=flags_iso/32/$iso_country.png>'
            });
            
            myMap.geoObjects.add(myPlacemark);
			";
	   }
       ?>

	       
			
    }
	</script>
	

  </head>

  <body>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
		 
		   <li class="nav-header">Коды стран</li>
		 <ul class="nav nav-list">
		   
<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('cities_correct'); // здесь имя базы данных
	   
       $sql='SELECT count(*) AS cnt, iso_country FROM cities
	GROUP BY iso_country
	ORDER BY iso_country'; // здесь название таблицы
	   
	   
       $res=mysql_query($sql);
       
for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);

		 $iso_country=$row['iso_country']; // здесь название поля
         $cnt=$row['cnt'];
		 
		 
         print "
		<li><a href=?iso_country=$iso_country>Города $iso_country <img src='flags_iso/32/$iso_country.png'><span class='pull-right badge badge-success'>$cnt</span></a><li>
		
			";
	   }
	   	
       ?>
	   	   
	 </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">

	<div id="map"></div>
 
         		 <h3>Фильтрация и статистика</h3>
		  <div class="bs-docs-example">
<ul id="myTab" class="nav nav-tabs">

<li class=""><a href="#home" data-toggle="tab">Типы городов</a></li>
<li class=""><a href="#profile" data-toggle="tab">Регионы</a></li>
<li class=""><a href="#сharts1" data-toggle="tab">График-города</a></li>
<li class="active"><a href="#сharts2" data-toggle="tab">График-регионы</a></li>
</ul>
<div id="myTabContent" class="tab-content">


<div class="tab-pane fade" id="search">
 
 
</div>




<div class="tab-pane fade" id="home">
<ul class="nav nav-list">
  <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('cities_correct'); // здесь имя базы данных
	   
       $sql='SELECT DISTINCT city_type FROM cities'; // здесь название таблицы
	   	   		 
	          $res=mysql_query($sql);
       
for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);

		 $city_type=$row['city_type']; // здесь название поля


		 
         print "
		<li><a href=?city_type=$city_type> <br>Тип города $city_type</a></li>
			";
	   }
	   	
       ?> 
	   </ul>
</div>
<div class="tab-pane fade" id="profile">
<ul class="nav nav-list">
  <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('cities_correct'); // здесь имя базы данных
	   
       $sql='SELECT DISTINCT region FROM cities'; // здесь название таблицы
	   	   		 
	          $res=mysql_query($sql);
       
for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);

		 $region=$row['region']; // здесь название поля


		 
         print "
		<li><a href=?region=$region> <br>Регион: $region</a></li>
			";
	   }
	   	
       ?> 
	   </ul>
</div>


<div class="tab-pane fade" id="сharts1">

  <script type="text/javascript">

      // Загрузить API для визуализации и пакет corechart.
      google.charts.load('current', {'packages':['corechart']});

      // Устанавливает функцию обратного вызова для выполнения, когда API визуализации Google загружается.
      google.charts.setOnLoadCallback(drawChart);

      // Обратного вызова, который создает и заполняет таблицу данных, создает круговую диаграмму, пропусков в данных и отображает его.
      function drawChart() {

        // Создать таблицу данных.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Population');
        data.addColumn('number', 'Population');
        data.addRows([


<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('cities_correct'); // здесь имя базы данных
	   
       $sql='SELECT count(*) AS cnt, iso_country FROM cities
	GROUP BY iso_country
	ORDER BY iso_country'; // здесь название таблицы
	   
	   
       $res=mysql_query($sql);
       
for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);

		 $iso_country=$row['iso_country']; // здесь название поля
         $cnt=$row['cnt'];
		 
		 
         print "
	             ['$iso_country', $cnt],
			";
	   }
	   	
       ?>

	   
		  
          
        ]);

        // Задать параметры диаграммы
        var options = {'title':'Global Population',
                       'width':700,
                       'height':500};

        // Инстанцировать и рисуем наш график, проходящий в несколько вариантов.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
    </script>
	 <div id="chart_div1"></div>
		  
</div>







<div class="tab-pane fade active in" id="сharts2">

  <script type="text/javascript">

      // Загрузить API для визуализации и пакет corechart.
      google.charts.load('current', {'packages':['corechart']});

      // Устанавливает функцию обратного вызова для выполнения, когда API визуализации Google загружается.
      google.charts.setOnLoadCallback(drawChart);

      // Обратного вызова, который создает и заполняет таблицу данных, создает круговую диаграмму, пропусков в данных и отображает его.
      function drawChart() {

        // Создать таблицу данных.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Cities in Region');
        data.addColumn('number', 'Cities in Region');
        data.addRows([


<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('cities_correct'); // здесь имя базы данных
	   
       $sql='SELECT count(*) AS cnt, region FROM cities
	GROUP BY region
	ORDER BY region'; // здесь название таблицы
	   
	   
       $res=mysql_query($sql);
       
for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);

		 $region=$row['region']; // здесь название поля
         $cnt=$row['cnt'];
		 
		 
         print "
	             ['$region', $cnt],
			";
	   }
	   	
       ?>

	   
		  
          
        ]);

        // Задать параметры диаграммы
        var options = {'title':'Cities in Region',
                       'width':700,
                       'height':500};

        // Инстанцировать и рисуем наш график, проходящий в несколько вариантов.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
	 <div id="chart_div2"></div>
	  
</div>

</div>
<form>
     Поиск: <input name="searchname">
	 <input type="submit" class="btn" value="Найти">
	</form>
	
			 <table class="table">
  <thead>
    <tr>
      <th>Регион:</th>
      <th><br>Название:</th>
           <th><br>Координаты:</th>
	  <th>Население:</th>
         </tr>
  </thead>
  <tbody>
<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('cities_correct'); // здесь имя базы данных
	   
       $sql='SELECT * FROM cities LIMIT 100'; // здесь название таблицы
	   
	   
	   $iso_country=$_GET['iso_country'];
	   if($iso_country)
          $sql="SELECT * FROM cities WHERE iso_country='$iso_country'";


	   $city_type=$_GET['city_type'];
		 if($city_type)
			$sql="SELECT * FROM cities WHERE city_type='$city_type'";
		
		
			   $region=$_GET['region'];
		 if($region)
			$sql="SELECT * FROM cities WHERE region='$region'";
		
		
		$searchname = $_GET['searchname'];
   if($searchname)
	   $sql = "SELECT * FROM cities WHERE names LIKE '%$searchname%' ";
   
   		$searchname = $_GET['searchname'];
   if($searchname)
	   $sql = "	 SELECT * FROM cities  WHERE name like '%$searchname%'
   UNION
SELECT * FROM (	  SELECT * FROM cities  
	WHERE abs(length(name)-length('$searchname'))<2
ORDER BY levenshtein(name, '$searchname')

 LIMIT 20
 ) AS sdf";
	   
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $id=$row['id']; // здесь название поля
		 $name1=$row['name1']; // здесь название поля
		 $name=$row['name']; // здесь название поля
		 $names=$row['names']; // здесь название поля
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $city_type=$row['city_type']; // здесь название поля
		 $iso_country=$row['iso_country']; // здесь название поля
		 $population=$row['population']; // здесь название поля
		 $year_created=$row['year_created']; // здесь название поля
		 $region=$row['region']; // здесь название поля
		 $name=str_replace("'"," ", $name);
		 $names=str_replace("'"," ", $names);
		 
		 

		 
         print "

   <tr>
      <td><b>$name</b></td>
         
     
      <td><b>$names</b></td>
          
    
      <td>$x, $y;</td>
      
  
     
      <td>$population</td>
     
   
      
      <td>$city_type</td>
	  
	   <td><button class=btn onclick='myMap.setCenter([$x, $y], 10)'>Перейти</button></td>
      
    </tr>
               
          
			";
	   }
       ?>
  </tbody>
</table>

</div>

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>

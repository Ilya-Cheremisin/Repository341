<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
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
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
			 <li> <form class="form-search"> 
     Поиск:<input name="searchname" class="input-medium search-query">
	 <input type="submit" value="Найти">
	</form>
			  
			<li>  <div class="btn-group">
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    Регион
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
	 <?
       $iso_country=$_GET['iso_country'];
	   $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
       $sql="SELECT DISTINCT region FROM cities WHERE iso_country='$iso_country'";
	   
	   
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
        
	print " <li>	<a href=?region=$region> Тип $region</a>";
	   }
       ?>
              
    <!-- dropdown menu links -->
  </ul>
</div>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
		  Выберите код страны
		  <ul class="nav nav-list">
		  <?
		  
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
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
		 $name=$row['name1'];
		 $region=$row['region'];
		 $year_created=$row['year_created'];
		 $population=$row['population'];
		 $city_type=$row['city_type'];
		 $iso_country=$row['iso_country'];
		 $cnt=$row['cnt'];
		 
		
		 $name1=str_replace("'", " ", $name1);
         print " 	<li> <a href=?iso_country=$iso_country> <br> Города $iso_country <img src='flags_iso/24/$iso_country.png'>  <span class=\"badge badge-success\">$cnt</span> </a>" ;
		 
		
	   }
       ?>
	   
	   
	   
            
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
		
		
		  <!--/Здесь сделайте вкладки:-->
		  <div class="bs-docs-example">
<ul id="myTab" class="nav nav-tabs">
<li class=""><a href="#home" data-toggle="tab">Диаграмма материки</a></li>
<li class="active"><a href="#profile" data-toggle="tab">Линейная диаграмма материки</a></li>
<li class="dropdown open">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Тип городов <b class="caret"></b></a>
<ul class="dropdown-menu">

<li> <?
       
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
       ?> </li>
</ul>
</li>
</ul>
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade" id="home">
<p> <html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
        
		  <?  // Вывод меток
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
       $sql='SELECT count(*) AS cnt, area FROM cities GROUP BY area'; // здесь название таблицы
	   
   
	   
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
		 $area=$row['area'];
		 $cnt=$row['cnt'];
		 
		
		 $name1=str_replace("'", " ", $name1);
		 $name_rus=str_replace("'", " ", $name_rus);
		
         print "
		['$area', $cnt],
		
			";
	   }
       ?>
        ]);

        // Set chart options
        var options = {'title':'Города материков',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
		var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
		
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
	   
  </body>
</html> 
 </p>
</div>
<div class="tab-pane fade active in" id="profile">
<p> <div id="chart_div2"></div> </p>
</div>
<div class="tab-pane fade" id="dropdown1">

</div>
<div class="tab-pane fade" id="dropdown2">
<p> </p>
</div>
</div>
</div>



          <div class="hero-unit">
             Map
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
   
   $region=$_GET['region'];
	   if($region)
	   $sql="SELECT * FROM cities WHERE region='$region'";
   
    $city_type=$_GET['city_type'];
	   if($city_type)
	   $sql="SELECT * FROM cities WHERE city_type='$city_type'";
 
	$searchname = $_GET['searchname'];
	
	
   if($searchname)
	  $sql="SELECT * FROM cities  
	WHERE abs(length(name1)-length('$searchname'))<2
	ORDER BY levenshtein(name1, '$searchname') LIMIT 10";
	   
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		 $name_rus=$row['names'];
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $name1=$row['name1'];
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
</div> <!-- end -->
  <br>      <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    
<table class="table">
   <thead>
    <tr>
      <th>Страна</th>
      <th>Название</th>
	  <th>Тип города</th>
	  <th>Население</th>
	  <th>Показать на карте</th>
    </tr>
  </thead>
  <?  // Вывод меток
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map'); // здесь имя базы данных
       $sql='SELECT * FROM cities Limit 100'; // здесь название таблицы
	   
	   $iso_country=$_GET['iso_country'];
	   if($iso_country)
	   $sql="SELECT * FROM cities WHERE iso_country='$iso_country'";
   
   $region=$_GET['region'];
	   if($region)
	   $sql="SELECT * FROM cities WHERE region='$region'";
   
    $city_type=$_GET['city_type'];
	   if($city_type)
	   $sql="SELECT * FROM cities WHERE city_type='$city_type'";
 
	$searchname = $_GET['searchname'];
	
	
   if($searchname)
	  $sql="SELECT * FROM cities  
	WHERE abs(length(name1)-length('$searchname'))<2
	ORDER BY levenshtein(name1, '$searchname') LIMIT 10";
	   
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name1=$row['name1']; // здесь название поля
		 $name_rus=$row['names'];
		 $x=$row['x']; // здесь название поля
		 $y=$row['y']; // здесь название поля
		 $name1=$row['name1'];
		 $region=$row['region'];
		 $year_created=$row['year_created'];
		 $population=$row['population'];
		 $city_type=$row['city_type'];
		 $iso_country=$row['iso_country'];
		 
		 
		
		 $name1=str_replace("'", " ", $name1);
		 $name_rus=str_replace("'", " ", $name_rus);
		
         print "
		 <tr>
      <td>$iso_country</td>
	  <td>$name1</td>
      <td>$city_type</td>
	  <td>$population</td>
	  <td> <input class=btn type=submit onclick='myMap.setCenter([$x, $y], 10)' </td>
    </tr>
			";
	   }
       ?>
</table>
      <hr>

      
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>


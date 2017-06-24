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
              <li class="active"><a href="#">График</a></li>
			  <li><a href="#about">Поиск</a></li>
			  <li> <form class="form-search">
			  
<input <input name="searchname"class="input-medium search-query">	
 <input type="submit" value="Найти">
 
	
</li>
              <li><a href="#contact">Contact</a></li>
			  
			  <div class="btn-group">
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    Кнопка
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
	<li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
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
		  Здесь будут ссылки на коды стран и т.д.
            <ul class="nav nav-list">
			<?
			
       $link=mysql_connect('localhost','root','');
       mysql_select_db('dislocation'); // здесь имя базы данных
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
		  $cnt=$row['cnt'];

		 $name1=str_replace("'", "", $name1);
		 
	   print "<a href=?iso_country=$iso_country> <br> Город $iso_country <span class=\"badge badge-success\">$cnt</span> 
	   <img src='flags_iso/24/$iso_country.png'> </a>";
	   }					  
      ?>
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span6">
		
		
		  Здесь сделайте вкладки:
		  <div class="bs-docs-example">
<ul id="myTab" class="nav nav-tabs">
<li class=""><a href="#home" data-toggle="tab">Диаграмма</a></li>
<li class="active"><a href="#profile" data-toggle="tab">Тип городов</a></li>
<li class=""><a href="#profile1" data-toggle="tab">Регоион</a></li>
<li class="dropdown open">
<li class=""><a href="#profile2" data-toggle="tab">Таблица</a></li>
<li class="dropdown open">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Графики<b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="#dropdown1" data-toggle="tab">Линейный</a></li>
</ul>
</li>
</ul>
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade" id="home">
<p><html>
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
         
		  
		  <? // вывод меток
				   
       $link=mysql_connect('localhost','root','');
       mysql_select_db('dislocation'); // здесь имя базы данных
       	$sql="SELECT count(*) AS cnt, area FROM cities GROUP BY area"; //фильтрация iso_country
	   
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
		 $area=$row['area'];
		 $cnt=$row['cnt'];
		 
		 	   
		 $name1=str_replace("'", "", $name1);
		 $name3=str_replace("'", "", $name3);
		 
		  print "['$area',$cnt],";
	   }
       ?>
        ]);

        // Set chart options
        var options = {'title':'Диаграмма',
                       'width':1000,
                       'height':900};

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
<div class="tab-pane fade" id="profile1">
<p> <? // вывод регионов
				   
       $link=mysql_connect('localhost','root','');
       mysql_select_db('dislocation'); // здесь имя базы данных
       $sql= "SELECT DISTINCT region FROM cities WHERE iso_country='$iso_country'";
	   
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
		 	 
		  print "$region";
			  
		}
       ?>
	   test   r5435353454
</p>
</div>
<div class="tab-pane fade active in" id="profile">
<p> <? include"type.php";?>
</p>
</div>
<div class="tab-pane fade" id="dropdown1">
<p><div id="chart_div2"></div></p>
</div>
<div class="tab-pane fade" id="dropdown2">

	
		
		  </div>
		  
		  


		  <div class="tab-pane fade" id="profile2">  
		    <table class="table table-striped">
		  <thead>
    <tr>
      <th>Город</th>
      <th>Регион</th>
	  <th>Поиск</th>
	  <th>Население</th>
	  <th>Код</th>
	  <th>Тип города</th>
	  <th>Год основания</th>
    </tr>
  </thead>
		  
		  
		   <? include"table.php";?>
	
	
		  </table>
		  
		</div>
</div>
</div>



        
	

    <title>Быстрый старт. Размещение интерактивной карты на странице</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=tr_TR" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap
            

        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [55.76, 37.64],
                zoom: 1,
				controls: ['smallMapDefaultSet']
		   }); 
		   
		   myMap.controls.add('routeEditor');
		   myMap.controls.add('trafficControl');
            
           // myPlacemark = new ymaps.Placemark([55.76, 37.64],
			//{
              //  hintContent: 'Москва!',
                //balloonContent: 'Столица России',
            //});
            
            //myMap.geoObjects.add(myPlacemark);
        			
			       <? include"metci.php";
       
	
		?>
		}
		
    </script>









         

      <hr>

	  
	 
	    </div>
		
		<div class=span3>
				
				    <div id="map" style="width: 100%; height: 400px">
						<a href="?iso_country=RU"> Город России </a>
					</div>

		</div>
		</div>
		
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

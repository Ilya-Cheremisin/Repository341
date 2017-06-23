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
        padding-top: 100px;
        padding-bottom: 100px;
      }
      .sidebar-nav {
        padding: 15px 0;
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
          <a class="brand" href="#">Карта</a>


   <ul class="nav">
			  
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    Кнопка
    <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
	<?
	   $iso_country=$GET_['iso_country'];
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql="SELECT DISTINCT region FROM cities WHERE iso_country='$iso_country'"; // здесь название таблицы
       
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
		 <li><a href=?region=$region><br>Регион:$region</a>
		 ";
	   }
       ?>
	
    </ul>
  
    <form>
     Поиск:<input name="searchname">
	 <input type="submit" value="Найти">
	</form>
	  
  
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
	
		 <ul class="nav nav-list">
		 
		 <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql="SELECT count(*) AS cnt, iso_country FROM cities
	   GROUP BY iso_country
	   ORDER BY iso_country"; // здесь название таблицы
       
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
		 $cnt=$row['cnt']; // здесь название поля
		 
		 $name1=str_replace("'"," ", $name1);
		 
         print "
		 
		 <li><a href=?iso_country=$iso_country><br>Города:$iso_country <img src='flags_iso/32/$iso_country.png'><span class=\"badge badge-success\">$cnt</span></a>
		 
		 
		 ";
	   }
       ?>
		 
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>

            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
		
		
		 
		  <div class="bs-docs-example">
		  	 
<ul id="myTab" class="nav nav-tabs">

<li class=""><a href="#home" data-toggle="tab">График 1</a></li>
<li class="active"><a href="#profile" data-toggle="tab">График 2</a></li>

<li class="dropdown open">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Типы городов <b class="caret"></b></a>
<ul class="dropdown-menu">
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
		 <li><a href=?city_type=$city_type><br>Тип города:$city_type</a>
		 ";
	   }
       ?>

</ul>
</li>
</ul>
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade" id="home">
<html>
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
          
		  
		  	   <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql="SELECT count(*) AS cnt, area FROM cities GROUP BY area "; // здесь название таблицы
       
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
		 $area=$row['area']; // здесь название поля
		 $cnt=$row['cnt']; // здесь название поля
		 
		 $name1=str_replace("'"," ", $name1);
		 
         print " ['$area', $cnt],
		 ";
	   }
       ?>
        ]);

        // Set chart options
        var options = {'title':'Сколько городов на материках',
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
</div>
<div class="tab-pane fade active in" id="profile">
	<div id="chart_div2"></div>
</div>
<div class="tab-pane fade" id="dropdown1">
<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
</div>
<div class="tab-pane fade" id="dropdown2">
<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
</div>
</div>
</div>


<div class="hero-unit">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>Map</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=tr_TR" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap 
           
        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [56.84, 60.61],
                zoom: 2
            }); 
            
			       <?// вывод меток
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql='SELECT * FROM cities LIMIT 100'; // здесь название таблицы
       
	   $iso_country =$_GET['iso_country'];
	   if ($iso_country)
		   $sql="SELECT*FROM cities
	   WHERE iso_country='$iso_country'";
	   
	   	   $region =$_GET['region'];
	   if ($region)
		   $sql="SELECT*FROM cities
	   WHERE region='$region'";
	   
	   	   $city_type =$_GET['city_type'];
	   if ($city_type)
		   $sql="SELECT*FROM cities
	   WHERE city_type='$city_type'";
	   
	   $searchname = $_GET['searchname'];
	   if($searchname)
       $sql="SELECT * FROM cities WHERE abs(length(name)-length('$searchname'))<2
	ORDER BY levenshtein(name, '$searchname') LIMIT 10";
       
	   
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
		 $city_type=$row['city_type']; // здесь название поля
		 
		 $name1=str_replace("'"," ", $name1);
		 $name_rus=str_replace("'"," ", $name_rus);
		  
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$name_rus',
                balloonContent: '<b> Регион: $region</b> <br> Код: $iso_country <br> Население: $population <br> Код города: $city_type'
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

            
          </div>
		  
		  <br><br><br>
		  
<table class="table">
 
 <thead>
    <tr>
      <th>Город</th>
      <th>Регион</th>
	  <th>Код</th>
	  <th>Население</th>
	  <th>Тип города</th>
	  <th>кнопка</th>
	  <th>кнопка2</th>
    </tr>
  </thead>
  

 <?// вывод меток
       $link=mysql_connect('localhost','root','');
       mysql_select_db('karta_nat'); // здесь имя базы данных
       $sql='SELECT * FROM cities LIMIT 100'; // здесь название таблицы
       
	   $iso_country =$_GET['iso_country'];
	   if ($iso_country)
		   $sql="SELECT*FROM cities
	   WHERE iso_country='$iso_country'";
	   
	   	   $region =$_GET['region'];
	   if ($region)
		   $sql="SELECT*FROM cities
	   WHERE region='$region'";
	   
	   	   $city_type =$_GET['city_type'];
	   if ($city_type)
		   $sql="SELECT*FROM cities
	   WHERE city_type='$city_type'";
	   
	   $searchname = $_GET['searchname'];
	   if($searchname)
       $sql="SELECT * FROM cities WHERE abs(length(name)-length('$searchname'))<2
	ORDER BY levenshtein(name, '$searchname') LIMIT 10";
       
	   
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
		 $city_type=$row['city_type']; // здесь название поля
		 
		  
         print " <tr>
      <th>$name1</th>
	  <th>$region</th>
      <th>$iso_country</th>
	  <th>$population</th>
	  <th>$city_type</th>
	  <th><input class=btn type=submit onclick='myMap.setCenter([$x, $y], 10)'></th>
	  
	  <th>
	  <button type='button' class='btn btn-primary btn-lg' onclick='myMap.setCenter([$x, $y], 10)'>Показать</button>
	  </th>
	 
	  
    </tr>
		 ";
	   }
       ?>
	   
	   </table>
		  
		  
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

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

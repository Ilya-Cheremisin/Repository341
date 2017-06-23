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
      #map {
      float: left;
      padding: 10px;
      height: 400px;
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

        <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
        <script type="text/javascript">
          ymaps.ready(init); // карта соберется после загрузки скрипта и элементов
          
          var myMap; // заглобалим переменную карты чтобы можно было ею вертеть из любого места
          
          function init () 
          { // функция - собиралка карты и фигни
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
            mysql_select_db('map'); // здесь имя базы данных


            $sql='SELECT * FROM cities limit 100'; // здесь название таблицы

            $iso_country=$_GET['iso_country'];

            if ($iso_country){
              $sql = "SELECT `iso_country`, `name`, `x`, `y` FROM cities where `iso_country`= '$iso_country'";
            }
            

            $res=mysql_query($sql);
            
            for($i=0; $i<mysql_num_rows($res);$i++)
            {
                $row=mysql_fetch_array($res);
                $name=$row['name']; // здесь название поля
                $name=str_replace("'", " ", $name);
                $x=$row['x']; // здесь название поля
                $y=$row['y']; // здесь название поля
                $About=$row['iso_country']; // здесь название поля
           
              print "

           myPlacemark = new ymaps.Placemark([$x, $y], 
           {
                     hintContent: '$name',
                     balloonContent: 'Название: $name'
                 }, 
                 {
                  iconImageHref: 'image/flags_iso/16/$About.png',
                  iconImageSize: [16, 16],
                  iconImageOffset: [-8, -8],
      
                 });

                 myMap.geoObjects.add(myPlacemark);

            ";
          }
          mysql_close($link);
          ?>


        }
        </script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Dinosaur', 'Length'],
              ['Acrocanthosaurus (top-spined lizard)', 12.2],
              ['Albertosaurus (Alberta lizard)', 9.1],
              ['Allosaurus (other lizard)', 12.2],
              ['Apatosaurus (deceptive lizard)', 22.9],
              ['Archaeopteryx (ancient wing)', 0.9],
              ['Argentinosaurus (Argentina lizard)', 36.6],
              ['Baryonyx (heavy claws)', 9.1],
              ['Brachiosaurus (arm lizard)', 30.5],
              ['Ceratosaurus (horned lizard)', 6.1],
              ['Coelophysis (hollow form)', 2.7],
              ['Compsognathus (elegant jaw)', 0.9],
              ['Deinonychus (terrible claw)', 2.7],
              ['Diplodocus (double beam)', 27.1],
              ['Dromicelomimus (emu mimic)', 3.4],
              ['Gallimimus (fowl mimic)', 5.5],
              ['Mamenchisaurus (Mamenchi lizard)', 21.0],
              ['Megalosaurus (big lizard)', 7.9],
              ['Microvenator (small hunter)', 1.2],
              ['Ornithomimus (bird mimic)', 4.6],
              ['Oviraptor (egg robber)', 1.5],
              ['Plateosaurus (flat lizard)', 7.9],
              ['Sauronithoides (narrow-clawed lizard)', 2.0],
              ['Seismosaurus (tremor lizard)', 45.7],
              ['Spinosaurus (spiny lizard)', 12.2],
              ['Supersaurus (super lizard)', 30.5],
              ['Tyrannosaurus (tyrant lizard)', 15.2],
              ['Ultrasaurus (ultra lizard)', 30.5],
              ['Velociraptor (swift robber)', 1.8]]);

            var options = {
              title: 'Lengths of dinosaurs, in meters',
              legend: { position: 'none' },
            };

            var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>






        


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
          <a class="brand" href="#">Шаблон на bootstrap</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Домой</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
     <div class="row-fluid">

    </div>

      <div class="row-fluid">
        <div class="span3">
        
        <p><a class="btn btn-info btn-mini" href="?iso_country=RU">Города России &raquo;</a></p>
          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Кнопка<span class="caret"></span> </a>
                <ul class="dropdown-menu">

                    <?
                      $link=mysql_connect('localhost','root','');
                      mysql_select_db('map'); // здесь имя базы данных


                      $sql="SELECT `iso_country` FROM cities group by `iso_country`"; // здесь название таблицы
                      
                      $res=mysql_query($sql);
                      
                      for($i=0; $i<mysql_num_rows($res);$i++)
                      {
                          $row=mysql_fetch_array($res);
                          $country=$row['iso_country']; // здесь название поля
                          $prn="?iso_country=$country";
                     
                        print "
                        <li><a href=$prn>$country</a></li>
                        ";
                    }
                    mysql_close($link);
                    ?>

                  </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          
          <div class="row-fluid" id="map"></div>
          <!--/ <div class="row-fluid" id="regions_div" style="height: 500px;></div>-->

          <div class="hero-unit" >

            <h3>Карта из Яндекс</h3>

          </div>
          <div id="chart_div" style="height: 400px;"></div>
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
    <script src="js/bootstrap.js"></script>
    <script src="js/dropdown.js"></script>


    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/plugins/CSSPlugin.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/easing/EasePack.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/TweenLite.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/jquery.gsap.min.js"></script>

  </body>
</html>

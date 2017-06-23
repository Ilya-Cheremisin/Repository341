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
    <link rel="stylesheet" href="css/font-awesome.min.css">


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
          { 
       
          <?
            $link=mysql_connect('localhost','root','');
            mysql_select_db('map'); // здесь имя базы данных


            $sql='SELECT * FROM cities limit 1'; // здесь название таблицы

            $iso_country=$_GET['iso_country'];
            $city_type=$_GET['city_type'];
            $searchname=$_GET['searchname'];
            $id=$_GET['id'];

            if ($id) 
            {
                $sql = "SELECT `id`, `iso_country`, `name`, `x`, `y` 
                        FROM cities 
                        where `id`= '$id'";

                $res=mysql_query($sql);
            
                $row=mysql_fetch_array($res);
                $name=$row['name']; // здесь название поля
                $name=str_replace("'", "", $name);
                $x=$row['x']; // здесь название поля
                $y=$row['y']; // здесь название поля
                $iso_country=$row['iso_country']; // здесь название поля
               
                print "
                // функция - собиралка карты и фигни
                myMap = new ymaps.Map(\"map\", { // создаем и присваиваем глобальной переменной карту и суем её в див с id=\"map\"
                      center: [$x, $y], // ну тут центр
                      behaviors: ['default', 'scrollZoom'], // скроллинг колесом
                      zoom: 8 // тут масштаб
                  });
                myMap.controls // добавим всяких кнопок, в скобках их позиции в блоке
                .add('zoomControl', { right: 5, top: 5 }) //Масштаб
              //.add('typeSelector') //Список типов карты
              //.add('mapTools', { left: 35, top: 5 }) // Стандартный набор кнопок
              //.add('searchControl'); // Строка с поиском

                myPlacemark = new ymaps.Placemark([$x, $y], 
                {
                 hintContent: '$name',
                 balloonContent: 'Название: $name'
                }, 
                {
                  iconImageHref: 'image/flags_iso/24/$iso_country.png',
                  iconImageSize: [24, 24],
                  iconImageOffset: [-12, -12],
          
                });

                myMap.geoObjects.add(myPlacemark);

                ";

            }
            else 
            {
                # code...
              

            if ($iso_country)
              {
                $sql = "SELECT `iso_country`, `name`, `x`, `y` 
                        FROM cities 
                        where `iso_country`= '$iso_country'";
              }

            if ($city_type)
              {
                $sql = "SELECT `iso_country`, `name`, `x`, `y` 
                        FROM cities 
                        where `city_type`= '$city_type'";
              }

            if ($searchname)
              {
                $sql = "SELECT `iso_country`, `name`, `x`, `y` 
                        FROM cities 
                        WHERE abs(length(name)-length('$searchname'))<2
                        ORDER BY levenshtein(name, '$searchname') 
                        LIMIT 10";
              }
            
            print "
              // функция - собиралка карты и фигни
              myMap = new ymaps.Map(\"map\", { // создаем и присваиваем глобальной переменной карту и суем её в див с id=\"map\"
                      center: [56.7888, 60.6034], // ну тут центр
                      behaviors: ['default', 'scrollZoom'], // скроллинг колесом
                      zoom: 2 // тут масштаб
                  });
              myMap.controls // добавим всяких кнопок, в скобках их позиции в блоке
              .add('zoomControl', { left: 5, top: 5 }) //Масштаб
              //.add('typeSelector') //Список типов карты
              //.add('mapTools', { left: 35, top: 5 }) // Стандартный набор кнопок
              //.add('searchControl'); // Строка с поиском

              ";


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
              ['Часть света', 'Города'],
                <?
                  $link=mysql_connect('localhost','root','');
                  mysql_select_db('map'); // здесь имя базы данных

                  $sql='SELECT count(*) AS cnt, area FROM cities GROUP BY area'; // здесь название таблицы

                  $res=mysql_query($sql);
                  
                  for($i=1; $i<mysql_num_rows($res);$i++)
                  {
                      $row=mysql_fetch_array($res);
                      $area=$row['area']; // здесь название поля
                      $cnt=$row['cnt']; // здесь название поля
                 
                      print "['$area', $cnt],";
                  }
                  mysql_close($link);
                ?>
              ]);

                var options = {
              title: 'Города по всему свету',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
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

            <ul class="nav">
              <li class="active"><a href="#">Домой</a></li>


            </ul>

            <form class="form-search" style="float: right;margin: 5px 5px">
              <div class="input-append">
                <input type="text" class="span2 search-query" name="searchname">
                <button type="submit" class="btn">Поиск</button>
              </div>
            </form>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
     <div class="row-fluid">

    </div>

      <div class="row-fluid">
        <div class="span2">
          <? include"city_btn.php";?>
        </div><!--/.well -->

        <div class="span10">

          <div class="bs-docs-example">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" ><i class="fa fa-map" aria-hidden="true"></i>
&nbsp;Карта Яндекс</a></li>
              <li><a href="#profile" data-toggle="tab"><i class="fa fa-tags" aria-hidden="true"></i>
&nbsp;Тип городов</a></li>
              <li><a href="#profile1" data-toggle="tab"><i class="fa fa-table" aria-hidden="true"></i>
&nbsp;Результаты поисков</a></li>
              <li class="dropdown">
    
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-area-chart" aria-hidden="true"></i>
&nbsp;Графики<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#dropdown1" data-toggle="tab">Объемный круг</a></li>
                  <li><a href="#dropdown2" data-toggle="tab">111</a></li>
                </ul>
                
              </li>
            </ul>

        <div id="myTabContent" class="tab-content">


          <div class="tab-pane active" id="home">
            <div class="row-fluid" id="map" style="float: left;height: 500px"></div>
            <!--/ <div class="row-fluid" id="regions_div" style="height: 500px;></div>-->
            <div class="hero-unit" >
              <h3>Карта из Яндекс</h3>
            </div>
          </div>

          <div class="tab-pane" id="profile">
            <p> <? include"type.php";?> </p>
          </div>

          <div class="tab-pane" id="profile1">
                <table class="table table-condensed">
                  <caption>Таблица указанных городов</caption>
                  <thead>
                    <tr>
                      <th>Название города</th>
                      <th>Id</th>
                      <th>Сокращение страны</th>
                      <th>X</th>
                      <th>Y</th>
                    </tr>
                  </thead>
                  <tbody>
                    <? include"table.php";?>
                  </tbody>
                </table>
          </div>

          <div class="tab-pane" id="dropdown1">
            <div id="piechart_3d" style="height: 400px;"></div>
          </div>

          <div class="tab-pane" id="dropdown2"></div>
  
        </div><!--/span-->
      </div><!--/row-->
      </div>

      <hr>

      <footer>
        <p>&copy; ЗБИ-341/14 2017</p>
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

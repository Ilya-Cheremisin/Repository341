        ymaps.ready(init); // карта соберется после загрузки скрипта и элементов
        
        var myMap; // заглобалим переменную карты чтобы можно было ею вертеть из любого места
        
        function init () 
        { // функция - собиралка карты и фигни
            myMap = new ymaps.Map("map", { // создаем и присваиваем глобальной переменной карту и суем её в див с id="map"
                    center: [56.7888, 60.6034], // ну тут центр
                    behaviors: ['default', 'scrollZoom'], // скроллинг колесом
                    zoom: 3 // тут масштаб
                });
            myMap.controls // добавим всяких кнопок, в скобках их позиции в блоке
            .add('zoomControl', { left: 5, top: 5 }) //Масштаб
            .add('typeSelector') //Список типов карты
            .add('mapTools', { left: 35, top: 5 }) // Стандартный набор кнопок
            .add('searchControl'); // Строка с поиском
     
        //<?
          $link=mysql_connect('localhost','root','');
          mysql_select_db('map'); // здесь имя базы данных


          $sql='SELECT * FROM cities limit 100'; // здесь название таблицы

          $iso_country=$_GET['iso_country'];

          if ($iso_country){
            $sql = "SELECT * FROM cities where `COL 9`= '$iso_country'";
          }
          

          $res=mysql_query($sql);
          
          for($i=0; $i<mysql_num_rows($res);$i++)
          {
              $row=mysql_fetch_array($res);
        $name=$row['COL 3']; // здесь название поля
        $name=str_replace("'", " ", $name);
        $x=$row['COL 5']; // здесь название поля
        $y=$row['COL 6']; // здесь название поля
        $About=$row['COL 9']; // здесь название поля
         
            print "

         myPlacemark = new ymaps.Placemark([$x, $y], 
         {
                   hintContent: '$name',
                   balloonContent: 'Название: $name'
               }, 
               {
                iconImageHref: 'flags_iso/16/$About.png',
                iconImageSize: [16, 16],
                iconImageOffset: [-8, -8],
    
               });

               myMap.geoObjects.add(myPlacemark);

          ";
        }
        //?>


      }
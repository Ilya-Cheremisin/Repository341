<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>������� �����. ���������� ������������� ����� �� ��������</title>
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
                hintContent: '������!',
                balloonContent: '������� ������'
            });
            
            myMap.geoObjects.add(myPlacemark);
			<?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('dislocation'); // ����� ��� ���� ������
       $sql='SELECT * FROM map'; // ����� �������� �������
       $res=mysql_query($sql);
       
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
         $row=mysql_fetch_array($res);
		 $name=$row['Name']; // ����� �������� ����
		 $x=$row['Latitude']; // ����� �������� ����
		 $y=$row['Longitude']; // ����� �������� ����
		 
         print "
		 myPlacemark = new ymaps.Placemark([$x, $y], {
                hintContent: '$Name',
                balloonContent: '��� �������� ����!'
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

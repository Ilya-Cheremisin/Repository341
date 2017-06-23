<?
	$link=mysql_connect('localhost','root','');
	mysql_select_db('map'); // здесь имя базы данных


	$iso_country=$_GET['iso_country'];
  $city_type=$_GET['city_type'];
  $searchname=$_GET['searchname'];
  $id=$_GET['id'];
  

    if ($id) 
      {
        $sql = "SELECT `id`, `iso_country`, `name`, `x`, `y` 
                FROM cities 
                where `id`= '$id'
                GROUP BY `id`";
      }

    if ($iso_country)
      {
        $sql = "
        SELECT `id`, `iso_country`, `name`, `x`, `y` 
        FROM cities 
        where `iso_country`= '$iso_country'
        GROUP BY `id`";
      }

    if ($city_type)
      {
        $sql = "
        SELECT `id`, `iso_country`, `name`, `x`, `y` 
        FROM cities 
        where `city_type`= '$city_type'
        GROUP BY `id`";
      }

    if ($searchname)
      {
        $sql = "
        SELECT `id`, `iso_country`, `name`, `x`, `y` 
        FROM cities 
        WHERE abs(length(name)-length('$searchname'))<2 
        ORDER BY levenshtein(name, '$searchname') 
        GROUP BY `id`
        LIMIT 10";
      }
                      
	$res=mysql_query($sql);
                      
	for($i=0; $i<mysql_num_rows($res);$i++)
		{
			$row=mysql_fetch_array($res);
            $id=$row['id'];
            $name=$row['name']; // здесь название поля
            $name=str_replace("'", "", $name);
            $x=$row['x']; // здесь название поля
            $y=$row['y']; // здесь название поля
            $iso_country=$row['iso_country']; // здесь название поля  
                     
			print "
				<tr>
          <td><a href=\"#home\" onclick=\"myMap.setCenter([$x, $y], 10); $('#myTab a:first').tab('show');\"><img src=\"image/flags_iso/16/$iso_country.png\"> $name</a> </td>
          <td>$id</td>
          <td>$iso_country</td>
          <td>$x</td>
          <td>$y</td>
        </tr>
			";
		}

	mysql_close($link);
?>
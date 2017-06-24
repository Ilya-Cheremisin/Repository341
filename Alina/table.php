		
			       <? // вывод меток
				   
       $link=mysql_connect('localhost','root','');
       mysql_select_db('map12'); // здесь имя базы данных
       $sql='SELECT * FROM cities LIMIT 100'; // здесь название таблицы
	   
	   $iso_country=$_GET['iso_country'];
	   if($iso_country)
		$sql="SELECT * FROM cities WHERE iso_country='$iso_country'"; //фильтрация iso_country
	   
	   
	    $searchname = $_GET['searchname'];
            if($searchname)
	    $sql = "SELECT * FROM cities  
	          WHERE abs(length(name1)-length('$searchname'))<2
	          ORDER BY levenshtein(name1, '$searchname') LIMIT 10";
	   
	   
	   $searchname2 = $_GET['searchname2'];
            if($searchname2)
	    $sql = "SELECT * FROM cities WHERE name3 LIKE '%$searchname2%' ";
	   
	   
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
		 
	
		 
		  print "<tr  class=\"error\">
        <td> $name1 </td>
        <td> $region </td>
		<td> '<input type=submit  class=btn  onclick='myMap.setCenter([$x, $y], 10)' </td>
		<td> $population </td>
		<td> $iso_country </td>
		<td> $city_type </td>
		<td>$year_created</td>
 
       </tr>";
			  
			  
		}
       ?>



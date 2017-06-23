<?
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
                      mysql_select_db('map'); // здесь имя базы данных

                      $sql="SELECT `COL 9` FROM cities group by `COL 9`";
                      $res=mysql_query($sql);

                      
                      for($i=0; $i<mysql_num_rows($res);$i++)
                      {
                          $row=mysql_fetch_array($res);
                          $country=$row['COL 9']; 

                          $sql2="SELECT COUNT(*) as cn FROM `cities` WHERE `COL 9`='$country'";
                          $res2=mysql_query($sql2);
                          $row2=mysql_fetch_array($res2);
                          $cn=$row2['cn'];

                        print "
                        ['$country', $cn],
                        ";
                    }
                    ?>
              
            ]);
    
            // Set chart options
            var options = {'title':'Страны по количеству городов!'};
    
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
?>
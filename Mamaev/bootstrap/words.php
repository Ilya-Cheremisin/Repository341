 <form>	 
 <input name=search id=search>
 <input type=submit>
 </form>
 
 <?PHP

$LangEn = array("&","q","w","e","r","t","y","u","i","o","p","[","]",
                   "a","s","d","f","g","h","j","k","l",";","'",
                   "z","x","c","v","b","n","m",",",".","/",
                   "Q","W","E","R","T","Y","U","I","O","P","[","]",
                   "A","S","D","F","G","H","J","K","L",";","'",
                   "Z","X","C","V","B","N","M",",","/");
$LangRu = array("?","й","ц","у","к","е","н","г","ш","щ","з","х","ъ",
                   "ф","ы","в","а","п","р","о","л","д","ж","э",
                   "я","ч","с","м","и","т","ь","б","ю",".",
                   "Й","Ц","У","К","Е","Н","Г","Ш","Щ","З","Х","Ъ",
                   "Ф","Ы","В","А","П","Р","О","Л","Д","Ж","Э",
                   "Я","Ч","С","М","И","Т","Ь","Б","Ю",".");
$ModePower = 1; // 1 -> C английскогон на русский // 2 -> С русского на английский
switch($ModePower){
case 1: print(str_replace($LangEn,$LangRu, $text)); break;
case 2: print(str_replace($LangRu,$LangEn, $text)); break;
}
 
?>

 <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('words'); // здесь имя базы данных
	   $search=$_GET['search'];
	   $sql=" SELECT word FROM words  
	WHERE abs(length(word)-length('$search'))<2
	ORDER BY levenshtein(word,'$search') limit 10";
	   
	   $res=mysql_query($sql);
       print "<div>";
	   print ($sql);
       for($i=0; $i<mysql_num_rows($res);$i++)
       {
		 print "<div>";
         $row=mysql_fetch_array($res);
		 $nameen=$row['words']; // здесь название поля
		 $id=$row['words']; // здесь название поля
         print $id;
		 print " ";
	   }
       ?>
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
$LangRu = array("?","�","�","�","�","�","�","�","�","�","�","�","�",
                   "�","�","�","�","�","�","�","�","�","�","�",
                   "�","�","�","�","�","�","�","�","�",".",
                   "�","�","�","�","�","�","�","�","�","�","�","�",
                   "�","�","�","�","�","�","�","�","�","�","�",
                   "�","�","�","�","�","�","�","�","�",".");
$ModePower = 1; // 1 -> C ������������ �� ������� // 2 -> � �������� �� ����������
switch($ModePower){
case 1: print(str_replace($LangEn,$LangRu, $text)); break;
case 2: print(str_replace($LangRu,$LangEn, $text)); break;
}
 
?>

 <?
       $link=mysql_connect('localhost','root','');
       mysql_select_db('words'); // ����� ��� ���� ������
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
		 $nameen=$row['words']; // ����� �������� ����
		 $id=$row['words']; // ����� �������� ����
         print $id;
		 print " ";
	   }
       ?>
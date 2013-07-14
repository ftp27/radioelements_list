<?
$query = "SELECT * FROM `places`";
$res = mysql_query($query);
if ($res) {
        echo "<ul>";
        echo "<li>";
        if ($_GET['class'] == 'all') {
         echo "<b>Все</b>";
        } else {
         echo "<a href='?class=all'>Все</a>";
        }
        echo "</li>";
	while($row = mysql_fetch_array($res))
	{
		echo "<li>";
                if ($_GET['place'] == $row['id']) {
		 echo "<b>".$row['place']."</b>";
                } else {
		 echo "<a href='?place=".$row['id']."'>".$row['place']."</a>";
		}
                echo "</li>";
	}
        echo "</ul>";
}
?>

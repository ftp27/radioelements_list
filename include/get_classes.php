<?
$query = "SELECT * FROM `classes`";
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
                if ($_GET['class'] == $row['id']) {
		 echo "<b>".$row['class']."</b>";
                } else {
		 echo "<a href='?class=".$row['id']."'>".$row['class']."</a>";
		}
                echo "</li>";
	}
        echo "</ul>";
}
?>

<?
$query = "SELECT * FROM `statuses`";
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
                if ($_GET['status'] == $row['id']) {
		 echo "<b>".$row['status']."</b>";
                } else {
		 echo "<a href='?status=".$row['id']."'>".$row['status']."</a>";
		}
                echo "</li>";
	}
        echo "</ul>";
}
?>

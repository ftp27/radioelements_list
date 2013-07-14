<?
$attrs = "";
if (is_numeric($_GET["class"])) {
$attrs .= "&class=".$_GET["class"];
}
if (is_numeric($_GET["class"])) {
$attrs .= "&status=".$_GET["status"];
}
if (isset($_GET["q"])) {
$attrs .= "&q=".$_GET["q"];
}

$query = "SELECT * FROM `places`";
$res = mysql_query($query);
if ($res) {
        echo "<ul>";
        echo "<li>";
        if (!is_numeric($_GET['place'])) {
         echo "<b>Все</b>";
        } else {
         echo "<a href='?place=all".$attrs."'>Все</a>";
        }
        echo "</li>";
	while($row = mysql_fetch_array($res))
	{
		echo "<li>";
                if ($_GET['place'] == $row['id']) {
		 echo "<b>".$row['place']."</b>";
                } else {
		 echo "<a href='?place=".$row['id'].$attrs."'>".$row['place']."</a>";
		}
                echo "</li>";
	}
        echo "</ul>";
}
?>

<?
$attrs = "";
if (is_numeric($_GET["class"])) {
$attrs .= "&class=".$_GET["class"];
}
if (is_numeric($_GET["place"])) {
$attrs .= "&place=".$_GET["place"];
}
if (isset($_GET["q"])) {
$attrs .= "&q=".$_GET["q"];
}

$query = "SELECT * FROM `statuses`";
$res = mysql_query($query);
if ($res) {
        echo "<ul>";
        echo "<li>";
        if (!is_numeric($_GET['status'])) {
         echo "<b>Все</b>";
        } else {
         echo "<a href='?status=all".$attrs."'>Все</a>";
        }
        echo "</li>";
	while($row = mysql_fetch_array($res))
	{
		echo "<li>";
                if ($_GET['status'] == $row['id']) {
		 echo "<b>".$row['status']."</b>";
                } else {
		 echo "<a href='?status=".$row['id'].$attrs."'>".$row['status']."</a>";
		}
                echo "</li>";
	}
        echo "</ul>";
}
?>

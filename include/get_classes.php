<?
$attrs = "";
if (is_numeric($_GET["place"])) {
$attrs .= "&place=".$_GET["place"];
}
if (is_numeric($_GET["class"])) {
$attrs .= "&status=".$_GET["status"];
}
if (isset($_GET["q"])) {
$attrs .= "&q=".$_GET["q"];
}

$query = "SELECT * FROM `classes`";
$res = mysql_query($query);
if ($res) {
        echo "<ul>";
        echo "<li>";
        if (!is_numeric($_GET['class'])) {
         echo "<b>Все</b>";
        } else {
         echo "<a href='?class=all".$attrs."'>Все</a>";
        }
        echo "</li>";
	while($row = mysql_fetch_array($res))
	{
		echo "<li>";
                if ($_GET['class'] == $row['id']) {
		 echo "<b>".$row['class']."</b>";
                } else {
		 echo "<a href='?class=".$row['id'].$attrs."'>".$row['class']."</a>";
		}
                echo "</li>";
	}
        echo "</ul>";
}
?>

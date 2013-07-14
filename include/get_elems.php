<?
 $sql = "SELECT  e.id AS `id`, e.name AS `name`, e.description AS `description`, ".
		"c.class AS `class`, p.place AS `place`, s.status AS `status`, ".
                "e.count AS `count`, c.id as class_id, p.id AS place_id, s.id AS status_id ".
		"FROM	`elems` AS e, ".
		       	"`classes` AS c,".
			"`places` AS p,".
			"`statuses` AS s ".
		"WHERE e.class = c.id AND e.place = p.id AND e.status = s.id";
 // Filter by Class
 if (is_numeric($_GET["class"])){
 	$sql .= " AND e.class = '".$_GET["class"]."'";
 } 
 // Filter by Place
 if (is_numeric($_GET["place"])) {
 	$sql .= " AND p.id = '".$_GET["place"]."'";
 } 
 // Filter by Status
 if (is_numeric($_GET["status"])) {
        $sql .= " AND s.id = '".$_GET["status"]."'";
 }
 // Search 
 if (isset($_GET["q"])) {
	$search = mysql_escape_string($_GET["q"]);
        $sql .= " AND (".
			"e.name LIKE '%".$search."%' OR ".
			"e.description LIKE '%".$search."%'".
		")";
 }
 $sql = mysql_query($sql);
 while ($elem = mysql_fetch_array($sql)) {
  ?>
   <div class="item">
    <div class="title"><?=$elem['name']?></div>
    <a class="type" href="?class=<?=$elem['class_id']?>"><?=$elem['class']?></a>
    <a class="status" href="?status=<?=$elem['status_id']?>"><?=$elem['status']?></a>
    <div class="cleaner"></div>
    <div class="count"><?=$elem['count']?> шт.</div>
    <a class="place" href="?place=<?=$elem['place_id']?>"><?=$elem['place']?></a>
    <div class="decription"><?=$elem['description']?></div>
   </div>
  <?
 }


?>

<?
include "core/core.php";
?>
<html>
<head>
<title>Список радиоэлементов</title>
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
<link href="css/index.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>
<div class="root">
 <div class="layout">
  <div class="header">
   Список радиоэлементов
  </div>
  <div class="left_column">
   <?
   // Change title
   if (is_numeric($_GET["class"])) {
   ?>
    <div class="table_title">
     <?
      $title = mysql_query("SELECT `class` FROM `classes` WHERE `id` = '".$_GET["class"]."'");
      if ($title) {
       $title = mysql_fetch_array($title);
       echo $title["class"];
      }
     ?>
    </div>
   <?
   }
   ?>
   <div class="search_panel">
	<form accept-charset="UTF-8" action="?act=search" id="search_items" method="get">
		<div style="margin:0;padding:0;display:inline">
		<?
			 if (is_numeric($_GET["class"])){
			echo '<input name="class" type="hidden" value="'.$_GET["class"].'">';
			 } 
			 if (is_numeric($_GET["place"])) { 
			echo '<input name="place" type="hidden" value="'.$_GET["place"].'">';
			 }
			 if (is_numeric($_GET["status"])) {
			echo '<input name="status" type="hidden" value="'.$_GET["status"].'">';
			 }
		?>
		</div>
		<input class="search_field" id="q" name="q" placeholder="Поиск..." size="60" type="text" value="<?=$_GET["q"]?>">
	</form>
	<?
	if ($user_level == 1) {
	?>
		<a href="?act=new-elem" class="button_new"><div class="icon_add">Добавить</div></a>
	<? 
	}
	?>
   </div>
   <div class="cleaner"></div>
   <div class="elems_list">
    <?
     include "include/get_elems.php";
    ?>
   </div> 
</div>
<div class="right_column">
  <div class="right_column">  
   <div class="block_classes">
    <div class="title">
     РАЗДЕЛЫ
    </div>
    <div class="double_line"></div>
    <?
     include "include/get_classes.php";
    ?>
   </div> 
  </div>
  <div class="right_column">  
   <div class="block_classes">
    <div class="title">
     РАССПОЛОЖЕНИЕ
    </div>
    <div class="double_line"></div>
    <?
     include "include/get_places.php";
    ?>
   </div> 
  </div>
  <div class="right_column">  
   <div class="block_classes">
    <div class="title">
     СТАТУС
    </div>
    <div class="double_line"></div>
    <?
     include "include/get_status.php";
    ?>
   </div> 
  </div>
  <div class="right_column">  
   <div class="block_classes">
    <div class="title">
     АВТОРИЗАЦИЯ
    </div>
    <div class="double_line"></div>
    <?
     include "include/login.php";
    ?>
   </div> 
  </div>
 </div>
</div>
</div>
</body>
</html>

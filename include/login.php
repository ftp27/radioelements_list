<?
if ($user_level == 1) { ?>
<div class="user_info">
	<?=$login?>
</div>
<img class="avatar" src="css/img/avatars/<?=$login_id?>.jpg">
<div class="cleaner"></div>
<a href="?act=logout">Выход</a>
<?
} else {
?>
<form action="?act=login" method="POST">
<dl>
	<dt>Логин:</dt>
	<dd><INPUT NAME="login" class="login_input"></dd>
</dl>
<dl>
	<dt>Пароль:</dt>
	<dd><INPUT TYPE="password" NAME="pass" class="login_input"><dd>
</dl>
<input type="submit" style="visibility: hidden; mergin: 0px; height: 0px"/>
</form>
<?
}
?>

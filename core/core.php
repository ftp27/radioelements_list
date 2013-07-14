<?  
	session_start(); 

	#error_reporting(0);
	
	include "config.conf";

	$db=mysql_connect($host,$user,$pwd) 
		or die("Could not connect: ".mysql_error());
	mysql_select_db($db_name,$db) 
		or die("Could not connect to DB: ".mysql_error()); 
	mysql_query("set NAMES utf8");	

	// Get data from POST
	$act = $_GET["act"];
	if (($act == "login") && isset($_POST["login"])) {
		// Login...
		$sql = "SELECT * FROM `users`";
		$result = mysql_query($sql);
		$user_level = 0;
	        while ($row = mysql_fetch_assoc($result)) {
			if ($_POST["login"] == $row["login"]) {
				if (md5(md5($_POST["pass"])."radio") == $row["pass"]) {
					$_SESSION['userid'] = md5(md5($row['login']).$row['pass'].$_SERVER['HTTP_X_REAL_IP']);
					$login = $row["login"];
					$login_id = $row["id"];
					$user_level = 1;
				} else {
					$user_level = -1;     
				}
			}
		}
		if ($user_level == 0) {
			$user_level = -1;
		}
	} 
	if ($act == "logout") {
		session_unset();
		session_destroy();	
		$user_level = 0;
	}

	
	// Get user data 
	if (!isset($user_level)) {
		$result = mysql_query("SELECT * FROM `users`");
		$user_level = 0;
		while ($row = mysql_fetch_assoc($result)) {
			if ($_SESSION['userid'] == md5(md5($row['login']).$row['pass'].$_SERVER['HTTP_X_REAL_IP'])) {
				$user_level = 1;
				$login = $row['login']; 
				$login_id = $row['id'];
			}
		}
		if ($user_level == 0) { 
			$user_level = -1;
		}
	}
	
?>

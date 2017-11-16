<?php require_once('templates/top.php');

	$scripts = array('media/parse.js');
	
	if($_SESSION['user_id']){
		?>
	<a href='#' id = "google_click">Click to parse picture from Google</a>
	<div id="empty"></div>
<?		
	}
?>
<?php require_once('templates/bottom.php')?>
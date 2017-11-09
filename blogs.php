<?php require_once('templates/top.php');
if(isset($_GET['url'])){
	$url=$_GET['url'];
} else {
	$url='index';
}

$id=(int)$_GET['id'];
$query="SELECT*FROM blogs WHERE type='main'";
$adr=mysqli_query($bd_con, $query);
	if(!$adr){
		exit($query);
	}
	while($tb_blog = mysqli_fetch_array($adr));

	<a href='blog.php?id=<?=$tbl_blog['id']?>' class='link'>
	<?=$tbl_blog['name']?>
	</a>

?>
    <h2>
		<?=$tbl_blog['name']?>
	</h2>
		<?=$tbl_blog['body']?>
		
<?php require_once('templates/bottom.php')?>
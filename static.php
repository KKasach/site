<?php require_once('templates/top.php');
if(isset($_GET['url'])){
	$url=$_GET['url'];
} else {
	$url='index';
}

$query="SELECT*FROM maintexts WHERE url ='$url'";
$adr = mysqli_query($db_con, $query);
if(!$adr){
	exit($query);
} $tbl_maintext = mysqli_fetch_array($adr);
/*
echo '<pre>';
print_r($tbl_maintext);
echo'</pre>'*/


/*

$id=(int)$_GET['id'];

$query="SELECT*FROM blogs WHERE type='main'";
$adr=mysqli_query($bd_con, $query);
if(!$adr){
	exit($query);
}
while($tb_blog = mysqli_fetch_array($adr));

<a href='catalog.php?id=<?=$tbl_catalog['id']?>' class='link'>
<?=$tbl_catalog['name']?>
</a>
*/

?>
    <div class="container">
		<h2>
			<?=$tbl_maintext['name'];?>
		</h2>
	</div>
	
<!--
<h2>
<?=$tbl_catalog['name']?>
</h2>
<?=$tbl_catalog['body']?>
-->
	
	
<?php require_once('templates/bottom.php')?>




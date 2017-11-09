<?php require_once('templates/top.php');
if($_SESSION['user_id']){
		
<table width="100%" class="table table-bordered" >
	<tr>
		<th>Photo</th>
		<th>Name</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
	<?php
		$query = "SELECT * FROM products WHERE user_id = ".$_SESSION['user_id'];
		$adr = mysqli_query($db_con, $query);
		if(!$adr){
			exit('error');
		} 
		while($prod = mysqli_fetch_array($adr)){
	?>
	<tr>
	<td width="200px">
	<?
		if($prod['picture'] !=''){
			$pic ='/media/uploads/'.$prod['picture'];
		} else {
			$pic = '/media/img/no_photo.png';
		}
	$id = (int)$prod['id'];
	?>
	<img src="<?php echo $pic; ?>" width="100%" class = "pic"/>
	</td>
	<td><?php echo $prod['name']?></td>
	<td><?php echo $prod['price']?></td>
	<td class ="action">
		<a href="#" class="edit">EDIT</a>
		<a href="#" onclick="delete_position('proddel.php?id=<?php echo $id?>', 'Вы действительно хотите удалить данный товар?')" class="delete">DELETE</a>
	</td>
</tr>
<?	
}
?>

</table>
	<?php
} else{
	?>
	<div class = "error">Ошибка доступа</div>
	<?
}
?>
<?php require_once('templates/bottom.php');?>
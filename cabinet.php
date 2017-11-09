<?php require_once('templates/top.php');
if($_SESSION['user_id']){
	
	if($_POST){
		$pname = $_POST['name'];
		$pbody = $_POST['body'];
		$pcatalog_id = $_POST['catalog_id'];
		
			//echo"<pre>";
		//print_r($_POST);
			//echo"</pre>";
	if($_FILES){
		
		//$_FILES['picture']['name'];
		//$_FILES['picture']['type'];
		//$_FILES['picture']['tmp_name'];
		//$_FILES['picture']['error'];
		//$_FILES['picture']['size'];
			//echo"<pre>";
				//print_r($_FILES);
			//echo"</pre>";
		
		$file_name_tmp = $_FILES['picture']['tmp_name'];
		$dir = '/media/uploads/';
		$file_new_name = $_SERVER['DOCUMENT_ROOT'].$dir	;
		//$picture=$_FILES['picture']['name'];
		$picture = date('y_m_d_h_i_s').'.jpg';
			if(move_uploaded_file($file_name_tmp, $file_new_name.$picture)){
				$ok = true;
			}
			
	} else {
		$picture = '';
			echo "no file";
	}
	
	$query = "INSERT INTO products VALUES(
	
	NULL,
	'$pname',
	'$pbody',
	'$picture',
	'-',
	'0',
	NOW(),
	'-',
	'".date('ymdhis')."',
	'new',
	'$pcatalog_id',
	".$_SESSION['user_id']."
	)";
	
	$adr = mysqli_query($db_con, $query);
	if(!$adr){
		exit($query);
	}
	?>
	<script>
		document.location.href="cabinet.php";
	</script>	
	<?php
}
	?>
<!--<input type="file" name="picture"/>-->
<form action="cabinet.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
	<textarea class="form-control" rows="3" name ="body" id="body"></textarea>
	
	
  </div>
  <div class="form-group">
    <label for="picture">File input</label>
    <input type="file" id="picture" name="picture">

  </div>
  
  <div class= "form-group">
	<label for="picture">Category</label>
		<select class="form-control" name="catalog_id">
			<option value="1">1</option>
			<?php
			$query = "SELECT * FROM blogs";
			$adr = mysqli_query($db_con, $query);
			
			if(!$adr){
				exit('error');
			} 
			while ($cats = mysqli_fetch_array($adr)){
				?>
				<option value="<?php echo $cats['id']?>"><?php echo $cats['name']?></option>
				<?php
			}	
			?>
		</select>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>

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
	<td class ="action" width="200px">
		<a href="prodedit.php?id=<?php echo $id;?>" class="edit btn btn-success btn-block">EDIT</a>
		<a href="#" onclick="delete_position('proddel.php?id=<?php echo $id?>', 'Вы действительно хотите удалить данный товар?')" class="btn btn-warning btn-block delete">DELETE</a>
	</td>
</tr>
<?	
}
?>

</table>
	<?	
}else{
	?>
	<div class = "error">Ошибка доступа</div>
	<?
}
?>
<?php require_once('templates/bottom.php');?>






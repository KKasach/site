<?php require_once('templates/top.php');

if($_SESSION['user_id']){
	if($_GET['id']){
		$id = (int)$_GET['id'];
	}else{
		$id = 0;
	}
	$query = "SELECT * FROM products WHERE id = $id";
	$adr = mysqli_query($db_con, $query);
		if(!$adr){
			exit('error');
		} 
	$product = mysqli_fetch_array($adr);
	
	
	if($_POST){
		
		$pname = $_POST['name'];
		$pbody = $_POST['body'];
		$pcatalog_id = $_POST['catalog_id'];
		
		if($_FILES){
			$pic = mysqli_fetch_array($adr);
			if($pic['picture']){
				$file = '/media/uploads'.$pic['picture'];
				
				if(file_exists($file)){
					@unlink($file);	
				}
			
			$query = "DELETE FROM products WHERE id= $id AND user_id = ".$_SESSION['user_id'];
			
			$file_name_tmp = $_FILES['picture']['tmp_name'];
			$dir = '/media/uploads/';
			$file_new_name = $_SERVER['DOCUMENT_ROOT'].$dir	;
			$picture=$_FILES['picture']['name'];	
			} else {
				$picture = '';
					echo "no file";
			}
				
		}
			$query = "UPDATE products SET name = '$pname', body = '$pbody', catalog_id = '$pcatalog_id' WHERE id = '$id' AND user_id = ".$_SESSION['user_id'];
			$adr = mysqli_query($db_con, $query);
			if(!$adr){
				exit($query);
			} 
			?>
			<script>
				document.location.href ='prodedit.php?id=<? echo $id?>'
			</script>
			<?php
	}
	
?>
<form action="prodedit.php?id=<? echo $id?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<? echo $product['name']?>"/>
  </div>
  
  <div class="form-group">
    <label for="body">Body</label>
	<textarea class="form-control" rows="3" name ="body" id="body"><? echo $product['body']?></textarea>
  </div>
  
  <div class="form-group">
    <label for="picture">File input</label>
    <input type="file" id="picture" name="picture">
  </div>
   
  <div class= "form-group">
	<label for="picture">Category</label>
		<select class="form-control" name="catalog_id">
			<option value="1" <?($product['catalog_id'] == $cats['id'])?'selected':''?>> </option>
		</select>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
  
</form>

<?
}

?>

<?php require_once('templates/bottom.php');?>
<?php require_once('templates/top.php');
if($_POST){
	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
	
	$p_name=$_POST['name'];
	$p_email=$_POST['email'];
	$p_password=$_POST['password'];
	$errors= array();
	if(!$p_email){
		$errors[]="Поле email не заполнено";
	}
	if(!$p_password || !$p_password){
		$errors[]="Поле password не заполнено";
	}
	
	$query = "SELECT * FROM users WHERE email = '$p_email' and password = $p_password";
	$adr = mysqli_query($db_con, $query);
	if(!adr){
		exit($query);
	}
	$user = mysqli_fetch_array($adr);
	if(empty($user)){
		$errors[]="Ошибка входа";
	} 
	if (!empty($errors)){
		
		foreach($errors as $error){
			echo "<div class= 'error red' style='color:red'>";
			echo $error;
			echo "</div>";
		}
		
	} else {
		//echo "<pre>";
		//print_r($user);
		//echo "</pre>";
		
		$_SESSION['user_id']= $user['id'];
		?>
		<script>
			document.location.href="cabinet.php";
		</script>
		<?
	}
	
	
	
	/*
	$query = "SELECT * FROM users WHERE email = '$p_email'";
	$adr = mysqli_query($db_con, $query);
	if(!adr){
		exit($query);
	}
	$already_user = mysqli_fetch_array($adr);
	if(!empty($already_user)){
		$errors[]="Такой email уже есть";
	}
	*/
	
	if (!empty($errors)){
		
		foreach($errors as $error){
			echo "<div class= 'error red' style='color:red'>";
			echo $error;
			echo "</div>";
		}
		
	} else {
		//echo "OK";
		$query = "INSERT INTO users VALUES(
		NULL, 
		'$p_name',
		'$p_email',
		'$p_password',
		'unblock',
		NOW(),
		NOW()
		)";
		$adr = mysqli_query($db_con, $query);
		if(!$adr){
			exit($query);
		}
		?>
		<script>
		document.location.href='login.php';
		</script>
		<?
	}
}
?>
   
 <form method ='post' action='login.php' >
	  
	  <div class="form-group">
		<label for="email">Email address</label>
		<input type="email" name ="email" class="form-control" id="email" placeholder="Email">
	  </div>
	  <div class="form-group">
		<label for="password">Password</label>
		<input type="password" name ="password" class="form-control" id="password" placeholder="Password">
	  </div>
	 	  
	  <button type="submit" class="btn btn-default">Вход</button>
</form>
   
<?php require_once('templates/bottom.php')?>

<?print_r($arr);?>

    <footer class="bg-faded text-center py-5">
      <div class="container">
        <p class="m-0">Copyright &copy; Your Website 2017</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<?
		if($_SESSION['user_id']){
	?>
			<script src="media/cabinet.js"></script>
	<?
		}
		if(!empty($scripts)){
			foreach($scripts as $scripts){
				
				
	?>		
	<script src="<?=$script?>"></script>
	
	<?php	
		}
	}	
	?>
		
	<script src="media/main.js"></script>
	
  </body>

</html>

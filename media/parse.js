$function(){
	$('#google_clock').bind('click', function(){
		$.ajax({
			'url': 'ajax_google.php',
			'beforeSend': function(){
				$('#empty').html('text');
			},
			'success': function(data){
				$('#empty').html(data);
			},
			'error': function(msg){
				$('#empty').html(msg);
			},
		})
	})
}
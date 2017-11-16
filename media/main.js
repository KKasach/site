$(function(){
	$(".hinthover").bind({
		'mouseover': function(e){
			var hovertext = $(this).attr("data-body");
			var hovertextcolor = $(this).attr("data-color");
			//console.log(hovertext);
			//console.log(hovertextcolor);
			
			//var div = document.createElement(div);
						
			$("#hovertitle").text(hovertext).css('color', hovertextcolor);
			$("#hovertitle").css('top', e.clientY+30).css('left', e.clientX+30).css('display', 'block');
			
		},
		'mouseout': function() {
			$("#hovertitle").hide();
		},
			
		'click': function(e){
			e.preventDefault();
			var data = $(this).attr('href');
			
			var close = $('.modal_close, #overlay');
			
			
			if ($('.modal-window').length == 0){
				var overlay = $('<div>').attr('id', 'jq-overlay').fadeIn('slow').appendTo('body');
				
				var modal = $('<div>').addClass('modal-window').appendTo('body');
			} else {
				var modal = $('.modal-window')
			}
				$('<a>').attr('href', '#').addClass('modal-close-btn').html('&times;').click(function(e){
					e.preventDefault();
					$('.modal-window').remove();
					$('#jq-overlay').remove();
				}).appendTo(modal);
			
			var url = $(this).attr('href');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: 'url='+url,
				success: function(data){
					modal.append(data);
				},
				error: function(msg){
					modal.append(msg);
				},
			})

     },
})
})

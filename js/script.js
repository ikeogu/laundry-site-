$(document).ready(function(){
	$('#em ail').blur(function (){
		$.ajax({
			url:'emailchecker.php',
			data: {email:$(this).val()},
			type: 'post',
			}).done(function(data){
			$('#email-msg').html(data)

		})	
	});
});
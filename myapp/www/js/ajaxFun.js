$('#txtName').keyup(function(){
	var name = $('#txtName').val();
	$.post('php/process_name.php', {name: name}, function(data) {
		$('#result').html(data);
	});
});
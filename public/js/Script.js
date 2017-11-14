//Change opportunities list on dropdown change
$('#opportunities_list').change(function(){
	//Ajax to bring data related to the selected area of knowledge
	$.ajax({
		url: '', //Trazer disciplinas
		type: 'GET',
		data: '',
		success: function(data){
			// Do Something
		}
	});

});

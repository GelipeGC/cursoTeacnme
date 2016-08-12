$("#state").change(event => {
	$.get(`municipios/${event.target.value}`, function(res, sta){
		$("#municipio").empty();
		res.forEach(element => {
			$("#municipio").append(`<option value=${element.id}> ${element.name}</option>`);
		});
	});
});

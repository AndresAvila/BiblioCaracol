function buscaDatos(event) {
	if ($('#upc').val().length == 10 || $('#upc').val().length == 13) {
		var jqxhr = $.getJSON("https://www.googleapis.com/books/v1/volumes", {
			fields: "totalItems,items/volumeInfo(title,authors,publisher,publishedDate,language,imageLinks/thumbnail)",
			q: "isbn:" + $('#upc').val()
		}).done(function(data) {
			if (data.totalItems > 0) {
				var aut = "";
				$('#titulo').val(data.items[0].volumeInfo.title);
				$.each(data.items[0].volumeInfo.authors, function(i, nombre) {
					aut = aut + nombre + ", ";
				});
				$('#autores').val(aut.substr(0, aut.length - 2));
				$('#editorial').val(data.items[0].volumeInfo.publisher);
				$('#fechaPublicacion').val(data.items[0].volumeInfo.publishedDate);
			if(data.items[0].volumeInfo.language =='es')
				$('#idioma').val('Español');
			else if(data.items[0].volumeInfo.language =='en')
				$('#idioma').val('Inglés');
			else
				$('#idioma').val(data.items[0].volumeInfo.language);
				$('#portadaUrl').val(data.items[0].volumeInfo.imageLinks.thumbnail);
				$('#portada').attr("src", data.items[0].volumeInfo.imageLinks.thumbnail);
			} else {
				$('#titulo').val("");
				$('#autores').val("");
				$('#editorial').val("");
				$('#fechaPublicacion').val("");
				$('#idioma').val("");
				$('#idioma').val("");
				$('#portada').val("");
				$('#portada').attr("src", "#");
			}
		}).fail(function() {
			console.log("error");
		});
	}
}

function handleResponse(response) {
	for (var i = 0; i < response.items.length; i++) {
		var item = response.items[i];
		document.getElementById("content").innerHTML += "<br>" + item.volumeInfo.title;
	}
}
$(document).ready(function() {
	$('#upc').keyup(buscaDatos);
});

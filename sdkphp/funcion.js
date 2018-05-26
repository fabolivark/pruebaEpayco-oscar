$(document).ready(function () {
	$('.compraT').click(function () {
		var nombre = $('.compraT').parents('tr').find("td").eq(1).html();
        var precio = $('.compraT').parents('tr').find("td").eq(2).html();
        $('.modal-body .collap #Descripcion').text(nombre);
        $('.modal-body .collap #Precio').text(precio);

        console.log($('form #Descripcion').val(nombre));
        console.log($('form #Precio').val(precio));

		$('#myModal').modal('show');
	});

	$('.compraE').click(function () {
		var nombre = $('.compraE').parents('tr').find("td").eq(1).html();
        var precio = $('.compraE').parents('tr').find("td").eq(2).html();
        $('.modal-body .collap #Descripcion').text(nombre);
        $('.modal-body .collap #Precio').text(precio);

        console.log($('form #Descripcion').val(nombre));
        console.log($('form #Precio').val(precio));

		$('#myModal1').modal('show');
	});


	$('#pagar').click(function () {

		var datos = $('#formulario').serialize();

		$.post(
			"pagotargeta.php",
			datos,
			function(data){
					console.log("paso");
					console.log(data);
					var d = JSON.parse(data);

					console.log(d.data);
					console.log(d.data.x_description);

					$('#myModal').modal('hide');

					$('#respuesta ul').append("<li>"+d.data.x_description+"</li>");
					$('#respuesta ul').append("<li>"+d.data.x_cardnumber+"</li>");
					$('#respuesta ul').append("<li>"+d.data.x_response+"</li>");
					$('#respuesta ul').append("<li>"+d.data.x_transaction_date+"</li>");
					$('#respuesta ul').append("<li>"+d.text_response+"</li>");

			}

		);
		return false;
	});

	$('#pagar1').click(function () {
 // alert("paso");
		var datos = $('#formulario1').serialize();

		$.post(
			"pagoEfectivo.php",
			datos,
			function(data){
					console.log("paso");
					console.log(data);
					var d = JSON.parse(data);
					console.log(d.data);
					console.log(d.data.x_description);

					$('#myModal1').modal('hide');

					$('#respuesta ul').append("<li>"+d.data.x_description+"</li>");
					$('#respuesta ul').append("<li>"+d.data.x_cardnumber+"</li>");
					$('#respuesta ul').append("<li>"+d.data.x_response+"</li>");
					$('#respuesta ul').append("<li>"+d.data.x_transaction_date+"</li>");
					$('#respuesta ul').append("<li>"+d.text_response+"</li>");
			}
		);
		return false;
	});


});

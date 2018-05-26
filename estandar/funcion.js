$(document).ready(function (params) {

    $('.compra').click(function () {
        var id = $(this).parents('tr').find("td").eq(0).html();
        var nombre = $(this).parents('tr').find("td").eq(1).html();
        var precio = $(this).parents('tr').find("td").eq(2).html();
        // alert(id);
        console.log(id);

        $('.collap tr #Id').text(id);
        $('.collap tr #Descripcion').text(nombre);
        $('.collap tr #Precio').text(precio);


        var handler = ePayco.checkout.configure({
            key: '45b960805ced5c27ce34b1600b4b9f54',
            test: true
        })


        var data={
            //Parametros compra (obligatorio)
            name: nombre,
            description: nombre,
            invoice: "1234",
            currency: "cop",
            amount: precio,
            tax_base: "0",
            tax: "0",
            country: "co",
            lang: "en",
        
            //Onpage="false" - Standard="true"
            external: "true",
        
        
            //Atributos opcionales
            
            confirmation: "https://secure.epayco.co/confirmacion.php",
            response: "https://secure.epayco.co/respuesta.html" ,
            
        
            //Atributos cliente
            name_billing: "Andres Perez",
            address_billing: "Carrera 19 numero 14 91",
            type_doc_billing: "cc",
            mobilephone_billing: "3050000000",
            number_doc_billing: "100000000"
            }

            handler.open(data)
    })
})



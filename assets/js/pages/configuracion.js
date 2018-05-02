$(function() {


    $(document).on("click", ".enviar", function (e) {
        e.preventDefault();
        
            $.post( "core.php?l=conf", $('#cronoC').serialize(), function( data ) {
              console.log( data.titulos[0] );

            }, "json");

    });







    }
);
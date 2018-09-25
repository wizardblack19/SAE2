var inscripcion = function() {

    var _pasos = function() {
        if (!$().steps) {
            console.warn('Warning - steps.min.js is not loaded.');
            return;
        }
        $('.steps-state-saving').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Anterior',
                next: 'Siguiente <i class="icon-arrow-right14 ml-2" />',
                finish: 'Guardar <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'slide',
            enableFinishButton: false
        });
    };

    // General eventos
    var _generalEvent = function() {

        $('#cancel').click(function(e){
            e.preventDefault();
              if (localStorage)
                  localStorage.clear();
                console.log('Formulario limpio');
        });

        $('.reset').click(function(e){
            e.preventDefault();
            if (localStorage)
              localStorage.clear();
              var url = "index.php"; 
              $(location).attr('href',url);
        });

        $( ".steps-state-saving" ).submit(function( event ) {
            event.preventDefault();
            $(':input[type="submit"]').prop('disabled', true);
            $.post( "core.php?l=inscripcion", $('.steps-state-saving').serialize(), function( data ) {
                if(data.Nerror==1){
                    swal("Error",data.msg,"error" );
                    $(':input[type="submit"]').prop('disabled', false);
                }else{
                    swal("Good job!",data.msg,"success" );
                    if (localStorage)
                        localStorage.clear();
                        var url = 'data.php?r='+data.ida+'&rr='+data.idp+'&rrr='+data.tipo; 
                        $(location).attr('href',url);

                    console.log('Retorno Correcto');
                }
            }, "json")
            .fail(function() {
                $(':input[type="submit"]').prop('disabled', false);
                swal("Error","Se perdio la conexión con el servidor o con la red, intente de nuevo.","error" );
            });
        });

        $('.steps-state-saving').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
            e.preventDefault();
            return false;
            }
        });

        $( ".update" ).click(function () {
            $.post( "core.php?l=dataINS", $('.form-control').serialize() , function( data ) {
                $.each( data, function( index, value ){
                    $('#'+index).html(value);
                    $('.revisar').show('fast');
                });
            }, "json");
        });

        $('.imprimir').click(function(e){
            e.preventDefault();
            $('#imprimir').printArea();
        });

    };

    // Select2 select
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }
        var $select1 = $('.Sinput').select2();
    };


    var _componentUiDatepicker = function() {
        if (!$().datepicker) {
            console.warn('Warning - jQuery UI components are not loaded.');
            return;
        }

        $('.datepicker-menus').datepicker({
            changeMonth: true,
            changeYear: true,
            language: 'es',
            format: 'yyyy-mm-dd',
            autoclose:true
        });

    };


    var _datasaved = function() {
        var i =0;
        $( ".steps-state-saving" ).sisyphus({
            timeout: 10,
            locationBased: false,
            autoRelease: true,
            excludeFields: $( "#idp"),
            onSave: function() {
                $("#saved").html('Borrador guardado ').show('fast');
                setTimeout(function() {
                    $("#saved").hide('slow');
                },3000);
            },
        });
    };

    var _datacontrol = function() {
        var idp = $('#idp').attr('valor');
        console.log(idp);
        if(idp>0){
            $(".steps-state-saving").steps("remove", 2);
            $(".steps-state-saving").steps("remove", 2);
            $('.papa').hide();
        }

    };



    return {
        init: function() {
            _pasos();
            _generalEvent();
            _componentSelect2();
            _componentUiDatepicker();
            _datasaved();
            _datacontrol();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    inscripcion.init();
});
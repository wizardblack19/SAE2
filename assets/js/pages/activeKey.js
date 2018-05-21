$(function() {

    $( document ).ajaxStart(function() {
        $.blockUI({
            message: '<i class="icon-spinner4 spinner"></i><br />ACTIVE SYSTEM',
            overlayCSS: {
                backgroundColor: '#1b2024',
                opacity: 0.8,
                zIndex: 1200,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#fff',
                padding: 0,
                zIndex: 1201,
                backgroundColor: 'transparent'
            }
        });
    }).ajaxStop($.unblockUI);


    $( "#activeKey" ).submit(function( event ) {
        event.preventDefault();
        $.post( "core.php?l=activeKey",$("#activeKey").serialize(), function( data ) {
            if(data.error==1){
                swal(data.estatus,data.msg,"error");
            }else if(data.error==0){
                swal(data.estatus,data.msg,"success");
            }
        }, "json")
        .fail(function() {
            swal('Ocurrió un error en el scripts o servidor, no hay datos para este grado. ');
        });
    });








});

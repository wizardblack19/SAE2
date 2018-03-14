
    $(function() {
        Dropzone.autoDiscover = false;
        $("#files_multiple").dropzone({
            paramName: "file", // The name that will be used to transfer the file
            dictDefaultMessage: 'Arrastre sus archivos <span>o CLICK AQUÍ</span>',
            maxFilesize: 5, // MB
            acceptedFiles: ".xlsx,.xls,.docx,.doc,.pptx,.ppt,.pdf",//Archivos permitidos
            init: function() {
            this.on("success", function(file) {
                var perfil  = JSON.parse(Cookies.get('perfil'));
                var action  = 'borrar';
                var block   = '#archivos';
                post_data(perfil.codigo,action,block);
            });
        }});
    });

    function post_data(codigo, action, block){
        $(block).block({ 
            message: '<i class="icon-spinner2 spinner"></i>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait',
                'box-shadow': '0 0 0 1px #ddd'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });

        if(action === undefined){
            window.setTimeout(function () {
               $(block).unblock();
            }, 2000);
        }else{
            $.post( "core.php?l=verarchivos", { codigo: codigo, action:action }, function( data ) {  
                $("#resultado1").html(data.html);
                window.setTimeout(function () {
                   $(block).unblock();
                }, 500);
           }, "json");
        }

    }
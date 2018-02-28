
$(function() {
    Dropzone.autoDiscover = false;
    $("#files_multiple").dropzone({
        paramName: "file", // The name that will be used to transfer the file
        dictDefaultMessage: 'Arrastre sus archivos <span>o CLICK AQUÍ</span>',
        maxFilesize: 500, // MB
        init: function() {
        this.on("success", function(file) { alert("Added file."); });
    }});










});



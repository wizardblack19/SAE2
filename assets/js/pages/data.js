var generaldata = function() {
    var _datasaved = function() {
        $('.imprimir').click(function(e){
            e.preventDefault();
            $('#imprimir').printArea();
        });
    };

    var _generalAction = function() {
        $('.agregar').click(function(e){
            e.preventDefault();
            var idp = $(this).attr('idp');
            var url = 'inscripcion.php?r='+idp; 
            $(location).attr('href',url);


        });
    };
    return {
        init: function() {
            _datasaved();
            _generalAction();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    generaldata.init();
});
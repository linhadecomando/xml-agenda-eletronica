$(function($){

    var url = "index.php";

    $('#btnCancelar, #btnLimpar').on('click', function(){
        $(location).attr('href',url);
    });

    $(".mask-phone").mask("(99) 9999-9999");

});

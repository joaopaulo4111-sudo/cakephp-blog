$(function() {

    // ================================
    // MOSTRAR ALERTA NA TELA
    // ================================
    window.mostrarAlerta = function(tipo, mensagem) {
        var html = '<div class="alert alert-' + tipo + ' alert-dismissible fade show" role="alert">';
        html += mensagem;
        html += '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
        html += '</div>';

        $('#area-alertas').html(html);

        // Desaparece automaticamente após 5 segundos
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    };

    // ================================
    // FECHAR ALERTAS MANUALMENTE
    // ================================
    $(document).on('click', '.btn-close', function() {
        $(this).closest('.alert').fadeOut();
    });

});
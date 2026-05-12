$(function() {

    // Abre a aba correta após redirect
    var params = new URLSearchParams(window.location.search);
    var aba = params.get('aba') || 'medicos';
    var tabEl = document.querySelector('[data-bs-target="#' + aba + '"]');
    if (tabEl) {
        bootstrap.Tab.getOrCreateInstance(tabEl).show();
    }

    // Ao clicar nas abas, limpa o parâmetro da URL
    $('[data-bs-toggle="tab"]').on('click', function() {
        history.replaceState(null, '', '/cakephp-blog/');
    });

    var urlParaExcluir = null;

    // Quando clicar em qualquer botão excluir
    $(document).on('click', '.btn-excluir', function() {
        urlParaExcluir = $(this).data('url');
        var el = document.getElementById('modalConfirmarExclusao');
        var modalExclusao = bootstrap.Modal.getInstance(el) || new bootstrap.Modal(el);
        modalExclusao.show();
    });

    // Quando confirmar a exclusão
    $(document).on('click', '#btn-confirmar-exclusao', function() {
        if (urlParaExcluir) {
            $('#form-excluir').attr('action', urlParaExcluir).submit();
        }
    });

    // Fechar alertas ao clicar no X
    $(document).on('click', '.btn-close', function() {
        $(this).closest('.alert').fadeOut();
    });

    // Alertas desaparecem automaticamente após 5 segundos
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);

});
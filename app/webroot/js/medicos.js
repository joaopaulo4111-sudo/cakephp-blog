$(function() {

    // ================================
    // FUNÇÃO QUE REDESENHA A TABELA
    // ================================
    function atualizarTabelaMedicos() {
        $.ajax({
            url: '/cakephp-blog/medicos/ajaxLista',
            type: 'GET',
            dataType: 'json',
            success: function(medicos) {
                var html = '';

                $.each(medicos, function(i, m) {
                    html += '<tr>';
                    html += '<td>' + m.nome + '</td>';
                    html += '<td>' + m.crm + '</td>';
                    html += '<td>' + m.especialidade + '</td>';
                    html += '<td>' + m.email + '</td>';
                    html += '<td>';
                    html += '<button class="btn btn-sm btn-warning me-1 btn-editar-medico"';
                    html += ' data-id="' + m.id + '"';
                    html += ' data-nome="' + m.nome + '"';
                    html += ' data-crm="' + m.crm + '"';
                    html += ' data-especialidade="' + m.especialidade + '"';
                    html += ' data-email="' + m.email + '">Editar</button>';
                    html += '<button class="btn btn-sm btn-danger btn-excluir-medico"';
                    html += ' data-id="' + m.id + '">Excluir</button>';
                    html += '</td>';
                    html += '</tr>';
                });

                $('#tabela-medicos tbody').html(html);
            }
        });
    }

    // ================================
    // ADICIONAR MÉDICO
    // ================================
    $(document).on('submit', '#formAddMedico', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/cakephp-blog/medicos/ajaxAdd',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                if (resp.sucesso) {
                    $('#modalAddMedico').modal('hide');
                    $('#formAddMedico')[0].reset();
                    atualizarTabelaMedicos();
                    mostrarAlerta('success', resp.mensagem);
                } else {
                    mostrarAlerta('danger', resp.mensagem);
                }
            }
        });
    });

    // ================================
    // ABRIR MODAL EDITAR MÉDICO
    // ================================
    $(document).on('click', '.btn-editar-medico', function() {
        $('#modalEditMedico input[name="data[Medico][id]"]').val($(this).data('id'));
        $('#modalEditMedico input[name="data[Medico][nome]"]').val($(this).data('nome'));
        $('#modalEditMedico input[name="data[Medico][crm]"]').val($(this).data('crm'));
        $('#modalEditMedico input[name="data[Medico][especialidade]"]').val($(this).data('especialidade'));
        $('#modalEditMedico input[name="data[Medico][email]"]').val($(this).data('email'));
        $('#modalEditMedico').modal('show');
    });

    // ================================
    // SALVAR EDIÇÃO MÉDICO
    // ================================
    $(document).on('submit', '#formEditMedico', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/cakephp-blog/medicos/ajaxEdit',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                if (resp.sucesso) {
                    $('#modalEditMedico').modal('hide');
                    atualizarTabelaMedicos();
                    mostrarAlerta('success', resp.mensagem);
                } else {
                    mostrarAlerta('danger', resp.mensagem);
                }
            }
        });
    });

    // ================================
    // EXCLUIR MÉDICO
    // ================================
    var idParaExcluirMedico = null;

    $(document).on('click', '.btn-excluir-medico', function() {
        idParaExcluirMedico = $(this).data('id');
        $('#modalConfirmarExclusao').modal('show');
    });

    $(document).on('click', '#btn-confirmar-exclusao', function() {
        if (idParaExcluirMedico) {
            $.ajax({
                url: '/cakephp-blog/medicos/ajaxDelete/' + idParaExcluirMedico,
                type: 'POST',
                dataType: 'json',
                success: function(resp) {
                    $('#modalConfirmarExclusao').modal('hide');
                    idParaExcluirMedico = null;
                    atualizarTabelaMedicos();
                    mostrarAlerta('success', resp.mensagem);
                }
            });
        }
    });

});
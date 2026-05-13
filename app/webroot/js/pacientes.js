$(function() {

    // ================================
    // FUNÇÃO QUE REDESENHA A TABELA
    // ================================
    function atualizarTabelaPacientes() {
        $.ajax({
            url: '/cakephp-blog/pacientes/ajaxLista',
            type: 'GET',
            dataType: 'json',
            success: function(pacientes) {
                var html = '';

                // Para cada paciente, cria uma linha na tabela
                $.each(pacientes, function(i, p) {
                    html += '<tr>';
                    html += '<td>' + p.nome + '</td>';
                    html += '<td>' + p.cpf + '</td>';
                    html += '<td>' + p.data_nascimento + '</td>';
                    html += '<td>' + p.email + '</td>';
                    html += '<td>';
                    html += '<button class="btn btn-sm btn-warning me-1 btn-editar-paciente"';
                    html += ' data-id="' + p.id + '"';
                    html += ' data-nome="' + p.nome + '"';
                    html += ' data-cpf="' + p.cpf + '"';
                    html += ' data-nascimento="' + p.data_nascimento + '"';
                    html += ' data-email="' + p.email + '">Editar</button>';
                    html += '<button class="btn btn-sm btn-danger btn-excluir-paciente"';
                    html += ' data-id="' + p.id + '">Excluir</button>';
                    html += '</td>';
                    html += '</tr>';
                });

                // Substitui o conteúdo do tbody
                $('#tabela-pacientes tbody').html(html);
            }
        });
    }

    // ================================
    // ADICIONAR PACIENTE
    // ================================
    $(document).on('submit', '#formAddPaciente', function(e) {
        e.preventDefault(); // impede recarregar a página

        $.ajax({
            url: '/cakephp-blog/pacientes/ajaxAdd',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                if (resp.sucesso) {
                    $('#modalAddPaciente').modal('hide');
                    $('#formAddPaciente')[0].reset();
                    atualizarTabelaPacientes();
                    mostrarAlerta('success', resp.mensagem);
                } else {
                    mostrarAlerta('danger', resp.mensagem);
                }
            }
        });
    });

    // ================================
    // ABRIR MODAL EDITAR PACIENTE
    // ================================
    $(document).on('click', '.btn-editar-paciente', function() {
        $('#edit-paciente-id').val($(this).data('id'));
        $('#edit-paciente-nome').val($(this).data('nome'));
        $('#edit-paciente-cpf').val($(this).data('cpf'));
        $('#edit-paciente-nascimento').val($(this).data('nascimento'));
        $('#edit-paciente-email').val($(this).data('email'));
        $('#modalEditPaciente').modal('show');
    });

    // ================================
    // SALVAR EDIÇÃO PACIENTE
    // ================================
    $(document).on('submit', '#formEditPaciente', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/cakephp-blog/pacientes/ajaxEdit',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                if (resp.sucesso) {
                    $('#modalEditPaciente').modal('hide');
                    atualizarTabelaPacientes();
                    mostrarAlerta('success', resp.mensagem);
                } else {
                    mostrarAlerta('danger', resp.mensagem);
                }
            }
        });
    });

    // ================================
    // EXCLUIR PACIENTE
    // ================================
    var idParaExcluirPaciente = null;

    $(document).on('click', '.btn-excluir-paciente', function() {
        idParaExcluirPaciente = $(this).data('id');
        $('#modalConfirmarExclusao').modal('show');
    });

    $(document).on('click', '#btn-confirmar-exclusao', function() {
        if (idParaExcluirPaciente) {
            $.ajax({
                url: '/cakephp-blog/pacientes/ajaxDelete/' + idParaExcluirPaciente,
                type: 'POST',
                dataType: 'json',
                success: function(resp) {
                    $('#modalConfirmarExclusao').modal('hide');
                    idParaExcluirPaciente = null;
                    atualizarTabelaPacientes();
                    mostrarAlerta('success', resp.mensagem);
                }
            });
        }
    });

});
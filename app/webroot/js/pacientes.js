$(function() {

    // Abrir modal de editar paciente com os dados preenchidos
    $(document).off('click', '.btn-editar-paciente').on('click', '.btn-editar-paciente', function() {
        $('#edit-paciente-id').val($(this).data('id'));
        $('#edit-paciente-nome').val($(this).data('nome'));
        $('#edit-paciente-cpf').val($(this).data('cpf'));
        $('#edit-paciente-nascimento').val($(this).data('nascimento'));
        $('#edit-paciente-email').val($(this).data('email'));
        $('#modalEditPaciente').modal('show');
    });

});
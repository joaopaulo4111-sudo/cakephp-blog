$(function() {
    $(document).off('click', '.btn-editar-medico').on('click', '.btn-editar-medico', function() {
        $('#edit-medico-id').val($(this).data('id'));
        $('#edit-medico-nome').val($(this).data('nome'));
        $('#edit-medico-crm').val($(this).data('crm'));
        $('#edit-medico-especialidade').val($(this).data('especialidade'));
        $('#edit-medico-email').val($(this).data('email'));
        $('#modalEditMedico').modal('show');
    });
});
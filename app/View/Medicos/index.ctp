<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#medicos">Médicos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#pacientes">Pacientes</a>
    </li>
</ul>

<div class="tab-content">

    <!-- ABA MÉDICOS -->
    <div class="tab-pane fade show active" id="medicos">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Lista de Médicos</h4>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddMedico">
                + Novo Médico
            </button>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>CRM</th>
                    <th>Especialidade</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicos as $medico): ?>
                <tr>
                    <td><?php echo $medico['Medico']['nome']; ?></td>
                    <td><?php echo $medico['Medico']['crm']; ?></td>
                    <td><?php echo $medico['Medico']['especialidade']; ?></td>
                    <td><?php echo $medico['Medico']['email']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning me-1 btn-editar-medico"
                            data-id="<?php echo $medico['Medico']['id']; ?>"
                            data-nome="<?php echo $medico['Medico']['nome']; ?>"
                            data-crm="<?php echo $medico['Medico']['crm']; ?>"
                            data-especialidade="<?php echo $medico['Medico']['especialidade']; ?>"
                            data-email="<?php echo $medico['Medico']['email']; ?>">
                            Editar
                        </button>
                        <button class="btn btn-sm btn-danger btn-excluir"
                            data-url="/cakephp-blog/medicos/delete/<?php echo $medico['Medico']['id']; ?>">
                            Excluir
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- ABA PACIENTES -->
    <div class="tab-pane fade" id="pacientes">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Lista de Pacientes</h4>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddPaciente">
                + Novo Paciente
            </button>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                <tr>
                    <td><?php echo $paciente['Paciente']['nome']; ?></td>
                    <td><?php echo $paciente['Paciente']['cpf']; ?></td>
                    <td><?php echo $paciente['Paciente']['data_nascimento']; ?></td>
                    <td><?php echo $paciente['Paciente']['email']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning me-1 btn-editar-paciente"
                            data-id="<?php echo $paciente['Paciente']['id']; ?>"
                            data-nome="<?php echo $paciente['Paciente']['nome']; ?>"
                            data-cpf="<?php echo $paciente['Paciente']['cpf']; ?>"
                            data-nascimento="<?php echo $paciente['Paciente']['data_nascimento']; ?>"
                            data-email="<?php echo $paciente['Paciente']['email']; ?>">
                            Editar
                        </button>
                        <button class="btn btn-sm btn-danger btn-excluir"
                            data-url="/cakephp-blog/pacientes/delete/<?php echo $paciente['Paciente']['id']; ?>">
                            Excluir
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal Adicionar Médico -->
<div class="modal fade" id="modalAddMedico" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Novo Médico</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('Medico', array('url' => array('action' => 'add'))); ?>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nome</label>
                    <?php echo $this->Form->input('nome', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Nome completo...')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">CRM</label>
                    <?php echo $this->Form->input('crm', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Ex: CRM/SP 123456')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Especialidade</label>
                    <?php echo $this->Form->input('especialidade', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Ex: Cardiologia')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <?php echo $this->Form->input('email', array('label' => false, 'class' => 'form-control', 'placeholder' => 'email@exemplo.com')); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success')); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Adicionar Paciente -->
<div class="modal fade" id="modalAddPaciente" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Novo Paciente</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/cakephp-blog/pacientes/add">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nome</label>
                        <input type="text" name="data[Paciente][nome]" class="form-control" placeholder="Nome completo...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">CPF</label>
                        <input type="text" name="data[Paciente][cpf]" class="form-control" placeholder="Ex: 000.000.000-00">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Data de Nascimento</label>
                        <input type="date" name="data[Paciente][data_nascimento]" class="form-control" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="data[Paciente][email]" class="form-control" placeholder="email@exemplo.com">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Médico -->
<div class="modal fade" id="modalEditMedico" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Editar Médico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('Medico', array('url' => array('action' => 'edit'))); ?>
                <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nome</label>
                    <?php echo $this->Form->input('nome', array('label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">CRM</label>
                    <?php echo $this->Form->input('crm', array('label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Especialidade</label>
                    <?php echo $this->Form->input('especialidade', array('label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <?php echo $this->Form->input('email', array('label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success')); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Paciente -->
<div class="modal fade" id="modalEditPaciente" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Editar Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formEditPaciente" method="post" action="/cakephp-blog/pacientes/edit">
                    <input type="hidden" name="data[Paciente][id]" id="edit-paciente-id">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nome</label>
                        <input type="text" name="data[Paciente][nome]" id="edit-paciente-nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">CPF</label>
                        <input type="text" name="data[Paciente][cpf]" id="edit-paciente-cpf" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Data de Nascimento</label>
                        <input type="date" name="data[Paciente][data_nascimento]" id="edit-paciente-nascimento" class="form-control" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="data[Paciente][email]" id="edit-paciente-email" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="modalConfirmarExclusao" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p>Tem certeza que deseja excluir este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="btn-confirmar-exclusao">Excluir</button>
            </div>
        </div>
    </div>
</div>

<?php $this->start('script'); ?>
<script>
$(function() {

    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('aba') === 'pacientes') {
        $('.nav-link[href="#medicos"]').removeClass('active');
        $('.nav-link[href="#pacientes"]').addClass('active');
        $('#medicos').removeClass('show active');
        $('#pacientes').addClass('show active');
    }

    var urlParaExcluir = null;

    $(document).on('click', '.btn-excluir', function() {
        urlParaExcluir = $(this).data('url');
        $('#modalConfirmarExclusao').modal('show');
    });

    $(document).on('click', '#btn-confirmar-exclusao', function() {
        if (urlParaExcluir) {
            var form = $('<form method="post" style="display:none"></form>');
            form.attr('action', urlParaExcluir);
            $('body').append(form);
            form.submit();
        }
    });

    // EDITAR MÉDICO
    $(document).on('click', '.btn-editar-medico', function() {
        $('#modalEditMedico input[name="data[Medico][id]"]').val($(this).data('id'));
        $('#modalEditMedico input[name="data[Medico][nome]"]').val($(this).data('nome'));
        $('#modalEditMedico input[name="data[Medico][crm]"]').val($(this).data('crm'));
        $('#modalEditMedico input[name="data[Medico][especialidade]"]').val($(this).data('especialidade'));
        $('#modalEditMedico input[name="data[Medico][email]"]').val($(this).data('email'));
        $('#modalEditMedico').modal('show');
    });

    // EDITAR PACIENTE
    $(document).on('click', '.btn-editar-paciente', function() {
        $('#edit-paciente-id').val($(this).data('id'));
        $('#edit-paciente-nome').val($(this).data('nome'));
        $('#edit-paciente-cpf').val($(this).data('cpf'));
        $('#edit-paciente-nascimento').val($(this).data('nascimento'));
        $('#edit-paciente-email').val($(this).data('email'));
        $('#modalEditPaciente').modal('show');
    });

});
</script>
<?php $this->end(); ?>
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
<!-- Modal Adicionar Médico -->
<div class="modal fade" id="modalAddMedico" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Novo Médico</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('Medico', array('url' => array('controller' => 'medicos', 'action' => 'add'))); ?>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
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
                <?php echo $this->Form->create('Medico', array('url' => array('controller' => 'medicos', 'action' => 'edit'))); ?>
                <?php echo $this->Form->input('id', array('type' => 'hidden', 'id' => 'edit-medico-id')); ?>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nome</label>
                    <?php echo $this->Form->input('nome', array('label' => false, 'class' => 'form-control', 'id' => 'edit-medico-nome')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">CRM</label>
                    <?php echo $this->Form->input('crm', array('label' => false, 'class' => 'form-control', 'id' => 'edit-medico-crm')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Especialidade</label>
                    <?php echo $this->Form->input('especialidade', array('label' => false, 'class' => 'form-control', 'id' => 'edit-medico-especialidade')); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <?php echo $this->Form->input('email', array('label' => false, 'class' => 'form-control', 'id' => 'edit-medico-email')); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
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
                <form method="post" action="/cakephp-blog/pacientes/edit">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

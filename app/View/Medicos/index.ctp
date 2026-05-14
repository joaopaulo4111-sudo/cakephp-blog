<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Lista de Médicos</h4>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddMedico">
        + Novo Médico
    </button>
</div>
<table id="tabela-medicos" class="table table-striped table-hover">
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
                <button class="btn btn-sm btn-danger btn-excluir-medico"
                    data-id="<?php echo $medico['Medico']['id']; ?>">
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
            <form id="formAddMedico">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Novo Médico</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nome</label>
                        <input type="text" name="data[Medico][nome]" class="form-control" placeholder="Nome completo...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">CRM</label>
                        <input type="text" name="data[Medico][crm]" class="form-control" placeholder="Ex: CRM/SP 123456">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Especialidade</label>
                        <input type="text" name="data[Medico][especialidade]" class="form-control" placeholder="Ex: Cardiologia">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="data[Medico][email]" class="form-control" placeholder="email@exemplo.com">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Médico -->
<div class="modal fade" id="modalEditMedico" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditMedico">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Editar Médico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="data[Medico][id]">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nome</label>
                        <input type="text" name="data[Medico][nome]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">CRM</label>
                        <input type="text" name="data[Medico][crm]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Especialidade</label>
                        <input type="text" name="data[Medico][especialidade]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="data[Medico][email]" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Confirmar Exclusão -->
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
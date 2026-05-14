<!-- Área onde os alertas AJAX aparecem -->
<div id="area-alertas"></div>

<!-- div principal que recebe o conteúdo -->
<div id="content">
<div id="content" class="tab-content">

    <!-- ABA MÉDICOS -->
    <div class="tab-pane fade" id="medicos">
        <?php echo $this->element('../Medicos/index'); ?>
    </div>

    <!-- ABA PACIENTES -->
    <div class="tab-pane fade" id="pacientes">
        <?php echo $this->element('../Pacientes/index'); ?>
    </div>

</div>

<!-- Formulário oculto para exclusão via POST -->
<form method="post" id="form-excluir" style="display:none;">
    <input type="hidden" name="_method" value="POST">
</form>

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
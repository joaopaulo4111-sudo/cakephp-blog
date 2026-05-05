<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Editar Médico</h4>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Medico', array('url' => array('action' => 'edit'))); ?>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nome</label>
                    <?php echo $this->Form->input('nome', array(
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Nome completo...'
                    )); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">CRM</label>
                    <?php echo $this->Form->input('crm', array(
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Ex: CRM/SP 123456'
                    )); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Especialidade</label>
                    <?php echo $this->Form->input('especialidade', array(
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Ex: Cardiologia'
                    )); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <?php echo $this->Form->input('email', array(
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'email@exemplo.com'
                    )); ?>
                </div>

                <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>

                <div class="d-flex justify-content-between align-items-center">
                    <?php echo $this->Html->link(
                        '← Voltar',
                        array('action' => 'index'),
                        array('class' => 'btn btn-secondary')
                    ); ?>
                    <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Criar Conta</h4>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('User'); ?>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nome de Usuário</label>
                    <?php echo $this->Form->input('username', array(
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Digite seu usuário...'
                    )); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Senha</label>
                    <?php echo $this->Form->input('password', array(
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Digite sua senha...'
                    )); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo de Usuário</label>
                    <?php echo $this->Form->input('role', array(
                        'label' => false,
                        'class' => 'form-select',
                        'options' => array('admin' => 'Admin', 'author' => 'Author')
                    )); ?>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <?php echo $this->Html->link(
                        '← Voltar',
                        array('controller' => 'posts', 'action' => 'index'),
                        array('class' => 'btn btn-secondary')
                    ); ?>
                    <?php echo $this->Form->submit('Criar conta', array('class' => 'btn btn-success')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
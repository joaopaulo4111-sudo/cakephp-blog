<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body">
                <?php echo $this->Flash->render('auth'); ?>
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

                <?php echo $this->Form->submit('Entrar', array('class' => 'btn btn-success w-100')); ?>
                <?php echo $this->Form->end(); ?>

            </div>
        </div>
    </div>
</div>
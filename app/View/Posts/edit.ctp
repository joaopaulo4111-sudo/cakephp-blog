<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Editar Post</h4>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Post', array('url' => array('action' => 'edit'))); ?>

                <div class="mb-3">
                    <label class="form-label fw-bold">Título</label>
                    <?php echo $this->Form->input('title', array(
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Digite o título...'
                    )); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Conteúdo</label>
                    <?php echo $this->Form->input('body', array(
                        'label' => false,
                        'rows' => '5',
                        'class' => 'form-control',
                        'placeholder' => 'Escreva o conteúdo do post...'
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
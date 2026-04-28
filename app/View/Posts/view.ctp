<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm mb-4">
            <div class="card-body p-5">
                <h1 class="card-title mb-2"><?php echo h($post['Post']['title']); ?></h1>
                <p class="text-muted mb-4">
                    Publicado em: <?php echo $post['Post']['created']; ?>
                </p>
                <hr>
                <p class="card-text fs-5 mt-4"><?php echo h($post['Post']['body']); ?></p>
            </div>
        </div>

        <?php echo $this->Html->link(
            'Voltar',
            array('action' => 'index'),
            array('class' => 'btn btn-secondary')
        ); ?>

    </div>
</div>
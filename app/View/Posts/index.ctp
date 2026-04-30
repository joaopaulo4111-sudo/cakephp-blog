<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Blog posts</h1>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddPost">
        + Add Post
    </button>
</div>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                ); ?>
            </td>
            <td><?php echo $post['Post']['created']; ?></td>
            <td>
                <button class="btn btn-sm btn-warning me-1 btn-editar"
                    data-id="<?php echo $post['Post']['id']; ?>"
                    data-title="<?php echo h($post['Post']['title']); ?>"
                    data-body="<?php echo h($post['Post']['body']); ?>">
                    Edit
                </button>
                <button class="btn btn-sm btn-danger btn-deletar"
                    data-id="<?php echo $post['Post']['id']; ?>">
                    Delete
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Forms de delete escondidos -->
<?php foreach ($posts as $post): ?>
    <form id="form-delete-<?php echo $post['Post']['id']; ?>"
          action="/cakephp/cakephp-blog/posts/delete/<?php echo $post['Post']['id']; ?>"
          method="post"
          style="display:none">
        <input type="hidden" name="_method" value="POST">
    </form>
<?php endforeach; ?>

<!-- Modal Add Post -->
<div class="modal fade" id="modalAddPost" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Add Post</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('Post', array('url' => array('action' => 'add'), 'id' => 'formAddPost')); ?>
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
                        'rows' => '4',
                        'class' => 'form-control',
                        'placeholder' => 'Escreva o conteúdo...'
                    )); ?>
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

<!-- Modal Edit Post -->
<div class="modal fade" id="modalEditPost" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title">Editar Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formEditPost" method="post">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="data[Post][id]" id="edit-id">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Título</label>
                        <input type="text" name="data[Post][title]" id="edit-title" class="form-control" placeholder="Digite o título...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Conteúdo</label>
                        <textarea name="data[Post][body]" id="edit-body" class="form-control" rows="4" placeholder="Escreva o conteúdo..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" id="btn-salvar-edit">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmação de Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmar Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p>Tem certeza que deseja deletar este post?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="btn-confirmar-delete">Deletar</button>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
window.addEventListener('load', function() {

    // Alert some após 5 segundos
    var alertas = document.querySelectorAll('[class*="message"]');
    alertas.forEach(function(alerta) {
        setTimeout(function() {
            $(alerta).fadeOut('slow');
        }, 5000);
    });

    // Abre modal de Delete
    var idParaDeletar = null;
    $('.btn-deletar').on('click', function() {
        idParaDeletar = $(this).data('id');
        $('#modalDelete').modal('show');
    });

    // Confirma delete
    $('#btn-confirmar-delete').on('click', function() {
        if (idParaDeletar) {
            $('#form-delete-' + idParaDeletar).submit();
        }
    });

    // Abre modal de Edit com os dados do post
    $('.btn-editar').on('click', function() {
        var id = $(this).data('id');
        var title = $(this).data('title');
        var body = $(this).data('body');

        $('#edit-id').val(id);
        $('#edit-title').val(title);
        $('#edit-body').val(body);
        $('#formEditPost').attr('action', '/cakephp/cakephp-blog/posts/edit/' + id);

        $('#modalEditPost').modal('show');
    });

    // Salva o edit
    $('#btn-salvar-edit').on('click', function() {
        $('#formEditPost').submit();
    });

});
<?php echo $this->Html->scriptEnd(); ?>
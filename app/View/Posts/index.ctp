<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Blog posts</h1>
    <?php echo $this->Html->link(
        '+ Add Post',
        array('action' => 'add'),
        array('class' => 'btn btn-success')
    ); ?>
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
                <?php echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $post['Post']['id']),
                    array('class' => 'btn btn-sm btn-warning me-1')
                ); ?>
                <?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?', 'class' => 'btn btn-sm btn-danger')
                ); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php unset($post); ?>
    </tbody>
</table>
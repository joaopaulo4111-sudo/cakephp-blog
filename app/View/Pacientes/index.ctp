<?php $this->set('title_for_layout', 'Sistema Médico'); ?>

<ul class="nav nav-tabs mb-4" id="myTab">
    <li class="nav-item">
        <?php echo $this->Html->link(
            'Médicos',
            array('controller' => 'medicos', 'action' => 'index'),
            array('class' => 'nav-link')
        ); ?>
    </li>
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#pacientes">Pacientes</a>
    </li>
</ul>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Lista de Pacientes</h4>
    <?php echo $this->Html->link(
        '+ Novo Paciente',
        array('action' => 'add'),
        array('class' => 'btn btn-success')
    ); ?>
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
                <?php echo $this->Html->link(
                    'Editar',
                    array('action' => 'edit', $paciente['Paciente']['id']),
                    array('class' => 'btn btn-sm btn-warning me-1')
                ); ?>
                <?php echo $this->Form->postLink(
                    'Excluir',
                    array('action' => 'delete', $paciente['Paciente']['id']),
                    array('confirm' => 'Tem certeza que deseja excluir este paciente?', 'class' => 'btn btn-sm btn-danger')
                ); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
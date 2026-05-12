<?php
$cakeDescription = 'Sistema Médico';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>

    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>

    <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->fetch('css');
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/cakephp-blog/">Sistema Médico</a>
    <ul class="nav mb-0" id="abas-nav">
    <li class="nav-item">
        <a class="nav-link text-white px-4 py-2" href="#medicos" data-bs-toggle="tab" data-bs-target="#medicos">
             Médicos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white px-4 py-2" href="#pacientes" data-bs-toggle="tab" data-bs-target="#pacientes">
             Pacientes
        </a>
    </li>
    </ul>
        <div>
            <?php if ($this->Session->read('Auth.User')): ?>
                <span class="text-white me-3">
                    <?php echo $this->Session->read('Auth.User.username'); ?>
                </span>
                <?php echo $this->Html->link(
                    'Sair',
                    array('controller' => 'users', 'action' => 'logout'),
                    array('class' => 'btn btn-outline-light btn-sm')
                ); ?>
            <?php else: ?>
                <?php echo $this->Html->link(
                    'Login',
                    array('controller' => 'users', 'action' => 'login'),
                    array('class' => 'btn btn-outline-light btn-sm')
                ); ?>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- CONTEÚDO -->
<div class="container" id="content">

    <!-- FLASH MENSAGEM BONITA -->
    <div class="container mt-3">
    <?php echo $this->Flash->render(); ?>
    </div>

    <?php echo $this->fetch('content'); ?>

</div>

<!-- FOOTER -->
<footer class="text-center text-muted mt-5 py-3 border-top">
    <p>CakePHP 2.10.24</p>
</footer>

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Scripts globais -->
<?php echo $this->Html->script('app'); ?>
<?php echo $this->Html->script('medicos'); ?>
<?php echo $this->Html->script('pacientes'); ?>
<!-- Scripts das views -->
<?php echo $this->fetch('script'); ?>


</body>
</html>
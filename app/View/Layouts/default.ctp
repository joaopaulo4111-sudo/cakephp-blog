<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
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
        echo $this->Html->css('cake.generic');
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
        <a class="navbar-brand" href="/cakephp/cakephp-blog/posts">Meu Blog</a>
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

<!-- CONTAINER -->
<div class="container">
    <?php echo $this->Flash->render(); ?>
    <?php echo $this->fetch('content'); ?>
</div>

<!-- FOOTER -->
<footer class="text-center text-muted mt-5 py-3 border-top">
    <p><?php echo $cakeVersion; ?></p>
</footer>

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Scripts das views -->
<?php echo $this->fetch('script'); ?>

</body>
</html>
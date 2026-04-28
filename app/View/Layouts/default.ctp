<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

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
		echo $this->fetch('script');
	?>
	<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
	<body>

<!-- NAVBAR: barra de navegação no topo -->
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/HTML/cakephp/posts">Meu Blog</a>
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

<!-- CONTAINER: centraliza e limita a largura do conteúdo -->
<div class="container">

    <?php echo $this->Flash->render(); ?>

    <?php echo $this->fetch('content'); ?>

</div>

<!-- FOOTER -->
<footer class="text-center text-muted mt-5 py-3 border-top">
    <p><?php echo $cakeVersion; ?></p>
</footer>
</body>
</html>

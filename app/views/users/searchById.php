<?php ob_start(); ?>

<h1>List of Users</h1>
<div>
    <span>Name : <?= $user['name'] ?></span>
</div>
<a href="<?= $config['app']['base_url']; ?>">Go to Home</a>

<?php $content = ob_get_clean(); ?>

<?php $title = 'List of Users'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
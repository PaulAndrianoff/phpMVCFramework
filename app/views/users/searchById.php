<?php ob_start(); ?>

<h1>List of Users</h1>
<div>
    <span>Name : <?= $user['username'] ?></span>
</div>
<a href="<?= $config['app']['base_url']; ?>dashboard">Go to Dashboard</a>

<?php $content = ob_get_clean(); ?>

<?php $title = 'List of Users'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
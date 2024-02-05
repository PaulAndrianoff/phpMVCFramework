<?php ob_start(); ?>

<h1>List of Users</h1>
<ul>
    <?php foreach ($data['users'] as $user): ?>
        <li><?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></li>
    <?php endforeach; ?>
</ul>
<a href="<?= $config['app']['base_url']; ?>dashboard">Go to Dashboard</a>

<?php $content = ob_get_clean(); ?>

<?php $title = 'List of Users'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
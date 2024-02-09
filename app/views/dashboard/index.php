<?php ob_start(); ?>

<h1>Dashboard</h1>

<ul>
    <?php foreach ($data as $key => $table): ?>
        <li><a href="<?= getLink('dashboard/edit/' . $key) ?>"><?= ucfirst($key) ?></a></li>
    <?php endforeach; ?>
</ul>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Dashbaord Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
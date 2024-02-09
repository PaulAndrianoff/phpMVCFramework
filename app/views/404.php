<?php ob_start(); ?>

<h1><?= getTrad('oops') ?></h1>
<p><?= getTrad('404') ?></p>
<a href="<?= getLink('') ?>"><?= getTrad('return home') ?></a>

<?php $content = ob_get_clean(); ?>

<?php $title = '404 Page'; ?>

<?php include(__DIR__ . '/layout.php'); ?>
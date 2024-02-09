<?php ob_start(); ?>

<h1>Oops!</h1>
<p>We can't seem to find the page you're looking for.</p>
<a href="<?= getLink('') ?>">Go to Home</a>

<?php $content = ob_get_clean(); ?>

<?php $title = '404 Page'; ?>

<?php include(__DIR__ . '/layout.php'); ?>
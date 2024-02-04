<?php ob_start(); ?>

<h1>Welcome to Our Application</h1>
<p>This is the home page.</p>
<p><?php echo app\helpers\TemplateFunctions::test(); ?></p>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>

<aside>
    <h3>Sidebar Content</h3>
    <p>Links, info, etc.</p>
</aside>

<?php $sidebar = ob_get_clean(); ?>

<?php $title = 'Home Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
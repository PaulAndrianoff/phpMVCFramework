<?php ob_start(); ?>

<h1>Dashboard</h1>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php $sidebar = ob_get_clean(); ?>

<?php $title = 'Dashbaord Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
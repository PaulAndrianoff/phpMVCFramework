<?php ob_start(); ?>

<form action="#" method="post">
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
<a href="<?= $config['app']['base_url']; ?>register">Register</a>


<?php $content = ob_get_clean(); ?>

<?php $title = 'Login Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
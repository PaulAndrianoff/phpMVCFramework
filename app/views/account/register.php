<?php ob_start(); ?>

<form action="#" method="post">
    Username: <input type="text" name="username"><br>
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Register">
</form>
<div class="center mb">
    <a href="<?= $config['app']['base_url']; ?>login">Already registered</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Register Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
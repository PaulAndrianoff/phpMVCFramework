<?php ob_start(); ?>

<?php include(__DIR__ . '/../formError.php'); ?>
<form action="#" method="post">
    Username: <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>">
    Email: <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
    Password: <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>">
    <input type="submit" value="Register">
</form>
<div class="center mb">
    <a href="<?= getLink('login'); ?>">Already registered</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Register Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
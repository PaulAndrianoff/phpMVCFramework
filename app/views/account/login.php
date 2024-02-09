<?php ob_start(); ?>

<form action="#" method="post">
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
<div class="center mb">
    <a href="<?= getLink('register'); ?>">Register</a>
</div>
<?php $content = ob_get_clean(); ?>

<?php $title = 'Login Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
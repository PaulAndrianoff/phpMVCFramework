<?php ob_start(); ?>
<?php if (0 < count($errors)): ?>
<div class="form--error">
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
<form action="#" method="post">
    Username: <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>">
    Email: <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
    Password: <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>">
    <input type="submit" value="Register">
</form>
<div class="center mb">
    <a href="<?= $config['app']['base_url']; ?>login">Already registered</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Register Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
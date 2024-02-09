<?php ob_start(); ?>

<?php include(__DIR__ . '/../formError.php'); ?>
<form action="#" method="post">
    <?= getTrad('username') ?>: <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>">
    <?= getTrad('email') ?>: <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
    <?= getTrad('password') ?>: <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>">
    <input type="submit" value="<?= getTrad('register') ?>">
</form>
<div class="center mb">
    <a href="<?= getLink('login'); ?>"><?= getTrad('Already registered') ?></a>
</div>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Register Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
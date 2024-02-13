<?php ob_start(); ?>

<?php include(__DIR__ . '/../formError.php'); ?>
<form action="#" method="post">
    <div>
        <label for="username"><?= getTrad('username') ?></label>
        <input id="username" type="text" name="username" value="<?= $_POST['username'] ?? '' ?>">
    </div>
    <div>
        <label for="email"><?= getTrad('email') ?></label>
        <input id="email" type="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
    </div>
    <div>
        <label for="password"><?= getTrad('password') ?></label>
        <input id="password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>">
    </div>
    <input type="submit" value="<?= getTrad('register') ?>">
</form>
<div class="center mb">
    <a href="<?= getLink('login'); ?>"><?= getTrad('Already registered') ?></a>
</div>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Register Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
<?php ob_start(); ?>

<form action="#" method="post">
    <?= getTrad('email') ?>: <input type="text" name="email"><br>
    <?= getTrad('password') ?>: <input type="password" name="password"><br>
    <input type="submit" value="<?= getTrad('login') ?>">
</form>
<div class="center mb">
    <a href="<?= getLink('register'); ?>"><?= getTrad('register') ?></a>
</div>
<?php $content = ob_get_clean(); ?>

<?php $title = 'Login Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
<?php ob_start(); ?>

<form action="#" method="post">
    <div>
        <label for="email"><?= getTrad('email') ?></label>
        <input type="text" name="email" id="email">
    </div>
    <div>
        <label for="password"><?= getTrad('password') ?></label>
        <input type="password" name="password" id="password">
    </div>
    <input type="submit" value="<?= getTrad('login') ?>">
</form>
<div class="center mb">
    <a href="<?= getLink('register'); ?>"><?= getTrad('register') ?></a>
</div>
<?php $content = ob_get_clean(); ?>

<?php $title = 'Login Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
<header class="header">
    <div class="container">
        <h2><a href="<?= getLink(''); ?>"><?= getAppName(); ?></a></h2>
        <nav>
            <ul>
                <?php if (isset($session['username'])): ?>
                    <li><a href="<?= getLink('dashboard'); ?>"><?= getTrad('dashboard') ?></a></li>
                    <li><a href="<?= getLink('logout'); ?>"><?= getTrad('logout') ?></a></li>
                <?php else: ?>
                    <li><a href="<?= getLink('login'); ?>"><?= getTrad('login') ?></a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</header>
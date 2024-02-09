<header class="header">
    <div class="container">
        <h2><a href="<?= getLink(''); ?>"><?= getAppName(); ?></a></h2>
        <nav>
            <ul>
                <?php if (isset($session['username'])): ?>
                    <li><a href="<?= getLink('dashboard'); ?>">Dashboard</a></li>
                    <li><a href="<?= getLink('logout'); ?>">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?= getLink('login'); ?>">Login</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</header>
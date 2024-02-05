<header>
    <h2><a href="<?= $config['app']['base_url']; ?>"><?= $config['app']['app_name']; ?></a></h2>
    <nav>
        <ul>
            <?php if (isset($session['username'])): ?>
                <li><a href="<?= $config['app']['base_url']; ?>logout">Logout</a></li>
            <?php else: ?>
                <li><a href="<?= $config['app']['base_url']; ?>login">Login</a></li>
            <?php endif ?>
        </ul>
    </nav>
</header>
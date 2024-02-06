<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $config['app']['app_name']; ?> - <?php echo $title ?? 'Default Title'; ?></title>
    <link rel="stylesheet" href="<?= $config['app']['base_url']; ?>css/main.css">
</head>
<body>
    <?php include('partials/header.php'); ?>

    <div class="container">
        <main>
            <?php echo $content ?? 'Default Content'; ?>
        </main>
    </div>

    <aside>
        <?php echo $sidebar ?? ''; ?>
    </aside>


    <?php include('partials/footer.php'); ?>
</body>
</html>

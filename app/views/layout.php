<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Name - <?php echo $title ?? 'Default Title'; ?></title>
    <link rel="stylesheet" href="<?= $config['app']['base_url']; ?>css/main.css">
</head>
<body>
    <?php include('partials/header.php'); ?>

    <main>
        <?php echo $content ?? 'Default Content'; ?>
    </main>

    <aside>
        <?php echo $sidebar ?? ''; ?>
    </aside>


    <?php include('partials/footer.php'); ?>
</body>
</html>

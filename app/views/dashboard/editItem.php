<?php ob_start(); ?>

<h1>Editing Table: <?= escapeHtml($table); ?></h1>
<?php include(__DIR__ . '/../formError.php'); ?>
<form action="#" method="post">
    <?php foreach (array_keys($model) as $column): ?>
        <?php if ('textarea' === $model[$column]['type'] && $model[$column]['display']): ?>
            <label><?= formatLabel($column); ?></label>
            <textarea name="<?= $column ?>" cols="30" rows="10"><?= $_POST['username'] ?? $data[$column] ?? '' ?></textarea>
        <?php elseif ($model[$column]['display']): ?>
            <label><?= formatLabel($column); ?></label>
            <input type="<?= $model[$column]['type'] ?>" name="<?= $column ?>" value="<?= $_POST['username'] ?? $data[$column] ?? '' ?>" />
        <?php else: ?>
            <input type="hidden" name="<?= $column ?>" />
        <?php endif; ?>
    <?php endforeach ?>
    <input type="submit" value="Save Changes">
</form>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Dashbaord Page - ' . escapeHtml($table); ?>

<?php include(__DIR__ . '/../layout.php'); ?>
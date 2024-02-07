<?php ob_start(); ?>

<h1>Editing Table: <?= htmlspecialchars($table); ?></h1>
<?php include(__DIR__ . '/../formError.php'); ?>
<form action="#" method="post">
    <?php foreach (array_keys($model) as $column): ?>
        <label><?= app\helpers\TemplateFunctions::formatLabel($column); ?></label>
        <input type="<?= $model[$column]['type'] ?>" name="<?= $column ?>" value="<?= $_POST['username'] ?? $data[$column] ?? '' ?>" />
    <?php endforeach ?>
    <input type="submit" value="Save Changes">
</form>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Dashbaord Page - ' . htmlspecialchars($table); ?>

<?php include(__DIR__ . '/../layout.php'); ?>
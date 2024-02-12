<?php ob_start(); ?>

<h1>Editing Table: <?= escapeHtml($table); ?></h1>
<?php include(__DIR__ . '/../formError.php'); ?>
<form action="#" method="post" enctype="multipart/form-data">
    <?php foreach (array_keys($model) as $column): ?>
        <?php if ('textarea' === $model[$column]['type'] && $model[$column]['display']): ?>
            <div class="input--container">
                <label for="<?= $column ?>"><?= formatLabel($column); ?></label>
                <textarea name="<?= $column ?>" cols="30" rows="10" id="<?= $column ?>"><?= $_POST[$column] ?? $data[$column] ?? '' ?></textarea>
            </div>
        <?php elseif ('file' === $model[$column]['type'] && $model[$column]['display']): ?>
            <div class="input--container">
                <div class="input--file">
                    <input type="file" name="<?= $column ?>" id="<?= $column ?>" class="input--hidden">
                    <label for="<?= $column ?>" class="button button--primary" id="<?= $column ?>--button"><?= getTrad('select file') ?></label>
                    <span class="<?= $column ?>--name"><?= getCleanFileName($_POST[$column] ?? $data[$column] ?? '') ?></span>
                </div>              
            </div>
        <?php elseif ('select' === $model[$column]['type'] && $model[$column]['display']): ?>
            <div class="input--container">
                <label for="<?= $column ?>"><?= formatLabel($column); ?></label>
                <?php 
                        $options = getOptions($model[$column]['options']);
                    ?>
                <select name="<?= $column ?>" id="<?= $column ?>" value="<?= $_POST[$column] ?? $data[$column] ?? '' ?>>
                    <?php foreach ($options as $option): ?>
                        <option value="<?= $option['id'] ?>"><?= $option['name'] ?></option>
                    <?php endforeach; ?>
                </select>             
            </div>
        <?php elseif ($model[$column]['display']): ?>
            <div class="input--container">
                <label for="<?= $column ?>"><?= formatLabel($column); ?></label>
                <input type="<?= $model[$column]['type'] ?>" name="<?= $column ?>" id="<?= $column ?>" value="<?= $_POST[$column] ?? $data[$column] ?? '' ?>" />
            </div>
        <?php else: ?>
            <input type="hidden" name="<?= $column ?>" />
        <?php endif; ?>
    <?php endforeach ?>
    <input type="submit" value="<?= getTrad('save change') ?>">
</form>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>

<scripts>
    <script src="<?= getLink('js/uploadfile.js'); ?>"></script>
</scripts>

<?php $scripts = ob_get_clean(); ?>

<?php $title = 'Dashbaord Page - ' . escapeHtml($table); ?>

<?php include(__DIR__ . '/../layout.php'); ?>
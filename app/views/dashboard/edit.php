<?php ob_start(); ?>

<h1>Editing Table: <?= escapeHtml($table); ?></h1>
<a class="button" href="<?= getLink('dashboard/new/' . escapeHtml($table)) ?>">+ add</a>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($data)) {
                foreach (array_keys($data[0]) as $column) {
                    echo "<th>" . escapeHtml($column) . "</th>";
                }
                echo "<th>" . getTrad('greeting') . "</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
        <tr>
            <?php foreach ($row as $key => $value): ?>
                <?php if ('path' === $key): ?>
                    <td><a href="<?= getLink($value, 'file'); ?>"><?= getCleanFileName(escapeHtml($value)); ?></a></td>
                <?php else: ?>
                    <td><?= escapeHtml($value); ?></td>
                <?php endif; ?>
            <?php endforeach; ?>
            <td>
                <a href="<?= getLink('dashboard/edit/' . escapeHtml($table) . '/' . $row['id']); ?>"><?= getTrad('edit') ?></a> |
                <a href="<?= getLink('dashboard/delete/' . escapeHtml($table) . '/' . $row['id']); ?>" onclick="return confirm('Are you sure?');"><?= getTrad('delete') ?></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Dashbaord Page - ' . escapeHtml($table); ?>

<?php include(__DIR__ . '/../layout.php'); ?>
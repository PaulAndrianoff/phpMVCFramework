<?php ob_start(); ?>

<h1>Editing Table: <?= htmlspecialchars($table); ?></h1>

<form action="#" method="post">
    <a href="<?= $config['app']['base_url']; ?>dashboard/new/<?= htmlspecialchars($table); ?>">+ add</a>
    <table>
        <thead>
            <tr>
                <?php
                if (!empty($data)) {
                    foreach (array_keys($data[0]) as $column) {
                        echo "<th>" . htmlspecialchars($column) . "</th>";
                    }
                    echo "<th>Actions</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <?php foreach ($row as $value): ?>
                    <td><?= htmlspecialchars($value); ?></td>
                <?php endforeach; ?>
                <td>
                    <a href="<?= $config['app']['base_url']; ?>dashboard/edit/<?= htmlspecialchars($table); ?>/<?= $row['id']; ?>">Edit</a> |
                    <a href="<?= $config['app']['base_url']; ?>dashboard/delete/<?= htmlspecialchars($table); ?>/<?= $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Dashbaord Page - ' . htmlspecialchars($table); ?>

<?php include(__DIR__ . '/../layout.php'); ?>
<?php if (0 < count($errors)): ?>
<div class="form--error">
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
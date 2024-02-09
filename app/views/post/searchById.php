<?php ob_start(); ?>

<div class="post col mb">
    <span class="tag"><?= $post['name'] ?></span>
    <h4 class="date"><?= $post['updated_at'] ?></h4>
    <h2><?= $post['title'] ?></h2>
    <p><?php echo $post['headline']; ?></p>
    <p><?php echo $post['body']; ?></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php $title = 'List of Users'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
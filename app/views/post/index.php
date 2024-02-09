<?php ob_start(); ?>

<h1>Articles</h1>
<div class="posts">
    <?php foreach ($data['posts'] as $post): ?>
        <div class="post">
            <span class="tag"><?= $post['name'] ?></span>
            <h4 class="date"><?= $post['updated_at'] ?></h4>
            <h2><?= $post['title'] ?></h2>
            <p><?php echo $post['headline']; ?></p>
            <a href="<?= getLink('articles/' . $post['id']) ?>" class="button button--primary"><?= getTrad('learn more') ?></a>
        </div>
    <?php endforeach; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php $title = 'List of articles'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
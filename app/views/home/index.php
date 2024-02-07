<?php ob_start(); ?>

<h1>Welcome to Our Application</h1>
<div class="posts">
    <?php foreach ($data as $post): ?>
        <div class="post">
            <span class="tag"><?= $post['name'] ?></span>
            <h4 class="date"><?= $post['updated_at'] ?></h4>
            <h2><?= $post['title'] ?></h2>
            <p><?php echo $post['body']; ?></p>
            <h4 class="author"><?= $post['author'] ?></h4>
        </div>
    <?php endforeach; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>

<!-- <aside>
    <h3>Sidebar Content</h3>
    <p>Links, info, etc.</p>
</aside> -->

<?php $sidebar = ob_get_clean(); ?>

<?php $title = 'Home Page'; ?>

<?php include(__DIR__ . '/../layout.php'); ?>
<?php include '../resources/views/layouts/header.php'; ?>

<?php include '../resources/views/menu.php'; ?>

<h2><?= $pageTitle; ?></h2>

<ul>
    <?php foreach ($newsCategory as $category => $path): ?>
    <li>
        <a href="<?= route('news::fromCategory', $path); ?>">
            <?= $category; ?>
        </a>
    </li>
    <?php endforeach; ?>
</ul>

<?php include '../resources/views/layouts/footer.php'; ?>


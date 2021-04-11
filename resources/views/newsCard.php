<?php include '../resources/views/layouts/header.php'; ?>

<?php include '../resources/views/menu.php'; ?>

<h2><?= $pageTitle; ?></h2>

    <a href="<?= route('news::fromCategory', $fullNews['link']); ?>">
        Назад в категорию "<?= $fullNews['cat']; ?>"
    </a>

<section>
    <h3><?= $fullNews['title']; ?></h3>
    <p><?= $fullNews['text']; ?></p>
</section>

<?php include '../resources/views/layouts/footer.php'; ?>


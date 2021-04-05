<?php include '../resources/views/layouts/header.php'; ?>

<?php include '../resources/views/menu.php'; ?>

<h2><?= $pageTitle; ?></h2>

<?php foreach ($news['news'] as $item): ?>
    <section>
        <h3><?= $item['title']; ?></h3>
        <p><?= $item['desc']; ?></p>
        <a href="<?= route('news::card', [$item['category'], $item['slug']]); ?>">
            Читать
        </a>
    </section>
<?php endforeach; ?>
    

<?php include '../resources/views/layouts/footer.php'; ?>


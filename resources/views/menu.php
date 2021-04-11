<?php
    $menu = [
        'Главная' => '/',
        'Каталог новостей' => '/news_catalog',
    ];
?>

<nav>
    <ul>
    <?php foreach ($menu as $page => $path): ?>
        <?php if ($page == $activePage): ?>
        <li>
            <a href="<?= $path; ?>" style="color: red">
                <?= $page; ?>
            </a>
        </li>
        <?php else: ?>
        <li>
            <a href="<?= $path; ?>">
                <?= $page; ?>
            </a>
        </li>
        <?php endif; ?>
    <?php endforeach; ?>
    </ul>
</nav>


<?php include '../resources/views/layouts/header.php'; ?>

<h2><?= $pageTitle; ?></h2>

<form action="<?= route('admin::auth'); ?>" method="POST">

    <?php if (isset($authMsg)): ?>
    <p><?= $authMsg; ?></p>
    <?php endif; ?>

    <p>
        <span>Логин:</span>
        <span><input type="text" name="login"></span>
    </p>
    <p>
        <span>Пароль:</span>
        <span><input type="password" name="password"></span>
    </p>
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
    <input type="submit" name="adminAuth" value="Войти">
</form>

<?php include '../resources/views/layouts/footer.php'; ?>

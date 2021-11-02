<?
include_once 'functions/main.php';
if (is_not_logged_in()) {
    redirect_to('page_login');
}
$user = get_user_by_id($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Безопаность</title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="/public/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="/public/css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="/public/css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="/public/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/public/css/fa-brands.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
        <a class="navbar-brand d-flex align-items-center fw-500" href="users.php"><img alt="logo" class="d-inline-block align-top mr-2" src="/public/img/logo.png"> Учебный проект</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <? if (is_not_logged_in()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="page_login.php">Войти</a>
                    </li>
                <? else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Выйти</a>
                    </li>
                <? endif; ?>
            </ul>
        </div>
    </nav>
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-lock'></i> Безопасность
            </h1>
        </div>
        <? if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <strong>Уведомление!</strong> <span><? display_flash_message('success') ?></span>
            </div>
        <? endif;
        if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger text-dark" role="alert">
                <strong>Уведомление!</strong> <span><? display_flash_message('error') ?></span>
            </div>
        <? endif; ?>
        <form action="edit_user.php" method="POST">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Обновление эл. адреса и пароля</h2>
                            </div>

                            <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                            <div class="panel-content">
                                <!-- email -->
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" value="<?= $user['email'] ?>">
                                </div>
                                <!-- password -->
                                <div class="form-group">
                                    <label class="form-label" for="password">Пароль</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <!-- password confirmation-->
                                <div class="form-group">
                                    <label class="form-label" for="password2">Подтверждение пароля</label>
                                    <input type="password" name="password2" id="password2" class="form-control">
                                </div>
                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-warning">Изменить</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script src="/public/js/vendors.bundle.js"></script>
    <script src="/public/js/app.bundle.js"></script>
</body>

</html>
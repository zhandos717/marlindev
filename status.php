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
    <title>Document</title>
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
                <i class='subheader-icon fal fa-sun'></i> Установить статус
            </h1>
        </div>
        <form action="edit_user.php" method="POST">
            <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Установка текущего статуса</h2>
                            </div>
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- status -->
                                        <div class="form-group">
                                            <label class="form-label" for="example-select">Выберите статус</label>
                                            <select class="form-control" name="status" id="example-select">
                                                <option><?= $user['status'] ?></option>
                                                <option>Онлайн</option>
                                                <option>Отошел</option>
                                                <option>Не беспокоить</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                        <button type="submit" class="btn btn-warning">Установить статус</button>
                                    </div>
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
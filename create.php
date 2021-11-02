<?php
include_once 'functions/main.php';
include_once 'functions/create_user.php';
include_once 'functions/upload_image.php';

if ($_FILES['file']) {
    $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $upload_dir = 'public/upload/user-' . $_POST['id'] . '.' . $file_extension;

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir)) {
        set_flash_message('error', 'ошибка загрузки автара.');
        redirect_to('create_user');
    }
    $_POST['avatar'] = $upload_dir;
}
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
if (create_user($_POST)) {
    set_flash_message('success', 'Профиль успешно добавлен.');
};
redirect_to('users');

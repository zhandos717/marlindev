<?php
    include_once 'functions/main.php';
    include_once 'functions/edit_user.php';
    include_once 'functions/upload_image.php';
    if($_SESSION['user']['role'] != 1){
         if($_SESSION['user']['id'] != $_POST['id']){
            set_flash_message('error', 'У вас нет доступа для редактирования других пользователей.');
            redirect_to('users');
        }
    }
    if($_FILES['file']){
        $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $upload_dir = 'public/upload/user-' . $_POST['id'].'.'.$file_extension;
       if(!move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir)){
        set_flash_message('error', 'ошибка загрузки автара.');
        redirect_to('media','?id='. $_POST['id']);
       }
       $_POST['avatar'] = $upload_dir;
    }
    if (isset($_POST['password'])) {
        if ($_POST['password'] != $_POST['password2']){
            set_flash_message('error', 'Пароли не совпадают.');
            redirect_to('security', '?id=' . $_POST['id']);
        }
        unset($_POST['password2']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT );
    }
    if(update_user($_POST)){
        set_flash_message('success', 'Профиль успешно обновлен.');
    };

    redirect_to('users');



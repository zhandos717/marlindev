<?php
    include_once 'functions/main.php';
    include_once 'functions/create_user.php';

    if(get_user_by_email($_POST['email'])){
        set_flash_message('error', 'Этот эл. адрес уже занят другим пользователем.');
        redirect_to('page_register');
    }
    create_user($_POST);
    set_flash_message('success', 'Вы успешно зарегистрированы!');
    redirect_to('page_login');



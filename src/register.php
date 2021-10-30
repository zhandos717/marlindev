<?php 
    include_once 'functions/authorization.php';

    if(get_user_by_email($_POST['email'])){
        set_flash_message('error', 'Этот эл. адрес уже занят другим пользователем.');
        redirect_to('page_register');
    }

    add_user($_POST['email'], $_POST['password']);
    set_flash_message('success', 'Вы успешно зарегистрированы!');
    redirect_to('page_login');



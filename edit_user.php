<?php
    include_once 'functions/main.php';
    include_once 'functions/edit_user.php';
    if(update_user($_POST)){
        set_flash_message('success', 'Профиль успешно обновлен.');
    };
    redirect_to('users');



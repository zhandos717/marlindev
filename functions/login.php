<?php
/**
 * Description: поиск пользователя по эл. адресу
 * @param string $email
 * @param string $password
 * @return bool 
 */
function login(string $email, string $password): bool
{
    $user = get_user_by_email($email);

    if(empty($user)) {
        set_flash_message('error', 'Пользыватель не найден!');
        return false;
    } 
    elseif (!password_verify($password, $user['password'])) {
        set_flash_message('error', 'Пароль не верный!');
        return false;
    }
    $_SESSION['user'] = $user;
    return true;
}

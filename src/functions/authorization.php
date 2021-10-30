<?php
    include_once 'functions/main.php';
    include_once 'db.php';
/**
 * Description: поиск пользователя по эл. адресу
 * @param string $email
 * @param string $password
 * @return bool 
 */
function login(string $email, string $password)
{
    $sql = "SELECT email, password  FROM users WHERE email=:email LIMIT 1";
    $params = ['email' => $email];
    $result = query($sql, $params)->fetch(PDO::FETCH_ASSOC);

    if(empty($result)) {
        set_flash_message('error', 'Пользыватель не найден!');
        return false;
    } 
    elseif (!password_verify($password, $result['password'])) {
        set_flash_message('error', 'Пароль не верный!');
        return false;
    }
    return true;
}

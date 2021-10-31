<?php
include_once 'db.php';
/**
 * Description: Добавить пользователя в бд
 * @param string $email
 * @param string $password
 * @return int user id 
 */
function add_user(string $email, string $password): int
{
    $sql = "INSERT INTO `users`(email, password) VALUES (:email, :password)";
    $params = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ];
    query($sql, $params);
    return get_user_by_email($email)['id'];
}

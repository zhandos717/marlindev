<?php
include_once 'db.php';
/**
 * Description: поиск пользователя по эл. адресу
 * @param string $email
 * @return array 
 */
function get_user_by_email($email)
{
    $sql = "SELECT id FROM users WHERE email=:email LIMIT 1";
    
    $params = ['email' => $email];

    $result =query($sql, $params)->fetch(PDO::FETCH_ASSOC);

    return $result["id"];
}
/**
 * Description: Добавить пользователя в бд
 * @param string $email
 * @param string $password
 * @return int user id 
 */
function add_user($email, $password)
{
    $sql = "INSERT INTO `users`(email, password) VALUES (:email, :password)";
    $params = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ];
    query($sql, $params);
    return get_user_by_email($email)['id'];
}

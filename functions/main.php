<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once 'db.php';
/**
     * Description: получить пользователя по электронной почте
     * @param string $email
     * @return array 
     */
    function get_user_by_email(string $email)
    {
        $sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
        $params = ['email' => $email];
        $user = query($sql, $params)->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    /**
     * Description: Вывести флеш сообщение
     * @param string $name
     * @param string $message
     * @return null 
     */
    function set_flash_message(string $name,string $message): void
    {
        $_SESSION[$name] = $message;
    }
    /**
     * Description: Вывести флеш сообщение
     * @param string $name
     * @return null 
     */
    function display_flash_message(string $name): void
    {
        if ($_SESSION[$name]) {
            echo $_SESSION[$name];
            unset($_SESSION[$name]);
        }
    }
    /**
     * Description: Перенаправить на другую страницу
     * @param string $path
     * @return null 
     */
    function redirect_to(string $path): void
    {
        header('Location: /' . $path . '.php');
        exit;
    }
    /**
     * Description: Проверка авторизации пользователя
     * @param string $path
     * @return bool 
     */
    function is_not_logged_in():bool
    {
        if(!isset($_SESSION['user']))
        { 
            return true;
        }

        return false;
    }
    /**
     * Description: Получить всех пользователей
     * @param int $id_user
     * @return array  user
     */
    function get_user_by_id(int $id_user)
    {
        $sql = "SELECT * FROM users WHERE id=:id LIMIT 1";
        $params = ['id' => $id_user];
        return query($sql, $params)->fetch(PDO::FETCH_ASSOC);;
    }
    /**
     * Description: Получить всех пользователей
     * @param null
     * @return array  users
     */
    function get_users()
    {
        $pdo = dbh();
        $sql = "SELECT * FROM users";
        return $pdo->query($sql);
    }
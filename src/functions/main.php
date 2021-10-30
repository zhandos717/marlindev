<?php
    session_start();
    /**
     * Description: получить пользователя по электронной почте
     * @param string $email
     * @return array 
     */
    function get_user_by_email($email)
    {
        $sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
        $params = ['email' => $email];
        $result = query($sql, $params)->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    /**
     * Description: Вывести флеш сообщение
     * @param string $name
     * @param string $message
     * @return null 
     */
    function set_flash_message($name, $message)
    {
        $_SESSION[$name] = $message;
    }
    /**
     * Description: Вывести флеш сообщение
     * @param string $name
     * @return null 
     */
    function display_flash_message($name)
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
    function redirect_to($path)
    {
        header('Location: /' . $path . '.php');
        exit;
    }
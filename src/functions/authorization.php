<?php
        include_once 'db.php';    
    /**
     * Description: поиск пользователя по эл. адресу
     * @param string $email
     * @return array 
     */
        function get_user_by_email($email)
        {
            $pdo = dbh();
            $sql = "SELECT * FROM users WHERE email=:email LIMIT 1"; 
            $result = $pdo->prepare($sql);
            $result->bindvalue(':email', $email);   
            $result->execute();
            $user = $result->fetchAll();
            return $user[0];
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
                'email'=> $email,
                'password'=> $password
            ];
            query($sql, $params);
            return get_user_by_email($email)['id'];
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
            if($_SESSION[$name]){
                echo $_SESSION[$name];
                //unset($_SESSION[$name]);
            }
        }
        /**
         * Description: Перенаправить на другую страницу
         * @param string $path
         * @return null 
         */
        function redirect_to($path)
        {
            header('Location: /'. $path.'.php');
            exit;
        }
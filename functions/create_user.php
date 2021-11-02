<?php
    /**
     * Description: Добавить пользователя в бд
     * @param string $email
     * @param string $password
     * @return int user id 
     */
    function create_user(array $params)
    {
        if (create('users', $params)) {
            return true;
        }
        return false;
    }

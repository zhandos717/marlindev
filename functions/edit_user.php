<?php
    /**
     * Description: Добавить пользователя в бд
     * @param string $email
     * @param string $password
     * @return int user id 
     */
    function update_user(array $params)
    {
       if(update_by_id('users', $params)){
           return true;
       }
        return false;
    }

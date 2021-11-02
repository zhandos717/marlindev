<?php

/**
 * Description: Добавить пользователя в бд
 * @param array $params data
 * @return bool 
 */
    function create_user(array $params): bool
    {
        if(!empty($params['password']))
            $params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);
            
        if (create('users', $params)) {
            return true;
        }
        return false;
    }

<?php
   
    /**
     * Description: Подключение к базе данных
     * @return  PDO 
     */
    function dbh(){
        $dsn = "mysql:host=127.0.0.1:3306;dbname=marlindev;charset=utf8";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        return new PDO($dsn, 'root', '', $opt);
    }

/**
 * Description: Запись в базу данных
 * @param string $sql
 * @param array $params
 * @return  mixed
 */

    function query(string $sql, array $params)
    {
        $pdo = dbh();
        $stmt = $pdo->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':' . $key, $val, $type);
            }
        }
        $stmt->execute();
        return $stmt;
    }

?>
<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once 'db.php';


function dd($data)
{
    highlight_string("<?php\n " . var_export($data, true) . "?>");
    echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
    die();
}

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
function set_flash_message(string $name, string $message): void
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
function redirect_to(string $path, string $get =''): void
{
    header('Location: /' . $path . '.php'.$get);
    exit;
}
/**
 * Description: Проверка авторизации пользователя
 * @param string $path
 * @return bool 
 */
function is_not_logged_in(): bool
{
    if (!isset($_SESSION['user'])) {
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
    $params = $_SESSION['user']['role'] == 1 ? ['id' => $id_user] : ['id' => $_SESSION['user']['id']] ;
    return query($sql, $params)->fetch(PDO::FETCH_ASSOC);
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

    if($_SESSION['user']['role'] == 1){
        return $pdo->query($sql);
    }else {
        $sql .= ' WHERE id= :id';
        $params = ['id' => $_SESSION['user']['id']];
        return query($sql, $params);
    }
}

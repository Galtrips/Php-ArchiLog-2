<?php
require_once __DIR__ . "/vendor/autoload.php";

use app\Database;
use app\Form;

session_start();
ob_start();
$path = $_SERVER['PATH_INFO']??"/";

/*
spl_autoload_register(function ($class) {
    require_once __DIR__ . "/" . str_replace('\\', '/', $class) .".php";
});*/

$pdo = new Database();

if (!isset($_SESSION['user']) && $path != "/login") {
    header("Location: /login");
    exit();
}

switch($path) {
    
    case "/":
        include __DIR__ . "/index.php";
        break;   

    case "/login":
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            include __DIR__ . "/login.php";
        } else {
            include __DIR__ . "/traitement-form-connect.php";
        }
        break;

    case "/form-edit":
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            include __DIR__ . "/form-edit.php";
        } else {
            include __DIR__ . "/traitement-form-add-ticket.php";
        }
        break;

    case "/todo-list":
        include __DIR__ . "/todo-list.php";
        break;

    case "/logout":

        $_SESSION = [];
        session_destroy();
        header('Location: /login');
        exit();
    
    default:
        echo("<title>ERROR 404</title>");
        echo("ERROR 404 :");
        header("HTTP/1.1 404 Not Found");
        break;
}

$constant = ob_get_clean();
echo $constant;
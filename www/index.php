<?php

require_once "vendor/autoload.php";
require_once 'config/twig.php';
session_start();

require_once './config/config.php';
require_once './functions/all.php';

$_SESSION['errors'] = $_SESSION['errors'] ?? [];
$_SESSION['success'] = $_SESSION['success'] ?? [];

// Базовые данные для всех шаблонов
$twigData = [
    'host' => HOST,
    'root' => ROOT,
    'session' => $_SESSION,
    'current_page' => getModuleName() ?: 'main'
];

// Роутинг
$module = getModuleName();
switch ($module) {
    case '':
    case 'main':
        echo $twig->render('main/main.twig', $twigData);
        break;

    case 'about':
        echo $twig->render('about/about.twig', $twigData);
        break;

    case 'login':
        echo $twig->render('login/login.twig', $twigData);
        break;

    case 'register':
        echo $twig->render('login/register.twig', $twigData);
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        echo $twig->render('errors/404.twig', $twigData);
        break;
}

// Очищаем сообщения после их отображения
unset($_SESSION['errors']);
unset($_SESSION['success']);
<?php
require_once 'config.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(ROOT . './../views');

// Настройки Twig
$twig = new Environment($loader, [
//    'cache' => __DIR__ . '/../../var/cache/twig',
    'debug' => true, // В разработке - true
    'auto_reload' => true // Автоперезагрузка шаблонов
]);

return $twig;
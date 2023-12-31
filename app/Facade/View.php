<?php

namespace zaiimrq\Facade;

class View
{
    public static function render(string $view): void
    {
        require_once __DIR__ . '/../Views/Layouts/Header.php';
        require_once __DIR__ . '/../Views/' . $view . '.php';
        require_once __DIR__ . '/../Views/Layouts/Footer.php';
    }

    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}

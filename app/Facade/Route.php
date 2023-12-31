<?php

namespace zaiimrq\Facade;

class Route
{
    private static array $routes;

    public static function register(string $method, string $path, array $controller, array $middleware = []): void
    {
        self::$routes[] = [
            "method"        => $method,
            "path"          => $path,
            "controller"    => $controller,
            "middleware"    => $middleware
        ];
    }

    public static function boot(): mixed
    {
        $path       = $_SERVER["QUERY_STRING"] !== "" ? $_SERVER["QUERY_STRING"] : '/';
        $method     = $_SERVER["REQUEST_METHOD"];

        foreach (self::$routes as $route) {

            $pattern = "#^" . $route['path'] . "$#";

            if (preg_match($pattern, $path, $variables) && $route['method'] == $method) {

                foreach ($route['middleware'] as $middleware) {

                    $middleware = new $middleware;
                    $middleware->middleware();
                }

                array_shift($variables);
                array_slice($route['controller'], 0, 2);

                $controller = new $route['controller'][0];
                $function   = $route['controller'][1];

                return call_user_func_array([$controller, $function], $variables);
            }
        }

        return http_response_code(404);
    }

    public static function is(string $path): bool
    {
        return ($_SERVER["QUERY_STRING"] !== "" ? $_SERVER["QUERY_STRING"] : '/') == $path;
    }
}

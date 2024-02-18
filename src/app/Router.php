<?php

namespace GithubStatus;

use Exception;

class Router
{
    private array $routes;

    public function addRoute(string $method, string $url, callable $action): static
    {
        $method = strtoupper($method);

        $this->routes[$method][$url] = $action;
        return $this;
    }

    public function get(string $url, string $controller, callable $action)
    {
        $this->addRoute('GET', $url, $action);
        return $this;
    }



    public function resolve(string $method, string $uri)
    {
        $method = strtoupper($method);

        if (!isset($this->routes[$method][$uri])) {
            throw new Exception("Route: Rota não encontrada: {$uri}");
        }

        $action = $this->routes[$method][$uri] ?? null;

        if ($action === null || !is_callable($action)) {
            throw new Exception('Route: Não foi possível executar a ação selecionada');
        }


        return call_user_func($action);
    }
}

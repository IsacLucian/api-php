<?php

class Router {

    public function get($route, $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return false;
        }

        $this->handleRoute($route, $controller);
    }

    public function post($route, $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $this->handleRoute($route, $controller);
    }

    public function delete($route, $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return false;
        }

        $this->handleRoute($route, $controller);
    }

    private function handleRoute($route, $controller)
    {
        $parameters = $this->routeParameters($route);
        if (! $this->isCurrentUrl($route, $parameters)) {
            return false;
        }

        $controller = explode('@', $controller);
        $controllerPath = $controller[0];
        $controllerMethod = $controller[1];

        $explodeBySlash = explode('/', $controllerPath);
        $controllerName = $explodeBySlash[count($explodeBySlash) - 1];

        require_once(ROOT_DIR . '/controllers/' . $controllerPath . '.php');

        $controllerInstance = new $controllerName;


        call_user_func([$controllerInstance, $controllerMethod], $parameters);
    }

    private function getRouteParameterIndex($key, $route)
    {
        if (empty($key)) {
            return false;
        }

        return array_search('%'.$key.'%', array_values(explode('/', $route)));
    }

    private function routeParameters($route)
    {
        $key = $this->getStringBetween($route, '%', '%');

        $index = $this->getRouteParameterIndex($key, $route);

        if ($index === false) {
            return [];
        }

        $routePieces = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
        $value = isset( $routePieces[$index]) ?  $routePieces[$index] : false;

        return ($value !== false) ? [
            $key => $value,
        ] : [];
    }

    function replaceBetween($str, $needle_start, $needle_end, $replacement) {
        $pos = strpos($str, $needle_start);
        $start = $pos === false ? 0 : $pos + strlen($needle_start);

        $pos = strpos($str, $needle_end, $start);
        $end = $pos === false ? strlen($str) : $pos;

        return substr_replace($str, $replacement, $start, $end - $start);
    }

    function getStringBetween($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    private function isCurrentUrl($route, $parameters = [])
    {
        $currentRoute = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
        foreach ($parameters as $key => $value) {
            if ($index = array_search($value, $currentRoute)) {
                $currentRoute[$index] = '%'.$key.'%';
            }
        }

        $currentRoute = implode('/', $currentRoute);

        return $this->removeSpecialChars($route) === $this->removeSpecialChars($currentRoute);
    }

    private function removeSpecialChars($string)
    {
        return (preg_replace('/\//', '', $string));
    }
}

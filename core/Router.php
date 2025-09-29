<?php

namespace Framework;

class Router
{
    protected Request $request;
    protected Response $response;
    protected array $routes = [];
    protected array $params = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function add($path, $callback, $method): self
    {
        $path = trim($path, '/');
        if (is_array($method)) {
            $method = array_map('strtoupper', $method);
        } else {
            $method = [strtoupper($method)];
        }

        $this->routes[] = [
            'path' => "/$path",
            'callback' => $callback,
            'middleware' => null,
            'method' => $method,
            'needScrfToken' => true, //csrfToken
        ];
        return $this;
    }

    public function get($path, $callback): self
    {
        return $this->add($path, $callback, 'GET');
    }

    public function post($path, $callback): self
    {
        return $this->add($path, $callback, 'POST');
    }

    public function dispatch(): mixed
    {
        $path = $this->request->getPath();
        $route = $this->matchRoute($path);
        if (false === $route) {
            $this->response->setResponseCode(404);
            echo '404 - Page not found';
            die;
        }

        if (is_array($route['callback'])) {
            $route['callback'][0] = new $route['callback'][0];
        }

        return call_user_func($route['callback']);
    }

    protected function matchRoute($path): mixed
    {
        foreach ($this->routes as $route) {
            if (
                preg_match("#^{$route['path']}$#", "/{$path}", $matches)
                &&
                in_array($this->request->getMethod(), $route['method'])
            ) {

                if ($this->request->isPost()) {
                    if($route['needScrfToken'] && !$this->checkCsrfToken()) {
                        if ($this->request->isAjax()) {
                            echo json_encode([
                                'status' => 'error',
                                'data' => 'Csrf error'
                            ]);
                            die;
                        } else {
                            session()->setFlash('error', 'Ошибка безопасности');
                            $this->response->redirect();
                        }
                    }
                }

                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $this->route_params[$k] = $v;
                    }
                }
                return $route;
            }
        }
        return false;
    }

    public function withoutCsrf(): self
    {
        $this->routes[array_key_last($this->routes)]['needScrfToken'] = false;
        return $this;
    }

    public function checkCsrfToken(): bool
    {
        return request()->post('csrf_token') &&
            (request()->post('csrf_token')  == session()->get('csrf_token'));
    }

//    public function add($route, $params = [])
//    {
//        $route = preg_replace('/\//', '\\/', $route);
//        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
//        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
//        $route = '/^' . $route . '$/i';
//        $this->routes[$route] = $params;
//        dump($params);
//    }

//    public function match($url)
//    {
//        foreach ($this->routes as $route => $params) {
//            if (preg_match($route, $url, $matches)) {
//                foreach ($matches as $key => $match) {
//                    if (is_string($key)) {
//                        $params[$key] = $match;
//                    }
//                }
//                $this->params = $params;
//                return true;
//            }
//        }
//        return false;
//    }
//
//    public function dispatch($url)
//    {
//        echo "Requested URL: " . $_SERVER['REQUEST_URI'] . "---";
//        echo "Matched route: " . print_r($this->params, true);
//        $url = $this->removeQueryStringVariables($url);
//
//        if ($this->match($url)) {
//            $controller = $this->params['controller'];
//            $controller = $this->convertToStudlyCaps($controller);
//            $controller = "app\\controllers\\{$controller}Controller";
//
//            if (class_exists($controller)) {
//                $controller_object = new $controller($this->params);
//                $action = $this->params['action'];
//                $action = $this->convertToCamelCase($action);
//
//                if (is_callable([$controller_object, $action])) {
//                    $controller_object->$action();
//                } else {
//                    echo "Метод $action в контроллере $controller не найден";
//                }
//            } else {
//                echo "Контроллер $controller не найден";
//            }
//        } else {
//            echo "Маршрут не найден";
//        }
//    }
//
//    protected function convertToStudlyCaps($string)
//    {
//        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
//    }
//
//    protected function convertToCamelCase($string)
//    {
//        return lcfirst($this->convertToStudlyCaps($string));
//    }
//
//    protected function removeQueryStringVariables($url)
//    {
//        if ($url != '') {
//            $parts = explode('&', $url, 2);
//            if (strpos($parts[0], '=') === false) {
//                $url = $parts[0];
//            } else {
//                $url = '';
//            }
//        }
//        return $url;
//    }

}
<?php
namespace core;

use app\helpers\DebugHelper;

class Router {
    protected $routes = [];
    protected $params = [];

    public function add($route, $params = []) {
        // Convert variables, e.g., {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[0-9a-z-]+)', $route);
    
        // Convert variables with custom regex, e.g., {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        if ($route[0] !== '/') {
            $route = '/' . $route;
        }
    
        // Use '#' as the delimiter to avoid conflict with '/'
        $route = '#^' . $route . '$#i';
    
        $this->routes[$route] = $params;
    }
    
    

    public function match($url) {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        
        return false;
    }

    public function run($url = '') {
        $url = $url ?: $this->getRequestUrl();
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = new $controller();
            call_user_func_array([$controller, $this->params['action']], [$this->params]);
        } else {
            $this->handleNotFound();
        }
    }

    private function getRequestUrl() {
        $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $scriptName = dirname($_SERVER['SCRIPT_NAME']); // Gets the base path e.g., /Projects/phpFramework/public
    
        $path = str_replace($scriptName, '', $urlPath);
        return trim($path, '/');
    }

    protected function handleNotFound() {
        header("HTTP/1.1 404 Not Found");
        $config = Config::getAll(); // Fetch all configuration data
        if (file_exists(__DIR__ . '/../app/views/404.php')) {
            require_once __DIR__ . '/../app/views/404.php';
        } else {
            echo "<h1>404 Not Found</h1><p>The page you are looking for could not be found.</p>";
        }
    }
}

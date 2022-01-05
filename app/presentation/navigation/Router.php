<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = EnvironmentFactory::getEnvironment()->getRootDir() . '/app/core/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getUri(): string
    {
        return trim(EnvironmentFactory::getEnvironment()->getUri(), '/');
    }

    public function run()
    {
        $uri = $this->getURI();
        $controllerName = 'MainController';
        $actionName = 'actionMain';
        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                array_shift($segments);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst((array_shift($segments)));
            }
        }
        $controllerFile = EnvironmentFactory::getEnvironment()->getRootDir() . '/app/presentation/controllers/' . $controllerName . '.php';
        try {
            if (file_exists($controllerFile)) {
                include_once($controllerFile);

                $factoryMethod = lcfirst($controllerName);
                $controllerObject = ControllerFactory::$factoryMethod();
                if (!method_exists($controllerObject, $actionName)) {
                    throw new Exception("Action in " . $controllerName . " not found!");
                }

                $controllerObject->$actionName();
                $controllerObject->renderPage();
            } else {
                throw new Exception("Controller " . $controllerName . " not found!");
            }
        } catch (Exception $e) {
            header("HTTP/1.0 404 Page Not Found");
            echo $e->getMessage();
        }
    }

}
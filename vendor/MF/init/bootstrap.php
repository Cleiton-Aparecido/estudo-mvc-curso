<?php

namespace MF\Init;

// criando uma classe abstrata para, para ser herdada, mas não instanciada. Para fornecer oque fazer com as rotas recebidas   
abstract class Bootstrap
{
    private $routes;

    // Metodo obrigatorio para a classe abstrata funcionar, e chama o initRoutes da classe routes
    abstract protected function initRoutes();

    public function __construct()
    {
        // chama o metodo initRoutes que é citado no arquivo route.php, para coletar todas as todas configuradas, salva no atributo $routes, pelo metodo setRoutes       
        $this->initRoutes();
        $this->run($this->getUrl());
    }
    public function getRoutes()
    {
        return $this->routes;
    }
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    // filtrar a url para saber qual router usar
    protected function run($url)
    {
        // Listando route para saber qual controller utilizar, e qual metodo usar no controller
        foreach ($this->getRoutes() as $path => $route) {
            // Pegando route da URL e filtrando qual metodo escolher
            if ($url == $route['route']) {
                // localizando classe no controler
                $class = "App\\Controllers\\" . $route['controller'];
                // Estanciando class
                $controller = new $class;
                // Pegando qual metodo a ser utilizado no action da route
                $action = $route['action'];
                // Chamando o metodo do classe estanciada
                $controller->$action();
            }
        }
    }
    //definindo route de acesso
    protected function getUrl()
    {
        // PHP_URL_PATH -> FILTRA PARA RETORNAR SOMENTE A ROUTE
        // PHP_URL_SCHEME
        // PHP_URL_USER
        // PHP_URL_PASS
        // PHP_URL_HOST
        // PHP_URL_PORT
        // PHP_URL_QUERY
        // PHP_URL_FRAGMENT
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

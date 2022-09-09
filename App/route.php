<?php
namespace App;
// bootstrap fica salvo os tratamente das rotas
use MF\Init\Bootstrap;


class route extends Bootstrap {
    
    protected function initRoutes(){
        // Definindo a route de acesso, para qual controller será direcionado e qual metodo será acionado  
        $routes["home"] = array(
            "route" => "/",
            "controller" => "IndexController",
            "action" => "index"
        );
        $routes['sobre_nos'] = array(
            "route" => "/sobre_nos",
            "controller" => "IndexController",
            "action" => "sobreNos"
        );
        $this->setRoutes($routes);
    }

    
}

?>
<?php 

namespace MF\Controller;

// Classe abstrata responsável pelos metodos que realizam o trantamento das controllers
abstract class action{

    protected $view;

    public function __construct()
    {
        // Usando a classe nativa do php, stdClass, possivel criar objetos padrões para toda a classe, disponivel para qualquer metodo
        $this->view = new \stdClass();
    }

    // responsável por chamar layout
    protected function render($View,$layout){
        $this->view->page = $View;

        if(file_exists("../App/Views/layout/".$layout.".phtml")){
            require_once "../App/Views/layout/".$layout.".phtml";
        }else{
            $this->content();
        }
    }

    // reponsável por renderizar as views
    protected function content(){

         //  Metodo get_class retorna o caminho e nome da classe 
         $classAtual = get_class($this);
         // Retirando dados do caminho da class com o str_replace, e deixando o resto na caixa baixa com strlolower
         // Atráves do require_once, permite usar qualquer variavel declarado no controller, na View que foi citade no require_once
         $classAtual = strtolower( str_replace("Controller","", str_replace('App\\controllers\\','',$classAtual)));


         require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
        
    }
}

?>
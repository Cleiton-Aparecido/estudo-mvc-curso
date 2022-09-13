<?php 
namespace App\controllers;


// use App\Connection;
// Recursos do model
use App\Models\Produto;
use App\Models\Info;
// Recursos do mini Framework
use MF\Controller\action;
use MF\Model\Container;

class IndexController extends action{
    
    // metodos do controller index
    public function index(){
        // crio um atributo no objeto view, que será valido em toda a classe, caso algum metodo da classe precise utilizar

        // instância de conexão
        $produto = Container::getModel("Produto");

        $produtos = $produto->getProdutos();

        $this->view->dados = $produtos;

        $this->render("index","layout1");    
    }
    // crio um atributo no objeto view, que será valido em toda a classe, caso algum metodo da classe precise utilizar
    public function sobreNos(){
        
        $info = Container::getModel("Info");

        $this->view->dados = $info->getInfo(); 
        $this->render('sobreNos',"layout2");

    }


}

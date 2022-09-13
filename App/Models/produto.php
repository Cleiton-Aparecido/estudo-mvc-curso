<?php 

namespace App\Models;
use MF\Model\Model;

class Produto extends Model{

    
    public function getProdutos(){
        $comandoSQL = 'SELECT * FROM tb_produtos';

        return $this->db->query($comandoSQL)->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>

<?php 

namespace App\Models;

use MF\Model\Model;


class Info extends Model{

    
    public function getInfo(){
        $comandoSQL = 'SELECT * FROM tb_info';

        return $this->db->query($comandoSQL)->fetchAll(\PDO::FETCH_ASSOC);
    }
  

}

?>

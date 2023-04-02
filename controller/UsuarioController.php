<?php
include "../Model/BD.class.php";

class UsuarioController {

    private $model;
    private $table = "usuario";
  private $table = "vendedor";
  private $table = "produto";

    public function __construct(){

        $this->model = new BD();
    }

    public function salvar($dados){
        $this->model->inserir($this->table, $dados);
    }
    
    public function update($dados){
        $this->model->update($this->table, $dados);
    }

    public function carregar(){
        
        return $this->model->select($this->table);
    }
    
    public function pesquisar($dados){
        return $this->model->pesquisar($this->table, $dados);

    }
    public function deletar($id, $ids){
        
        return $this->model->remove($this->table,$id,$ids);
    }

    public function buscar($id, $ids){
        
        return $this->model->buscar($this->table,$id,$ids);
    }

}

<?php

class BD {
  private $host = "localhost";
	private $dbname = "db_aula";
	private $port = 3306;
	private $usuario = "root";
	private $senha = "";
	private $db_charset = "utf8";	 

	 public function inserir($nome_tabela, $dados)
  {
    unset($dados['id']);
    $conn = $this->conn(); 
    //a interrogação será substituida pelo valor de cada indice do vetor
    $sql = "INSERT INTO $nome_tabela (";
    $flag = 0;
    foreach($dados as $campo => $valor){
      $sql .= $flag ==0 ? " $campo" : ", $campo"; 
      $flag = 1;
    }
    $sql .= ") VALUES (";

    $flag = 0;
    $arrayDados = [];
    foreach($dados as $campo => $valor){
      $sql .= $flag ==0 ? " ?" : ", ?"; 
      $flag = 1;
      $arrayDados[] = $valor;
    }
    $sql .= ");";
   
    $st = $conn->prepare($sql);
    $st->execute($arrayDados);

  }

	public function select($nome_tabela)
  {
    $conn = $this->conn(); 
    //a interrogação será substituida pelo valor de cada indice do vetor
    $sql = "select * from $nome_tabela;";
   
    $st = $conn->prepare($sql);
    $st->execute();

		return $st->fetchAll(PDO::FETCH_CLASS);
  }

  public function buscar($nome_tabela, $id)
  {
    $conn = $this->conn(); 
    $sql = "SELECT * FROM $nome_tabela WHERE id=$id;";
   
    $st = $conn->prepare($sql);
    $st->execute();

		return $st->fetchObject();
  }

	 public function update($nome_tabela, $dados)
  {
		$id = $dados['id'];
    $conn = $this->conn(); 
    //a interrogação será substituida pelo valor de cada indice do vetor
    $sql = "UPDATE $nome_tabela SET ";
    $flag = 0;
    foreach($dados as $campo => $valor){
      $sql .= $flag ==0 ? " $campo = ?" : ", $campo =?"; 
      $flag = 1;
      $arrayDados[] = $valor;
    }
    $sql .= " WHERE id=$id;";
   
    $st = $conn->prepare($sql);
    $st->execute($arrayDados);

  }

	public function remove($nome_tabela,$id)
  {
    $conn = $this->conn(); 
    $sql = "DELETE FROM $nome_tabela WHERE id=$id;";
   
    $st = $conn->prepare($sql);
    $st->execute();
  }

  
	public function pesquisar($nome_tabela, $dados)
  {
    $campo = $dados['campo'];
    $valor = $dados['valor'];
    $conn = $this->conn(); 
    $sql = "SELECT * FROM $nome_tabela WHERE $campo LIKE '%$valor%';";
   
    $st = $conn->prepare($sql);
    $st->execute();

		return $st->fetchAll(PDO::FETCH_CLASS);
  }
	

}
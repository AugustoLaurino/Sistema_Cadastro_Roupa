<?php

class Roupa extends Connection
{
  private $table = 'tbroupa';
  private $query = 'SELECT tbroupa.id, tbroupa.idMarca, tbroupa.modelo, tbroupa.tamanho, tbmarca.marca  FROM tbroupa INNER JOIN tbmarca ON tbroupa.idMarca = tbmarca.id';
  
  public function getAll()
  {   
    $result = $this->connection->query($this->query);
    $lista = array();
    while ($record = $result->fetch_object()) {
      array_push($lista, $record);
    }
    $result->close();
    return $lista;		
  }

  public function getById($id)
  {
    return $this->connection->query($this->query . ' WHERE tbroupa.id = ' . $id)->fetch_assoc();
  }

  public function insert($idMarca, $modelo, $tamanho)
  {
    $sql = "INSERT INTO " . $this->table . " (idMarca, modelo, tamanho) VALUES (".$idMarca.", '".$modelo."','".$tamanho."')";
    return $this->connection->query($sql);
  }

  public function update($id, $marca, $modelo, $tamanho)
  {
    $sql = "UPDATE " . $this->table . " SET idMarca='" . $marca . "', modelo='".$modelo."', tamanho='".$tamanho."' WHERE id=" . $id;
    return $this->connection->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM  " . $this->table . " WHERE id=" . $id;
    return $this->connection->query($sql);
  }
}

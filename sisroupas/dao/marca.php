<?php

class Marca extends Connection
{
  private $table = 'tbmarca';
  private $query = 'SELECT * FROM tbmarca';
  
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
    return $this->connection->query($this->query . ' WHERE id = ' . $id)->fetch_assoc();
  }

  public function insert($marca)
  {
    $sql = "INSERT INTO " . $this->table . " (marca) VALUES ('" . $marca . "')";
    return $this->connection->query($sql);
  }

  public function update($id, $marca)
  {
    $sql = "UPDATE " . $this->table . " SET marca='" . $marca . "' WHERE id=" . $id;
    return $this->connection->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM  " . $this->table . " WHERE id=" . $id;
    return $this->connection->query($sql);
  }
}

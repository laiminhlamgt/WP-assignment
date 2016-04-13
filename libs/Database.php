<?php

class Database extends PDO {

  public function __construct() {
    $dsn = sprintf('%s: host=%s; dbname=%s', DB_TYPE, DB_HOST, DB_NAME);// data source name
    parent::__construct($dsn, DB_USER, DB_PASS);

    // parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
  }

  public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
    $query = $this->prepare($sql);
    foreach ($array as $key => $value) {
      $query->bindValue(":$key", $value);
    }
    $query->execute();

    return $query->fetchAll($fetchMode);
  }

  public function insert($table, $data) {
    $fieldNames = '`' . implode('`, `', array_keys($data)) . '`';
    $fieldValues = ':' . implode(', :', array_keys($data));

    $query = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");

    foreach ($data as $key => $value) {
      $query->bindValue(":$key", $value);
    }

    $query->execute();
  }

  public function update($table, $data, $where) {
    $fieldNames = '`' . implode('`, `', array_keys($data)) . '`';
    $fieldValues = ':' . implode(', :', array_keys($data));

    $fieldDetails = NULL;
    foreach ($data as $key => $value) {
      $fieldDetails .= "`$key`= :$key,";
    }
    $fieldDetails = rtrim($fieldDetails, ',');

    $query = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

    foreach ($data as $key => $value) {
      $query->bindValue(":$key", $value);
    }

    $query->execute();
  }

  public function delete($table, $where, $limit = 1) {
    return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
  }

}

 ?>

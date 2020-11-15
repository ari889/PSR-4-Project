<?php

  namespace App\Support;

  use PDO;

  abstract class Database{
    /**
    * private property
    */
    private $host = 'localhost';

    private $user = 'root';

    private $pass = '';

    private $db = 'psr4';

    private $connection;

    private function connection(){
      return $this -> connection = new PDO('mysql:host='.$this -> host.';dbname='.$this -> db, $this -> user. $this -> pass);
    }


      /**
       *create table
       */
    protected function create($table, $fields = array()){
        $columns = implode(',', array_keys($fields));
        $values = ':'.implode(', :', array_keys($fields));
        $sql = "INSERT INTO {$table}({$columns}) VALUES({$values})";
        if($stmt = $this -> connection() -> prepare($sql)){
            foreach($fields as $key => $data){
                $stmt -> bindValue(':'.$key, $data);
            }
            $stmt->execute();
            return $this->connection->lastInsertId();
        }else{
            return false;
        }
    }

      /**
       * find data
       */
    protected function find($table, $field = array(), $condition = array(), $column_name = '', $order = '', $limit = '', $start = ''){
        $colums = implode(', ', $field);
        $sql = "SELECT {$colums} FROM {$table}";
        $where = " WHERE ";
        foreach ($condition as $name => $value) {
            $sql .= "{$where} `{$name}` = :{$name}";
            $where = " AND ";
        }
        if (!empty($order && !empty($column_name))) {
            $upper = strtoupper($order);
            $sql .= " ORDER BY {$column_name} {$upper}";
        }
        if (!empty($limit)) {
            if (!empty($start)) {
                $sql .= " LIMIT {$start}, {$limit}";
            } else {
                $sql .= " LIMIT {$limit}";
            }
        }
        if ($stmt = $this->connection()->prepare($sql)) {
            foreach ($condition as $name => $value) {
                if (is_int($value))
                    $param = PDO::PARAM_INT;
                elseif (is_bool($value))
                    $param = PDO::PARAM_BOOL;
                elseif (is_null($value))
                    $param = PDO::PARAM_NULL;
                elseif (is_string($value))
                    $param = PDO::PARAM_STR;
                else
                    $param = FALSE;
                $stmt->bindValue(':' . $name, $value);
            }
            $stmt->execute();
        }
        return $stmt;
    }

    /**
     * update data
     */

      protected function update($table, $fields = array(), $condition = array()){
          $colums = '';
          $i = 1;
          foreach($fields as $name => $value){
              $colums .= "`{$name}` = :{$name}";
              if($i < count($fields)){
                  $colums .= ', ';
              }
              $i++;
          }
          $sql = "UPDATE {$table} SET {$colums}";
          $where = " WHERE ";
          foreach($condition as $name => $value){
              $sql .= "{$where} `{$name}` = :{$name}";
              $where = " AND ";
          }
          if($stmt = $this -> connection() -> prepare($sql)){
              foreach($fields as $key => $value){
                  $stmt->bindValue(':'.$key, $value);
              }
              foreach ($condition as $name => $value) {
                  $stmt->bindValue(':'.$name, $value);
              }
              $stmt->execute();
          }
      }

      /**
       * delete data
       */
      protected function delete($table, $array){
          $sql = "DELETE FROM `{$table}`";
          $where = " WHERE ";
          foreach($array as $name => $value){
              $sql .= "{$where} `{$name}` = :{$name}";
              $where = " AND ";
          }
          if($stmt = $this -> connection() -> prepare($sql)){
              foreach ($array as $name => $value) {
                  $stmt->bindValue(':'.$name, $value);
              }
              $stmt->execute();
          }
      }

  }

 ?>

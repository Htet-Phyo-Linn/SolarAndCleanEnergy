<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

    class QueryBuilder {
        protected $pdo;

        public function __construct($pdo) {
            $this->pdo=$pdo;
        }

        public function selectAll($table) {
            $statement=$this->pdo->prepare("SELECT * FROM $table");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }

        public function insert($dataArr, $table) {
            $get_Data_Keys=array_keys($dataArr);
            $cols=implode(",",$get_Data_Keys);
            $questionMark="";
            foreach($get_Data_Keys as $key){
                $questionMark.="?,";
            }
            $questionMark=rtrim($questionMark, ",");

            $sql = "INSERT INTO $table ($cols) VALUES ($questionMark)";
            $statement=$this->pdo->prepare($sql);
            $get_Data_Values=array_values($dataArr);
            $statement->execute($get_Data_Values);
        }
        
        public function where($dataArr, $table) {
            $sql = "SELECT uid, userName, email, phNo, userRole FROM $table WHERE ";
            $params = array();
            foreach ($dataArr as $column => $value) {
                $sql .= "$column = :$column AND ";
                $params[":$column"] = $value;
            }

            $sql = rtrim($sql, "AND ");
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);

            $userInfo = array ();
            $userInfo["rowCount"] = $statement->rowCount();
            $userInfo["uInfo"] = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $userInfo;            
        }

        public function update($dataArr, $table, $uid) {
            $sql = "UPDATE $table SET ";
            $params = array();
            foreach ($dataArr as $col => $value) {
            $sql .= "$col = :$col, ";
            $params[":$col"] = $value;
            }

            $sql = rtrim($sql, ", ");
            $sql .= " WHERE uid = :uid";
            $params[":uid"] = $uid;

            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
        }
    }
?>
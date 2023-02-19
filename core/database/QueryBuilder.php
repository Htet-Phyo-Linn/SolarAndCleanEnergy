<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

    class QueryBuilder {
        protected $pdo;

        public function __construct($pdo) {
            $this->pdo=$pdo;
        }

        public function selectAll($table) {
            $statement=$this->pdo->prepare("select * from $table");
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

            $sql = "insert into $table ($cols) values ($questionMark)";
            $statement=$this->pdo->prepare($sql);
            $get_Data_Values=array_values($dataArr);
            $statement->execute($get_Data_Values);
        }
        
        public function loginCheck($dataArr, $table)
        {
            $get_Data_Keys = array_keys($dataArr);
            $get_Data_Values = array_values($dataArr);
            $col1 = $get_Data_Keys[0];
            $col2 = $get_Data_Keys[1];
            
            $sql = "select uid,userRole from $table where $col1=:value1 and $col2=:value2";

            $statement=$this->pdo->prepare($sql);
            $statement->bindValue(":value1", $get_Data_Values[0]);
            $statement->bindValue(":value2", $get_Data_Values[1]);
            $statement->execute();

            $userInfo = array ();
            $userInfo["rowCount"] = $statement->rowCount();
            $userInfo["uInfo"] = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $userInfo;            
        }
    }
?>
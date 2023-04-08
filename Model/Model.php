
<?php
class Model{

    public $connection;
    public function __construct(){
        $this->connection = new mysqli("localhost","root","","mvc0604");
    }

    public function printst(){
        echo "<br>model class function</br>";
    }

    public function insertData($table,$insertarray){
        
        $keys=array_keys($insertarray);
        $keystr=implode(",",$keys);
        $values=array_values($insertarray);
        $valstr=implode("','",$values);
        //insert into table(col1,col2)values('val1','val2');
        echo $query="insert into $table($keystr)values('$valstr')";
        //$this->connection->query($query);
    }

    public function selectData($table){
        $query="select * from $table";
        $res=$this->connection->query($query);
        while($row=$res->fetch_object()){
            $result[]=$row;
        }
        return $result ?? [];
    }
}



?>
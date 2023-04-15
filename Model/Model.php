
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
        $query="insert into $table($keystr)values('$valstr')";
        if($this->connection->query($query)){
            return true;
        }
        else{
            return false;
        }
    }

    public function selectData($table){
        $query="select * from $table";
        $res=$this->connection->query($query);
        while($row=$res->fetch_object()){
            $result[]=$row;
        }
        return $result ?? [];
    }

    public function delete_data($table,$where){
        $query= "delete from $table where 1=1 ";
        foreach($where as $key=>$value){
            $query.= " and " .$key ." = '".$value." ' ";
        }
        echo $query;
        $this->connection->query($query);
    }

    public function select_where($table,$where){
        $query="select * from $table where 1=1";
        foreach($where as $key=>$value){
            $query.= " and " .$key ." = '".$value." ' ";
        }
        $req=$this->connection->query($query);
        while($row=$req->fetch_object()){
            $result[]=$row;
        }
        return $result ?? [];
    }

    public function update_data($table,$data,$where){
        //$q="update users set uname='megha' , email='hghg' where uid=1";
        $query= "update $table set ";
        $count=count($data);
        $i=0;
        foreach($data as $key=>$val){
            if($i<$count-1){
                $query.= " ".$key ." = '".$val ."',";  
            }
            else{
                $query.= " ".$key ." = '".$val ."'";
            }
           
            $i++;
        }
        $query.=" where 1=1 ";
        foreach($where as $key=>$value){
            $query.= " and " .$key ." = '".$value." ' ";
        }

       
        $this->connection->query($query);

    }
}



?>
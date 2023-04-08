<?php
include('Model/Model.php');
class Controller extends Model{
   public function __construct(){
        parent::__construct();
        echo "controller class";
   }
   public function index(){
      $data=$this->selectData("users");
      include("View/index.php");
   }
   public function create(){
        include('View/create.php');
        if(isset($_REQUEST['submit'])){
           $name=$_REQUEST['name'];
           $email=$_REQUEST['email'];
           $password=$_REQUEST['pswd'];
           $insertarray=[
              "name"=>$name,
              "email"=>$email,
              "pass"=>$password,
           ];
           $this->insertData("users",$insertarray);
        }
   }
}






?>
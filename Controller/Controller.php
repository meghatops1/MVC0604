<?php
include('Model/Model.php');
class Controller extends Model{

   public $baseurl;
   public function __construct(){
        parent::__construct();
        //echo "controller class";
        $this->baseurl="http://localhost/MVC0604/home.php/";
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
           header("Location:".$this->baseurl."index");
        }
   }
   public function delete(){
      if(isset($_REQUEST['id'])){
         $userid=$_REQUEST['id'];
         $where=['userid'=>$userid];
         $this->delete_data("users",$where);
         header("Location:".$this->baseurl."index");
      }
   }

   public function edit(){
      if(isset($_REQUEST['id'])){
         $userid=$_REQUEST['id'];
         $where =['userid'=>$userid];
         $data=$this->select_where("users",$where);
         include('View/create.php');
         if(isset($_REQUEST['submit'])){
            $name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $password=$_REQUEST['pswd'];
            $updatearray=[
               "name"=>$name,
               "email"=>$email,
               "pass"=>$password,
            ];
            $this->update_data("users",$updatearray,$where);
            header("Location:".$this->baseurl."index");
         }   
      }
   }

   public function countryAdd(){
      $country= file_get_contents("http://country.io/names.json");
      $data=  json_decode($country);
      foreach($data as $key=>$value){
         $this->insertData("country",["ccode"=>$key,"cname"=>$value]);
      }
   }

   public function userapidata(){
      $users= $this->selectData("users");
      echo $data= json_encode($users);
   }

   public function userget(){
      include('View/userget.php');
   }
}






?>
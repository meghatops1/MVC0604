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
   public function imgupload(){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PUT");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        
    $DIR = "uploads/";
    $httpPost = file_get_contents("php://input");
    $req = json_decode($httpPost);
      
       
    echo $file_chunks = explode(";base64,", $req->image);
       
    $fileType = explode("image/", $file_chunks[0]);
    $image_type = $fileType[1];
    $base64Img = base64_decode($file_chunks[1]);
    
    $file = $DIR . uniqid() . '.png';
    file_put_contents($file, $base64Img); 
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

   public function createapi(){
      if(isset($_REQUEST['name'])){
        
            $name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $password=$_REQUEST['pswd'];
            $insertarray=[
               "name"=>$name,
               "email"=>$email,
               "pass"=>$password,
            ];
            if($this->insertData("users",$insertarray)){
            echo json_encode(["msg"=>"insert success"]);
            }
            else{
               echo json_encode(["msg"=>"insert fail"]);
            }

      }
   }   
   
}






?>
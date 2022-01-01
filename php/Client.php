<?php
include_once  'DBconnection.php'; 
class Client extends DBconnection{

    private $id;
    private $username;
    private $gender;
    private $nic;
    private $dob;
    private $phone;
    private $image;
    private $email;
    private $password;

    public function __construct(){
      parent::__construct();
    }
 
    function setCreateClient( $email , $password ){
        $this->email = $email;
        $this->password = $password;
       
        $this->createClient(); // call createClient funtion
    }

    function setCompletClient( $username , $gender, $nic, $dob, $phone, $image ){

      $this->username = $username;
      $this->gender = $gender;
      $this->nic = $nic;
      $this->dob = $dob;
      $this->phone = $phone;
      $this->image = $image;

       $this->CompletClient(); // call CompletClient funtion
    }

    function setSigninClient( $email , $password ){
      $this->email = $email;
      $this->password = $password;   
      $this->signinClient(); // call signinClient funtion
    }

    function setEditClient( $username , $email , $password , $nic, $dob, $phone  , $image ){

      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
      $this->nic = $nic;
      $this->dob = $dob;
      $this->phone = $phone;
      $this->image = $image;

          // var_dump( $this->username);
          // var_dump( $this->nic);
          // var_dump( $this->email);
          // var_dump( $this->password);
          // var_dump( $this->dob);
          // var_dump( $this->phone);
          // var_dump( $this->image);

       $this->EditClient(); //call EditClient funtion
    }
    

    public function createClient(){ 

        $sql1 = "INSERT INTO client ( email, password ) VALUES ( '$this->email', '$this->password' );";
        $sql2 = "SELECT id FROM client WHERE email = '$this->email' AND password = '$this->password'";
        if (mysqli_query($this->connection, $sql1)) {
          $result = mysqli_query($this->connection,$sql2);
          //var_dump($result);
          $row = $result->fetch_assoc();
          $id = $row['id'];
          $_SESSION['first_session_client_id'] = $id ;
          header('location:../client_complet_profile.php');
          } else {
            // javascript alert box
          echo '<script language="javascript">';
          echo 'alert("client signin error")';
          echo '</script>';
          }
          
    }

    public function signinClient(){ 
     
        $sql = "SELECT id FROM client WHERE email = '$this->email' AND password = '$this->password'";
        $result = mysqli_query($this->connection,$sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];
        if(mysqli_num_rows($result) > 0){ 
          $_SESSION['client_id'] = $id ;
          header('location:../client/client_profile.php');
        }else{
          echo '<script language="javascript">';
          echo 'alert("client signin error")';
          echo '</script>';
        }       
    }

    public function CompletClient(){

      $profileImageDir = "../image/client_p_image";
      $rabdam_name = rand() . "_" . time() . ".png";
      $target_dir_image_name = $profileImageDir . "/" . $rabdam_name;

      if (file_put_contents($target_dir_image_name, base64_decode($this->image) )){
      $sql1 = "UPDATE client SET username = '$this->username' , nic = '$this->nic' , gender = '$this->gender' , dob = '$this->dob' , contact_no = '$this->phone' , image = '$rabdam_name' WHERE id = ".$_SESSION['first_session_client_id']." ;";  
      $sql2 = "SELECT id FROM client WHERE username = '$this->username' AND nic = '$this->nic'";
        $_SESSION['first_session_client_id'] = null;
        if(mysqli_query($this->connection,$sql1)){
          $result = mysqli_query($this->connection,$sql2);
          $row = $result->fetch_assoc();
          $id = $row['id'];
          $_SESSION['client_id'] = $id ;
          header('location:../client/client_profile.php');
        }else{
          echo '<script language="javascript">';
          echo 'alert("Complet Client error")';
          echo '</script>';
        } 
      }  
     
    }


    public function EditClient(){

      if(is_null($this->image)){
        $sql = "UPDATE client SET username = '$this->username' , email = '$this->email' , password = '$this->password' , nic = '$this->nic' , dob = '$this->dob' , contact_no = '$this->phone' WHERE id = ".$_SESSION['client_id']." ; "; 
        //var_dump(mysqli_query($this->connection,$sql));
        if(mysqli_query($this->connection,$sql)){
           header('location:../client/client_profile.php');
        }else{
          echo '<script language="javascript">';
          echo 'alert("Edit profile 1 error")';
          echo '</script>';
        }   
      }else{
       
        $profileImageDir = "../image/client_p_image";
        $rabdam_name = rand() . "_" . time() . ".png";
        $target_dir_image_name = $profileImageDir . "/" . $rabdam_name;
  
        $sql = "SELECT image FROM client WHERE id = ".$_SESSION['client_id']." ;";
        $result = mysqli_query($this->connection,$sql);
        $row = $result->fetch_assoc();
        $oldImage = $row['image'];
  
        if (file_put_contents($target_dir_image_name, base64_decode($this->image) )){ // base64 decode to image and uploard to server
  
          $sql = "UPDATE client SET username = '$this->username' , email = '$this->email' , password = '$this->password' , nic = '$this->nic' , dob = '$this->dob' , contact_no = '$this->phone' , image = '$rabdam_name' WHERE id = ".$_SESSION['client_id']." ; "; 
         
          if(mysqli_query($this->connection,$sql)){
            unlink($profileImageDir . "/" . $oldImage);
            header('location:../client/client_profile.php');
          }else{
            echo '<script language="javascript">';
            echo 'alert("Edit profile 2 error")';
            echo '</script>';
          }   
        }else{
          echo '<script language="javascript">';
          echo 'alert("Image uplord server error")';
          echo '</script>';
        }
  
      }
    }

    
    public function DeleteClient($id){
      $sql = "delete from photographer where id='$id'";

      $this->setSelectedClient();

       //Retriving the extract path is compulsory to avoid errors
    $path = str_replace('\php', '', dirname(__FILE__));

    //Use to give privilages to erase file from the relevant directoryF
    chmod($path, 0777);

    unlink($path . '\image\client_p_image\\' . $this->image);

    session_destroy();
    if(mysqli_query($this->connection, $sql)){
      return true;
    }  

    }


    public function clientCount(){
      $sql = "SELECT COUNT(id) FROM client";
      $result = mysqli_query($this->connection,$sql);
      $row = $result->fetch_assoc();
      $count = $row['COUNT(id)'];
      return $count;
    }


    function setSelectedClient(){

      $sql = "SELECT * FROM client WHERE id =  ".$_SESSION['client_id']." ;";
  
      $result = mysqli_query($this->connection,$sql);
      $row = $result->fetch_assoc();  
      if(mysqli_num_rows($result) > 0){ 
        $this->id = $row['id'];
        $this->userName = $row['username'];
        $this->nic = $row['nic'];
        $this->email = $row['email'];
        $this->gender = $row['gender'];
        $this->image = $row['image'];
        $this->dob = $row['dob'];
        $this->password = $row['password'];
        $this->phone = $row['contact_no'];
      }else{
        echo '<script language="javascript">';
        echo 'alert(" getSelectedPhotographers error")';
        echo '</script>';
      }  
    }

    function feedbackInsert($client_id,$email,$subject,$message){

      $sql = "INSERT INTO feedback (client_id , email, message, subject ) VALUES ('$client_id', '$email', '$message', '$subject');";
       
      if (mysqli_query($this->connection, $sql)) {
          header('location:contact.php');
        } else {
          echo '<script language="javascript">';
          echo 'alert("feedback Insert error")';
          echo '</script>';
        }
    }

    function getIdbyName($clientID){
      $sql = "SELECT username FROM client WHERE id = '$clientID' ;";
      $result = mysqli_query($this->connection,$sql);
      $row = $result->fetch_assoc();
      $name = $row['username'];
      return $name;
  }
   function getIdbyEmail($clientID){
    $sql = "SELECT email FROM client WHERE id = '$clientID' ;";
    $result = mysqli_query($this->connection,$sql);
    $row = $result->fetch_assoc();
    $email = $row['email'];
    return $email;
  }

//Implementations for the purposes of Admin Panel
public function getClientsById() {

  $sql = "SELECT * FROM client WHERE id =  " . $this->id . " ;";

  $result = mysqli_query($this->connection, $sql);
  $row = $result->fetch_assoc();
  if (mysqli_num_rows($result) > 0) {

      $this->userName = $row['username'];
      $this->nic = $row['nic'];
      $this->email = $row['email'];
      $this->gender = $row['gender'];
      $this->image = $row['image'];
      $this->dob = $row['dob'];
      $this->phone = $row['contact_no'];
  } else {
      return FALSE;
  }
}

public function getAllClients() {
  $sql = "select * from client  ";
  $result = mysqli_query($this->connection, $sql);
  $array_res = array();
  while ($row = $result->fetch_assoc()) {

      array_push($array_res, $row);
  }
  return $array_res;
}

public function delete() {
  $sql = "delete from client where id='$this->id'";

  $this->getClientsById();


  //Retriving the extract path is compulsory to avoid errors
  $path = str_replace('\php', '', dirname(__FILE__));

  //Use to give privilages to erase file from the relevant directoryF
  chmod($path, 0777);

  unlink($path . '\image\client_p_image\\' . $this->image);


  $result = mysqli_query($this->connection, $sql);



  header("location:./../../manage-clients.php");
}

public function setId($id) {
  $this->id = $id;
}

//end


    public function getid(){return $this->id;}
    public function getuserName(){return $this->userName;}
    public function getpassword(){return $this->password;}
    public function getnic(){return $this->nic;}
    public function getimage(){return $this->image;}
    public function getemail(){return $this->email;}
    public function getgender(){return $this->gender;}
    public function getdob(){return $this->dob;}
    public function getphone(){return $this->phone;}
   

}

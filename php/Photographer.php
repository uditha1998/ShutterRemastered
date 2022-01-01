<?php
include_once  'DBconnection.php'; 
include_once 'Portfolio.php';
class Photographer extends DBconnection{

  private $id;
  private $userName;
  private $nic;
  private $email;
  private $gender;
  private $dob;
  private $phone;
  private $description;
  private $image;
  private $bankName;
  private $bankNo;
  private $password;
  private $age;
  private $approve_by;
  private $enrollment_status;

   

    public function __construct(){
      parent::__construct();
    }
 
    function setPhotographer( $email , $password ){
        $this->email = $email;
        $this->password = $password;   
     
        $this->createPhotographer();
    }

    function setCompletPhotographer( $username , $gender, $nic, $dob, $phone , $bankName , $bankNo , $image , $description , $age){

      $this->username = $username;
      $this->gender = $gender;
      $this->nic = $nic;
      $this->dob = $dob;
      $this->phone = $phone;
      $this->image = $image;
      $this->bankName = $bankName;
      $this->bankNo = $bankNo;
      $this->description = $description;
      $this->age = $age;
      
       $this->CompletPhotographer();
    }
  

    function setEditPhotographer( $username , $email , $password , $nic, $dob, $phone , $bankName , $bankNo , $image , $description , $age){

      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
      $this->nic = $nic;
      $this->dob = $dob;
      $this->phone = $phone;
      $this->image = $image;
      $this->bankName = $bankName;
      $this->bankNo = $bankNo;
      $this->description = $description;
      $this->age = $age;

      // var_dump( $this->username);
      // var_dump( $this->email);
      // var_dump( $this->password);
      // var_dump( $this->nic);
      // var_dump( $this->dob);
      // var_dump( $this->phone);
      // var_dump( $this->image);
      // var_dump( $this->age);
      // var_dump( $this->description);
       $this->EditPhotographer(); //call EditPhotographer funtion
    }

    function setSigninPhotographer( $email , $password ){
      $this->email = $email;
      $this->password = $password;   
   
      $this->signinPhotographer();
  }
    
    public function createPhotographer(){ 

        $sql1 = "INSERT INTO photographer (username, email, password) VALUES ('$this->userName', '$this->email', '$this->password');";
        $sql2 = "SELECT id FROM photographer WHERE email = '$this->email' AND password = '$this->password'";
        if (mysqli_query($this->connection, $sql1)) {
          $result = mysqli_query($this->connection,$sql2);
          $row = $result->fetch_assoc();
          $id = $row['id'];
          $_SESSION['first_session_photographer_id'] = $id ;
          header('location:../photographer_complet_profile.php');
          } else {
            echo '<script language="javascript">';
          echo 'alert("photographer signin error")';
          echo '</script>';
          }
          
    }

    public function signinPhotographer(){ 

        $sql = "SELECT id FROM photographer WHERE email = '$this->email' AND password = '$this->password'";
        $result = mysqli_query($this->connection,$sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];
        if(mysqli_num_rows($result) > 0){ 
          $_SESSION['photographer_id'] = $id ;
          header('location:../photographer/photographer_profile.php');
        }else{
          echo '<script language="javascript">';
          echo 'alert("photographer signin error")';
          echo '</script>';
        }     
  }


    
  public function CompletPhotographer(){

    $profileImageDir = "../image/photographer_p_image";
    $rabdam_name = rand() . "_" . time() . ".png";
    $target_dir_image_name = $profileImageDir . "/" . $rabdam_name;
    

    if (file_put_contents($target_dir_image_name, base64_decode($this->image) )){ // base64 decode to image and uploard to server
      $sql1 = "UPDATE photographer SET username = '$this->username' , nic = '$this->nic' ,  age = '$this->age' ,  gender = '$this->gender' , dob = '$this->dob' , contact_no = '$this->phone' , image = '$rabdam_name' ,  bank_name = '$this->bankName' , bank_no = '$this->bankNo' , description = '$this->description' WHERE id = ".$_SESSION['first_session_photographer_id']." ;"; 
      $sql2 = "SELECT id FROM photographer WHERE username = '$this->username' AND nic = '$this->nic'";
      if(mysqli_query($this->connection,$sql1)){
        $result = mysqli_query($this->connection,$sql2);
          $row = $result->fetch_assoc();
          $id = $row['id'];
          $_SESSION['photographer_id'] = $id ;
        header('location:../photographer/photographer_profile.php');
      }else{
        echo '<script language="javascript">';
        echo 'alert("Complet photographer error")';
        echo '</script>';
      }   
    }

  }

  public function EditPhotographer(){

    if(is_null($this->image)){
      $sql = "UPDATE photographer SET username = '$this->username' , nic = '$this->nic' ,  age = '$this->age' ,  email = '$this->email' , dob = '$this->dob' , contact_no = '$this->phone' ,  bank_name = '$this->bankName' , password = '$this->password' , bank_no = '$this->bankNo' , description = '$this->description' WHERE id = ".$_SESSION['photographer_id']." ;"; 
      if(mysqli_query($this->connection,$sql)){
         header('location:../photographer/photographer_profile.php');
      }else{
        echo '<script language="javascript">';
        echo 'alert("Edit profile error")';
        echo '</script>';
      }   
    }else{
     
      $profileImageDir = "../image/photographer_p_image";
      $rabdam_name = rand() . "_" . time() . ".png";
      $target_dir_image_name = $profileImageDir . "/" . $rabdam_name;

      $sql = "SELECT image FROM photographer WHERE id = ".$_SESSION['photographer_id']." ;";
      $result = mysqli_query($this->connection,$sql);
      $row = $result->fetch_assoc();
      $oldImage = $row['image'];

      if (file_put_contents($target_dir_image_name, base64_decode($this->image) )){ // base64 decode to image and uploard to server

        $sql = "UPDATE photographer SET username = '$this->username' , nic = '$this->nic' ,  age = '$this->age' ,  email = '$this->email' , dob = '$this->dob' , contact_no = '$this->phone' , image = '$rabdam_name' , bank_name = '$this->bankName' , password = '$this->password' , bank_no = '$this->bankNo' , description = '$this->description' WHERE id = ".$_SESSION['photographer_id']." ;"; 
       
        if(mysqli_query($this->connection,$sql)){
          unlink($profileImageDir . "/" . $oldImage);
          header('location:../photographer/photographer_profile.php');
        }else{
          echo '<script language="javascript">';
          echo 'alert("Edit profile error")';
          echo '</script>';
        }   
      }else{
        echo '<script language="javascript">';
        echo 'alert("Image uplord server error")';
        echo '</script>';
      }

    }
  }



  public function DeletePhotographer($id) {
    $sql = "delete from photographer where id='$id'";

    $this->getIdByPhotographers($this->id);

    //Delete Portfolio's and unlink its' images
    $PORTFOLIO = new Portfolio(null);
    $PORTFOLIO->setPhotographer($this->id);
    $PORTFOLIO->deleteByPhotographerId();
   

    //Retriving the extract path is compulsory to avoid errors
    $path = str_replace('\php', '', dirname(__FILE__));

    //Use to give privilages to erase file from the relevant directoryF
    chmod($path, 0777);

    unlink($path . '\image\photographer_p_image\\' . $this->image);

    session_destroy();
    if(mysqli_query($this->connection, $sql)){
      return true;
    }  
 }



  public function photographerCount(){
    $sql = "SELECT COUNT(id) FROM photographer";
    $result = mysqli_query($this->connection,$sql);
    $row = $result->fetch_assoc();
    $count = $row['COUNT(id)'];
    return $count;
  }

  function getSelectedPhotographers(){

    $sql = "SELECT * FROM photographer WHERE id =  ".$_SESSION['photographer_id']." ;";

    $result = mysqli_query($this->connection,$sql);
    $row = $result->fetch_assoc();  
    if(mysqli_num_rows($result) > 0){ 
      $this->id = $row['id'];
      $this->userName = $row['username'];
      $this->nic = $row['nic'];
      $this->email = $row['email'];
      $this->gender = $row['gender'];
      $this->dob = $row['dob'];
      $this->phone = $row['contact_no'];
      $this->description = $row['description'];
      $this->password = $row['password'];
      $this->image = $row['image'];
      $this->bankName = $row['bank_name'];
      $this->bankNo = $row['bank_no'];
      $this->age = $row['age'];
      $this->enrollment_status = $row['enrollment_status'];
    }else{
      echo '<script language="javascript">';
      echo 'alert(" getSelectedPhotographers error")';
      echo '</script>';
    }  
  }

  function getIdByPhotographers($photographer_id){

    $sql = "SELECT * FROM photographer WHERE id = '$photographer_id';";

    $result = mysqli_query($this->connection,$sql);
   // var_dump($result);
    $row = $result->fetch_assoc();  
    if(mysqli_num_rows($result) > 0){ 
      $this->id = $row['id'];
      $this->userName = $row['username'];
      $this->nic = $row['nic'];
      $this->email = $row['email'];
      $this->gender = $row['gender'];
      $this->dob = $row['dob'];
      $this->phone = $row['contact_no'];
      $this->description = $row['description'];
      $this->image = $row['image'];
      $this->bankName = $row['bank_name'];
      $this->bankNo = $row['bank_no'];
      $this->age = $row['age'];
      $this->enrollment_status = $row['enrollment_status'];
    }else{
      echo '<script language="javascript">';
      echo 'alert(" getIdByPhotographers error")';
      echo '</script>';
    }  
  }

  function getAllPhotographers(){
    $sql = "SELECT * FROM photographer";
    $result = mysqli_query($this->connection,$sql);  
    $array_res = array();
      while ($row = mysqli_fetch_array($result)) {
        array_push($array_res, $row);
       }
     return $array_res;
  }

  function getSelectedColumnPhotographers(){
    $sql = "SELECT SUBSTR(description,1,80),image,username,id FROM photographer WHERE enrollment_status=1";
    $result = mysqli_query($this->connection,$sql);  
    $array_res = array();
      while ($row = mysqli_fetch_array($result)) {
        array_push($array_res, $row);
       }
     return $array_res;
  }


  //Modufications of Isiwara,in order to retrive data to the admin panel

    public function setId($id) {
        $this->id = $id;
    }
    public function setApprove($admin_id) {
        $this->approve_by = $admin_id;
    }

    public function getAllPendingPhotographhers() {
        $sql = "SELECT * FROM photographer where enrollment_status=0";
        $result = mysqli_query($this->connection, $sql);
        $array_res = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function getAllSelectedPhotographhers() {
        $sql = "SELECT * FROM photographer where enrollment_status=1";
        $result = mysqli_query($this->connection, $sql);
        $array_res = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function enrollPhotographer() {
        $sql = "UPDATE photographer SET enrollment_status = 1 , approve_by = '$this->approve_by '    WHERE id = '$this->id' ;";
        if (mysqli_query($this->connection, $sql)) {
            header("location:../profile.php?pht=$this->id");
        } else {
            echo '<script language="javascript">';
            echo 'alert("Package deleteRow error")';
            echo '</script>';
        }
    }
    
     public function getApproveBy() {
      return $this->enrollment_status;
     }
    public function delete() {
        $sql = "delete from photographer where id='$this->id'";

        $DATA = $this->getIdByPhotographers($this->id);

        //Delete Portfolio's and unlink its' images
        $PORTFOLIO = new Portfolio(null);
        $PORTFOLIO->setPhotographer($this->id);
        $PORTFOLIO->deleteByPhotographerId();
       

        //Retriving the extract path is compulsory to avoid errors
        $path = str_replace('\php', '', dirname(__FILE__));

        //Use to give privilages to erase file from the relevant directoryF
        chmod($path, 0777);

        unlink($path . '\image\photographer_p_image\\' . $this->image);


        $result = mysqli_query($this->connection, $sql);



        header("location:./../../manage-photographers.php");
    }

   

    public function getid(){return $this->id;}
    public function getuserName(){return $this->userName;}
    public function getpassword(){return $this->password;}
    public function getnic(){return $this->nic;}
    public function getemail(){return $this->email;}
    public function getgender(){return $this->gender;}
    public function getdob(){return $this->dob;}
    public function getphone(){return $this->phone;}
    public function getdescription(){return $this->description;}
    public function getimage(){return $this->image;}
    public function getbankName(){return $this->bankName;}
    public function getbankNo(){return $this->bankNo;}
    public function getage(){return $this->age;}
    public function getenrollment_status(){return $this->enrollment_status;}


       

}

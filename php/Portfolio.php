<?php
include_once  'DBconnection.php'; 
class Portfolio extends DBconnection{

    private $potographer_id;
    private $old_event_id;
    private $event_id;
    private $image1;
    private $image2;
    private $image3;
    private $image4;
    private $image5;

    public function __construct(){
        parent::__construct();
    }
    
    function setPortfolio( $event_id , $image1 , $image2 , $image3 , $image4 , $image5 , $potographer_id ){
        $this->event_id = $event_id;
        $this->potographer_id = $potographer_id;
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->image4 = $image4;
        $this->image5 = $image5;

        $this->insertPortfolio();
    }

    function setPortfolioEdit( $event_id , $image1 , $image2 , $image3 , $image4 , $image5 , $potographer_id , $old_event_id ){
        $this->event_id = $event_id;
        $this->potographer_id = $potographer_id;
        $this->old_event_id = $old_event_id;
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->image4 = $image4;
        $this->image5 = $image5;

        $this->editPortfolio();
    }

    function insertPortfolio(){
      
          $portfolioImageDir = "../image/portfolio";
          
          $rabdam_name1 = rand() . "_" . time() . ".png";
          $rabdam_name2 = rand() . "_" . time() . ".png";
          $rabdam_name3 = rand() . "_" . time() . ".png";
          $rabdam_name4 = rand() . "_" . time() . ".png";
          $rabdam_name5 = rand() . "_" . time() . ".png";

          

          $target_dir_image_name1 = $portfolioImageDir . "/" . $rabdam_name1;
          $target_dir_image_name2 = $portfolioImageDir . "/" . $rabdam_name2;
          $target_dir_image_name3 = $portfolioImageDir . "/" . $rabdam_name3;
          $target_dir_image_name4 = $portfolioImageDir . "/" . $rabdam_name4;
          $target_dir_image_name5 = $portfolioImageDir . "/" . $rabdam_name5;
          
      
           if (file_put_contents($target_dir_image_name1, base64_decode($this->image1))  &&  file_put_contents($target_dir_image_name2, base64_decode($this->image2))  &&  file_put_contents($target_dir_image_name3, base64_decode($this->image3))  &&  file_put_contents($target_dir_image_name4, base64_decode($this->image4))  &&  file_put_contents($target_dir_image_name5, base64_decode($this->image5))){
           
            $sql = "INSERT INTO portfolio (photographer_id , event_id , image1, image2, image3, image4, image5 ) VALUES ('$this->potographer_id', '$this->event_id', '$rabdam_name1', '$rabdam_name2','$rabdam_name3','$rabdam_name4','$rabdam_name5');";
       
            if (mysqli_query($this->connection, $sql)) {
                header('location:../photographer/manage_portfolio.php');
              } else {
                echo '<script language="javascript">';
                echo 'alert("portfolio Insert error")';
                echo '</script>';
              } 
           }
    }



    function getSelectedPhotographerPortfolio($photographer_id){
        $sql = "SELECT * FROM portfolio WHERE photographer_id =  '$photographer_id';";
        $result = mysqli_query($this->connection,$sql); 
          $array_res = array();
          while ($row = mysqli_fetch_array($result)) {
              array_push($array_res, $row);
              }
           return $array_res;
    }

    function deleteRow($event_id , $photographer_id){
     
        $sql = "DELETE FROM portfolio WHERE event_id = '$event_id' AND 	photographer_id = '$photographer_id';";
        if(mysqli_query($this->connection,$sql)){
      
            header('location:../photographer/manage_portfolio.php');
        } else {
            echo '<script language="javascript">';
            echo 'alert("portfolio deleteRow error")';
            echo '</script>';
          }
    }

    
    function editPortfolio(){
      
        $portfolioImageDir = "../image/portfolio";
          
        $rabdam_name1 = rand() . "_" . time() . ".png";
        $rabdam_name2 = rand() . "_" . time() . ".png";
        $rabdam_name3 = rand() . "_" . time() . ".png";
        $rabdam_name4 = rand() . "_" . time() . ".png";
        $rabdam_name5 = rand() . "_" . time() . ".png";

        $target_dir_image_name1 = $portfolioImageDir . "/" . $rabdam_name1;
        $target_dir_image_name2 = $portfolioImageDir . "/" . $rabdam_name2;
        $target_dir_image_name3 = $portfolioImageDir . "/" . $rabdam_name3;
        $target_dir_image_name4 = $portfolioImageDir . "/" . $rabdam_name4;
        $target_dir_image_name5 = $portfolioImageDir . "/" . $rabdam_name5;
    
         if (file_put_contents($target_dir_image_name1, base64_decode($this->image1))  &&  file_put_contents($target_dir_image_name2, base64_decode($this->image2))  &&  file_put_contents($target_dir_image_name3, base64_decode($this->image3))  &&  file_put_contents($target_dir_image_name4, base64_decode($this->image4))  &&  file_put_contents($target_dir_image_name5, base64_decode($this->image5))){
         
          $sql = "UPDATE portfolio  SET event_id = '$this->event_id' , image1 = '$rabdam_name1' , image2 = '$rabdam_name2' , image3 = '$rabdam_name3' , image4 = '$rabdam_name4' , image5 = '$rabdam_name5' WHERE photographer_id = ' $this->potographer_id' AND event_id = '$this->old_event_id' ;";
     
          if (mysqli_query($this->connection, $sql)) {
        
              header('location:../photographer/manage_portfolio.php');
            } else {
              echo '<script language="javascript">';
              echo 'alert("portfolio edit error")';
              echo '</script>';
            } 
         }
  }



  //Implementation of isiwara

  public function deleteByPhotographerId() {

    $sql = "DELETE FROM portfolio WHERE photographer_id = '$this->potographer_id';";
    

    $path = str_replace('\php', '', dirname(__FILE__));

//To avoid any privilages error wheb erasing the directory
        chmod($path, 0777);

        $DATA_ARR = $this->getSelectedPhotographerPortfolio($this->potographer_id);
        ini_get("allow_url_include");
        foreach ($DATA_ARR as $portfolio) {

            for ($i = 1; $i <= 5; $i++) {
                unlink($path . '\image\portfolio\\' . $portfolio['image' . $i]);
            }
        }



        if (mysqli_query($this->connection, $sql)) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function setPhotographer($id){
        $this->potographer_id=$id;
    }

    //End Implementaion

    



    public function getid(){return $this->id;}
    public function geteventId(){return $this->eventId;}
    public function getname(){return $this->name;}
    public function getdescription(){return $this->description;}
    public function getprice(){return $this->price;}


}


?>
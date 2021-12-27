<?php

class DBconnection{
 
    
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $databaseName = "photography";


    protected $connection;

       protected function __construct(){

            $this->connection = new mysqli($this->serverName , $this->userName , $this->password , $this->databaseName);

            if(!$this->connection){
                echo 'Can not estamblish Connection!';
            }else{
                return $this->connection;
            }
        }

       

}

?>
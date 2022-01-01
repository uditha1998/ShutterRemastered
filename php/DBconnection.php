<?php

class DBconnection{
    // main conection
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $databaseName = "photography";

    // host conection
    // private $serverName = "sql306.epizy.com";
    // private $userName = "epiz_28702414";
    // private $password = "sgD8kdLB25f";
    // private $databaseName = "epiz_28702414_shutter";


    protected $connection;

       protected function __construct(){

            $this->connection = new mysqli($this->serverName , $this->userName , $this->password , $this->databaseName);

            if(!$this->connection){
                echo 'Cannot connect to database server';
            }else{
                return $this->connection;
            }
        }

       

}

?>
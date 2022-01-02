<?php
include_once  'Package.php';

class DeleteGet {
    
    private $id;

    private $package;

    function __construct($gettArray){
       
       $this->package = new Package();
        
        $this->id = $gettArray['id'];

        $this->package->deleteRow($this->id);
    }
}

new DeleteGet($_GET);

?>

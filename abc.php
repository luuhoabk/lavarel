
<?php 
        require_once './app/Mage.php';
    Mage::app()->setCurrentStore(2);
    //Mage::setIsDeveloperMode(true);
        /**
        * 
        */
        
        class Josvtuong {

            public $type="";
            public $filedata="";
            public $name="";
                
            public function __construct(){
                $this->type="text";
                $this->filedata="aaaaaaaaaaaaaaaaaaaaaaaaa bbbbbbbbbbbbbbbbbbbb eeeeeeeeeeeeeeeeeeeee";
                $this->name="tui.txt";
            }
        }


        //print file
        $res = new Josvtuong();
        

        $fileName = $res->name;
        $value=$res->filedata;//base64_decode($res->filedata);
        $file = Mage::getBaseDir('media').DS.$fileName;
        
        $fp = fopen($file, "w");        
        fputs($fp, $value);

        fclose($fp);

        if (file_exists($file)){
                header("Content-type:".$res->type);
                header("Content-Disposition: attachment; filename=$fileName");
                readfile($file);
        }

        if (file_exists($file)){
            unlink($file);
        }
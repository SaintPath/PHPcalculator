<?php
class GetParams{
    public $num1;
    public $num2;
    public $num3;
    public $num4;
    public $func;
    public $method;
    public $res;
    
    public function __construct(){
        $num1 = 0;
        $num2 = 0; 
        $num3 = 0;
        $num4 = 0;
    }

    public function pramas() {
        if($this->method == 'POST'){
            if(isset($_POST["num1"])) 
                $this->num1 = (int)$_POST["num1"];
            if(isset($_POST["num2"])) 
                $this->num2 = (int)$_POST["num2"]; 
            if(isset($_POST["num3"])) 
                $this->num3 = (int)$_POST["num3"];
            if(isset($_POST["num4"]))  
                $this->num4 = (int)$_POST["num4"];
            if(isset($_POST["func"])) 
                $this->func = $_POST["func"];
        }

        if($this->method == 'GET'){
            if(isset($_GET["num1"])) 
                $this->num1 = (int)$_GET["num1"]; 
            if(isset($_GET["num2"])) 
                $this->num2 = (int)$_GET["num2"]; 
            if(isset($_GET["num3"])) 
                $this->num3 = (int)$_GET["num3"]; 
            if(isset($_GET["num4"])) 
                $this->num4 = (int)$_GET["num4"];
            if(isset($_GET["func"])) 
                $this->func = $_GET["func"];
        }
            
        if($this->method == 'PUT'){
            parse_str(file_get_contents("php://input"),$_PUT);
            if(isset($_PUT["num1"])) 
                $this->num1 = (int)$_PUT["num1"]; 
            if(isset($_PUT["num2"]))            
                $this->num2 = (int)$_PUT["num2"]; 
            if(isset($_PUT["num3"]))       
                $this->num3 = (int)$_PUT["num3"]; 
            if(isset($_PUT["num4"]))         
                $this->num4 = (int)$_PUT["num4"];
            if(isset($_PUT["func"]))         
                $this->func = $_PUT["func"];
        }
    }

    public function calculate(){
        if ($this->func == 'sum'){
            $this->res = $this->num1 + $this->num2 + $this->num3 + $this->num4; 
        }
        else if ($this->func == 'avg'){
            $this->res = ($this->num1 + $this->num2 + $this->num3 + $this->num4) / 4;
        }
        else if ($this->func == 'mult'){
            $this->res = $this->num1 * $this->num2 * $this->num3 * $this->num4;
        }
        else {return print('Error!');}
    }

}
?>

 
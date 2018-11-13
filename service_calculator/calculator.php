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
        $this->num1 = 0;
        $this->num2 = 0; 
        $this->num3 = 0;
        $this->func = 'sum';
    }

    public function pramas() {
        switch($this->method){        
        case 'POST':
            if(isset($_POST["num1"])) 
                $this->num1 = (int)$_POST["num1"];
            else  $this->num1 = 0;
            if(isset($_POST["num2"])) 
                $this->num2 = (int)$_POST["num2"];
            else  $this->num2 = 0;
            if(isset($_POST["num3"])) 
                $this->num3 = (int)$_POST["num3"];
            else  $this->num3 = 0;
            if(isset($_POST["func"])) 
                $this->func = (string) $_POST["func"];
            else  $this->func = "sum";
            
            break;

        case 'GET':
            if(isset($_GET["num1"])) 
                $this->num1 = (int)$_GET["num1"]; 
            else  $this->num1 = 0;
            if(isset($_GET["num2"])) 
                $this->num2 = (int)$_GET["num2"]; 
            else  $this->num2 = 0;
            if(isset($_GET["num3"])) 
                $this->num3 = (int)$_GET["num3"];
            else  $this->num3 = 0;
            if(isset($_GET["func"])) 
                $this->func = (string) $_GET["func"];
            else  $this->func = "sum";
            
            break;
            
        case 'PUT':
            parse_str(file_get_contents("php://input"),$_PUT);
            if(isset($_PUT["num1"])) 
                $this->num1 = (int)$_PUT["num1"];
            else  $this->num1 = 0;
            if(isset($_PUT["num2"]))            
                $this->num2 = (int)$_PUT["num2"]; 
            else  $this->num2 = 0;
            if(isset($_PUT["num3"]))       
                $this->num3 = (int)$_PUT["num3"]; 
            else  $this->num3 = 0;
            if(isset($_PUT["func"]))         
                $this->func = (string)$_PUT["func"];
            else  $this->func = "sum";
            
            break;
        }
    }

    public function calculate(){
        switch ($this->func){
            case 'sum':
                $this->res = $this->num1 + $this->num2 + $this->num3;
                break;
            case 'avg':
                $this->res = ($this->num1 + $this->num2 + $this->num3) / 3;
                break;
            case 'mult':
                $this->res = $this->num1 * $this->num2 * $this->num3;
                break;
            default:
                return 'func Error!';
        }
    }
}
?>
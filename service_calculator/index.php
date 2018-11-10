<?php 
    include "calculator.php";
    
    if ($_SERVER['REQUEST_METHOD'] != 'POST' && $_SERVER['REQUEST_METHOD'] != 'GET' && $_SERVER['REQUEST_METHOD'] != 'PUT')
        return;

    $calc = new GetParams;
    $calc->method = $_SERVER['REQUEST_METHOD'];

    if (isset($calc->method))
        $calc->pramas();
    
    $calc->calculate();

    // build the results Array
    $a = array('retVal' => $calc->res);
    
    // set header for json response
    header('Content-Type: application/json'); 

    // echo the converted JSON Object from the Array
    echo json_encode($a);

?>
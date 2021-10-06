<?php
$errores = [];
$errores = validar($_POST["numero1"], $_POST["numero2"]);
if(count($errores==0)){
    if(isset($_POST["sumar"])){
        $operacion = $_POST["numero1"] + ($_POST["numero2"]);
        header('Location: formulario.php?suma='.$operacion);
    } else {
        if(isset($_POST["restar"])){
            $operacion = $_POST["numero1"] - ($_POST["numero2"]);
            header('Location: formulario.php?resta='.$operacion);
        } else {
            if(isset($_POST["multiplicar"])){
                $operacion = $_POST["numero1"] * ($_POST["numero2"]);
                header('Location: formulario.php?mul='.$operacion);  
            } else {
                // Redirección
                $error = "Error no se puede hacer la operacion";
                header('Location: formulario.php?error='.$error);
            }
        }
    }
} else{
    $muestra = "";
    foreach($errores as $v){
        $muestra = $errores[$v]."/";
    }
    header('Location: formulario.php?valida='.$muestra);
} 

function validaFormulario($num1, $num2){
    if(is_numeric($num1) && is_numeric($num2) && isset($num1) && isset($num2)){
        return true;
    }
}

function validar($num1, $num2){
    $errores = [];

    if(is_numeric($num1)==false){
        $errores["numero1"] = "Error, primer parametro no numerico";

    if(is_numeric($num2)==false){
        $errores["numero2"] = "Error, segundo parametro no numerico";
    }
    if($num1==""){
        $errores["numero1"] = "Error, primer parametro nulo";
    }
    if($num2==""){
        $errores["numero2"] = "Error, segundo parametro nulo";
    }        

    return $errores;
}
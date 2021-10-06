<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <input type="text" id="numero1" name="numero1">   <br><br>    
    <input type="text" id="numero2" name="numero2">   <br><br>
    <button type="submit" name="sumar" id="sumar">SUMAR</button>
    <button type="submit" name="restar" id="restar">RESTAR</button>
    <button type="submit" name="multiplicar" id="multiplicar">MULTIPLICAR</button>
    



</form>

</body>



<?php

if(isset($_POST["numero1"]) && isset($_POST["numero2"])){
    $errores = [];
    $errores = validar($_POST["numero1"], $_POST["numero2"]);
    if(count($errores)==0){

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
            $muestra = $v;
        }
        var_dump($errores);
        header("Location: formulario.php?valida=$muestra");
    } 
}


if(isset($_GET["suma"])){
    echo $_GET["suma"];
}
if(isset($_GET["resta"])){
    echo $_GET["resta"];
}

if(isset($_GET["mul"])){
    echo $_GET["mul"];
}

if(isset($_GET["error"])){
    echo $_GET["error"];
}

if(isset($_GET["valida"])){
    echo $_GET["valida"];
}

function validaFormulario($num1, $num2){
    if(is_numeric($num1) && is_numeric($num2) && isset($num1) && isset($num2)){
        return true;
    }
}



function validar($num1, $num2){
    $errores = [];

    if($num1==""){
        $errores["numero1"] = "Error, primer parametro nulo";
    } else if(is_numeric($num1)==false){
        $errores["numero1"] = "Error, primer parametro no numerico";
    }

    if($num2==""){
        $errores["numero2"] = "Error, segundo parametro nulo";
    } else if(is_numeric($num2)==false){
        $errores["numero2"] = "Error, segundo parametro no numerico";
    }
  

    return $errores;
}
?>
</html>
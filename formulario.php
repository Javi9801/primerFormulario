<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="procesa.php" method="POST">

    <input type="text" id="numero1" name="numero1">   <br><br>    
    <input type="text" id="numero2" name="numero2">   <br><br>
    <button type="submit" name="sumar" id="sumar">SUMAR</button>
    <button type="submit" name="restar" id="restar">RESTAR</button>
    <button type="submit" name="multiplicar" id="multiplicar">MULTIPLICAR</button>
    



</form>

<?php

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

if(isset($_GET["muestra"])){
    echo $_GET["muestra"];
}
 ?>

</body>




</html>
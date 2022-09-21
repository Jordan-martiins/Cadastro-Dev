<?php

try
{
    $pdo = new PDO("mysql:host=localhost;dbname=dev","root","");
   //echo("Conexão estabelecida!");    
}

catch(PDOException $e)
{
    echo("Error". $e->getMessage());
}

?>
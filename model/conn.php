<?php  
    $username = "controledoestoqu";
    $password = "E215487369s";
    global $pdo;
    try{
        $pdo = new PDO('mysql:host=mysql743.umbler.com;dbname=projetoestoque', $username, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOexception $e){
        echo "erro: ".$e -> getMessage();
    }
?>
<?php
if(!$_SESSION['idUser']){
    header("Location: ../../index.php");
    exit();
}

?>
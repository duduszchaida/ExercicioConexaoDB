<?php

require_once("connection.php");

$id = 0;

if (isset($_GET['id'])) 
    $id = $_GET['id'];
    if(! $id) {
        echo "ID inválido!<br>";
        echo "<a href='listar_produtos.php'>Voltar</a>";
        exit;
    }

$conn = connection::getConnection();

$sql = "DELETE FROM produtos WHERE id = :id";
$stm = $conn->prepare($sql);
$stm->bindParam(':id', $id, PDO::PARAM_INT); 
$stm->execute();

header("location: listar_produtos.php"); 

    
    
?>

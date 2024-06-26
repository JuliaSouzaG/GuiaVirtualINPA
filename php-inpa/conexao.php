<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";

try {
    $conn = new PDO("mysql:host=$servidor;dbname=inpatrabalho", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "conexão com sucesso";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
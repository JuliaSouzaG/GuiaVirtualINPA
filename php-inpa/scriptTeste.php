<?php

include "conexao.php";

$titulo = $_POST['titulo'];
$nomecien = $_POST['cien'];
$est = $_POST['est'];
$predadores = $_POST['predadores'];
$peso = $_POST['peso'];
$comprimento = $_POST['comprimento'];
$nvl = $_POST['nvl'];
// $img = salvar_arquivo();
$desc = $_POST['desc'];
$idusu = $_POST['idusu'];




$diretorio = "img/";
$prefixo = "ponto-visitacao";
$arqValido = ["jpg","png","jpeg","bmp","gif"];
$imagem = $_FILES["imagem"];
$imgNome = $_FILES["imagem"]["name"];
$imgTmp = $_FILES["imagem"]["tmp_name"];
echo "<pre>";
echo var_dump($imagem);
echo "</pre>";

function salvar_arquivo($diretorio,$imgNome,$prefixo,$arqValido,$imgTmp){
    $ext = pathinfo($imgNome,PATHINFO_EXTENSION);
    $novoNome = "$prefixo-".uniqid().'.'.$ext;
    if(in_array($ext,$arqValido)){
        $destino =$diretorio.$novoNome;
        move_uploaded_file($imgTmp,$destino); 
        return $novoNome;
    }else{
         echo 'Arquivo inválido!!!!';
         exit;
    } 
}

salvar_arquivo($diretorio,$imgNome,$prefixo,$arqValido,$imgTmp);

$sql = "Insert into ponto_visitacao (titulo, nomecien, est, predadores, peso, comprimento, nvl, imagem, desc, usuario_idusuario) values
(?, ?, ?, ?, ?)";
$obj = $conn->prepare($sql);
$obj ->bindValue(1,$titulo);
$obj ->bindValue(2,$nomecien);
$obj ->bindValue(3,$est);
$obj ->bindValue(4,$predadores);
$obj ->bindValue(5,$peso);
$obj ->bindValue(6,$comprimento);
$obj ->bindValue(7,$nvl);
$obj ->bindValue(8,$img);
$obj ->bindValue(9,$desc);
$obj ->bindValue(10,$idusu);


if($obj->execute()){
    echo "Cadastro com Sucesso!";
}
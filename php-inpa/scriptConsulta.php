<?php

include "conexao.php";

$sql = "select * from ponto_visitacao where nome = 'poraque'";

$sth = $obj->query($sql);


if($obj->execute()){
     echo "Cadastro com Sucesso!";

}
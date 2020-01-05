<?php

include 'contato.class.php';
$contato = new Contato();

if(!empty($_GET['id'])){// se recebemos o id fazemos alguma coisa

    $id = $_GET['id']; // pegar o id e armazenar na variavel

    $contato->excluir($id);

    header("Location: index.php");
}
header("Location: index.php");

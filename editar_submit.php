<?php

require 'contato.class.php';
$contato = new Contato();

if(!empty($_POST['id'])){ // se nao estiver vazio envia os dados de formulario
$nome = $_POST['nome'];
$id = $_POST['id'];

$contato->editar($nome,$id);

// fazer o redirecionamento
header("Location: index.php");
}
<?php

require 'contato.class.php';
$contato = new Contato();

if(!empty($_POST['email'])){ // se nao estiver vazio envia os dados de formulario
$nome = $_POST['nome'];
$email = $_POST['email'];

$contato->adicionar($email,$nome);

// fazer o redirecionamento
header("Location: index.php");
}
<?php

require 'contato.class.php';
$contato = new Contato();

if(!empty($_POST['id'])){ // se nao estiver vazio envia os dados de formulario
$nome = $_POST['nome'];
$email = $_POST['email'];
$id = $_POST['id'];

if(!empty($email)){ // verificar se email esta preenchido
    $contato->editar($nome,$email,$id); // ai a gente faz o processo de edicao
}



// fazer o redirecionamento
header("Location: index.php");
}
<?php
require 'contato.class.php';

$contato = new Contato();

?>
<h1>Contatos</h1>

<a href="adicionar.php">[Adicionar]</a></br></br>

<table border = "1" width = "600">
    <tr>
    <th>ID<th>
    <th>Nome<th>
    <th>Email<th>
    <th>Ações<th>
    </tr>

    <?php
    $lista = $contato->getAll();
    foreach($lista as $item):
    ?>
        <tr>
    <th><?php echo $item['id']; ?><th>
    <th><?php echo $item['nome']; ?><th>
    <th><?php echo $item['email']; ?><th>

    <th>
    
    <a href="editar.php?id=<php echo $item['id']; ?>">[Editar]</a> 
    <a href="excluir.php?id=<php echo $item['id']; ?>">[Excluir]</a>
   
    
    </th>
    
    </tr>
    <?php endforeach; ?>
</table>



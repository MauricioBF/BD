<?php
require_once('back/tipoDAO.php');    
require_once('back/tipo.php');
$id = isset($_POST['id']);
$tip = new Tipo($_POST['nome'],$_POST['descricao']);
$tdao = new TipoDAO();
if($id){
    $tip->setId(intval($_POST['id']));
    $tdao->alterar($tip);
}
else{
    $tdao->inserir($tip);
}
header("Location: listartipo.php");

?>
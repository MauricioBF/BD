<?php
require_once('back/tipoDAO.php');    
$id = $_GET['id'];
$tdao = new TipoDAO();

if($id!==null)    $tdao->deletar($id);
header("Location: listartipo.php");

?>
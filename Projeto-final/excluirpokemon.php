<?php
require_once('back/pokemonDAO.php');    
$id = $_GET['id'];
$pdao = new PokemonDAO();

if($id!==null)    $pdao->deletar($id);
header("Location: listarpokemon.php");

?>
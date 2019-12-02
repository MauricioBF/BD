<?php
require_once('back/pokemonDAO.php');    
require_once('back/pokemon.php');
require_once('back/tipoDAO.php');    
require_once('back/tipo.php');
$idtipo = intval($_POST['tipo']);
$tdao = new TipoDAO();
$tipo = $tdao->buscar($idtipo);
$id = isset($_POST['id']);
$pok = new Pokemon($_POST['nome'],$_POST['habilidade'],$_POST['nivel'], $tipo);
$pdao = new PokemonDAO();
if($id){
    $pok->setId(intval($_POST['id']));
    $pdao->alterar($pok);
}
else{
    $pdao->inserir($pok);
}
header("Location: listarpokemon.php");

?>
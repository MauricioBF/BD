<?php
require_once('back/pokemonDAO.php');    
require_once('back/pokemon.php');
$id = isset($_POST['id']);
$pok = new Pokemon($_POST['nome'],$_POST['habilidade'],$_POST['nivel'],$_POST['tipo']);
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
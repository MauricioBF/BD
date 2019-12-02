<?php 
require_once('inc/header.php');
require_once('back/pokemonDAO.php');    
require_once('back/pokemon.php');
$id = isset($_GET['id']);

if($id){
  $id = $_GET['id'];
  $pdao = new PokemonDAO();
  $pok = $pdao->buscar(intval($id));
}
?>
<h2 style="text-align:center;">Detalhes Pokemon</h2>
<div  style="width:70%; margin:0 auto;">
<ul class="list-group">
  <li class="list-group-item active"><?= $pok->getNome()." (id:".$pok->getId().")";?></li>
  <li class="list-group-item"><?php echo "Habilidade: ".$pok->getHabilidade();?></li>
  <li class="list-group-item"><?php echo "Nível: ".$pok->getNivel();?></li>
  <li class="list-group-item"><?php echo "Tipo: ".$pok->getTipo()->getNome();?></li>
</ul>
<br>
<a href="listarpokemon.php" class="btn btn-primary active" role="button" aria-pressed="true"> << voltar</a>
</div>

<?php include_once("inc/footer.php");?>
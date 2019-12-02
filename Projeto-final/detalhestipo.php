<?php 
require_once('inc/header.php');
require_once('back/tipoDAO.php');    
require_once('back/tipo.php');
$id = isset($_GET['id']);

if($id){
  $id = $_GET['id'];
  $tdao = new TipoDAO();
  $tip = $tdao->buscar(intval($id));
}
?>
<h2>Detalhes Tipo</h2>

<ul class="list-group">
  <li class="list-group-item active"><?= $tip->getNome()." (id:".$tip->getId().")";?></li>
  <li class="list-group-item"><?php echo "Descrição: ".$tip->getDescricao();?></li>
</ul>

<a href="listartipo.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>

<?php include_once("inc/footer.php");?>